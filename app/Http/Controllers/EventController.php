<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Exception;

class EventController extends Controller
{

    public function showEvents()
    {
        $events = Event::where('status', 1)->orderBy('id', 'desc')->paginate(6);
        // dd($events);
        return view('web-pages.events.list', compact('events'));
    }
    public function eventDetails($slug)
    {
        // dd($slug);
        $event = Event::where('slug', $slug)->where('status', 1)->firstOrFail();
        $relatedEvents = Event::where('status', 1)
            ->where('id', '!=', $event->id)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();
        return view('web-pages.events.details', compact('event', 'relatedEvents'));
    }
    // DataTable index
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('type', fn($row) => ucfirst($row->type))
                ->addColumn('media', function ($row) {
                    if ($row->type === 'image' && $row->media_path) {
                        return '<img src="' . asset($row->media_path) . '" width="60" height="60" class="rounded">';
                    } elseif ($row->type === 'video' && $row->media_path) {
                        return '<video width="60" height="60" controls><source src="' . asset($row->media_path) . '" type="video/mp4"></video>';
                    } elseif ($row->type === 'embed' && $row->embed_link) {
                        return '<iframe width="60" height="60" src="' . $row->embed_link . '"></iframe>';
                    }
                    return '-';
                })
                ->editColumn('status', function ($row) {
                    // return 1 or 0 for JS toggle
                    return $row->status;
                })->addColumn('action', function ($row) {
                    return '
                        <button type="button" class="btn btn-sm btn-primary editEvent" data-id="' . $row->id . '">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger deleteEvent" data-id="' . $row->id . '">
                            <i class="fa fa-trash"></i>
                        </button>
                    ';
                })
                ->rawColumns(['media', 'status', 'action'])
                ->make(true);
        }

        return view('admin.events.index');
    }

    // Show create modal
    public function create()
    {
        return view('admin.events.create');
    }

    // Store new event
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video,embed',
            'media_path' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:10240',
            'embed_link' => 'nullable|url',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
        ];
        $slug = Str::slug($request->slug) ?: Str::slug($request->title);
        // dd($slug);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        try {
            $mediaPath = null;

            if ($request->type !== 'embed' && $request->hasFile('media_path')) {
                $folder = $request->type === 'video' ? 'events/videos' : 'events/images';
                $mediaPath = uploadImage($request->file('media_path'), $folder, 'media');
            }

            Event::create([
                'title' => $request->title,
                'slug' => $slug,
                'type' => $request->type,
                'media_path' => $mediaPath,
                'embed_link' => $request->embed_link,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'status' => $request->status ?? 1,
                'is_new' => $request->is_new ?? 1,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Event created successfully.']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }

    // Show edit modal
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    // Update existing event
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video,embed',
            'media_path' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:10240',
            'embed_link' => 'nullable|url',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean'
        ];
        $slug = Str::slug($request->slug) ?: Str::slug($request->title);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        try {
            $event = Event::findOrFail($id);

            if ($request->type !== 'embed' && $request->hasFile('media_path')) {
                if ($event->media_path && file_exists(public_path($event->media_path))) {
                    unlink(public_path($event->media_path));
                }
                $folder = $request->type === 'video' ? 'events/videos' : 'events/images';
                $event->media_path = uploadImage($request->file('media_path'), $folder, 'media');
            }

            $event->title = $request->title;
            $event->type = $request->type;
            $event->slug = $slug;
            $event->embed_link = $request->type === 'embed' ? $request->embed_link : null;
            $event->short_description = $request->short_description;
            $event->description = $request->description;
            $event->status = $request->status ?? 1;
            $event->is_new = $request->is_new ?? 1;

            $event->save();

            return response()->json(['status' => 'success', 'message' => 'Event updated successfully.']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }

    // Delete event
    public function destroy($id)
    {
        try {
            $event = Event::findOrFail($id);

            if ($event->media_path && file_exists(public_path($event->media_path))) {
                unlink(public_path($event->media_path));
            }

            $event->delete();

            return response()->json(['status' => 'success', 'message' => 'Event deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete event.']);
        }
    }
    public function toggleStatus(Event $event) // singular
    {
        $event->status = !$event->status;
        $event->save();

        return response()->json([
            'success' => true,
            'status'  => $event->status,
            'message' => $event->status ? 'Event activated successfully!' : 'Event deactivated successfully!'
        ]);
    }
}
