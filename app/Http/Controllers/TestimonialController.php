<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Testimonial::orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($data) {
                    return $data->status; // 1 or 0 for JS checkbox
                })
                ->addColumn('action', function ($data) {
                    return '
                        <button class="btn btn-sm btn-icon me-2" onclick="edit(\'/admin/testimonials/' . $data->id . '/edit\', \'modal-lg\')">
                            <i class="ti ti-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-icon delete-record" onclick="destry(\'/admin/testimonials/' . $data->id . '\', \'testimonial-table\')">
                            <i class="ti ti-trash"></i>
                        </button>
                    ';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.testimonials.index');
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'feedback'    => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status'      => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = uploadImage($request->file('image'), 'testimonials'); // Upload to testimonials folder
        }

        Testimonial::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Testimonial added successfully!'
        ]);
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'feedback'    => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status'      => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($testimonial->image && file_exists(public_path($testimonial->image))) {
                unlink(public_path($testimonial->image));
            }
            $data['image'] = uploadImage($request->file('image'), 'testimonials');
        }

        $testimonial->update($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Testimonial updated successfully!'
        ]);
    }

    public function destroy(Testimonial $testimonial)
    {
        try {
            $testimonial->delete();
            return response()->json([
                'status'  => 'success',
                'message' => 'Testimonial deleted successfully!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to delete testimonial. Please try again.'
            ], 500);
        }
    }

    public function toggleStatus(Testimonial $testimonial)
    {
        $testimonial->status = !$testimonial->status;
        $testimonial->save();

        return response()->json([
            'success' => true,
            'status'  => $testimonial->status,
            'message' => $testimonial->status ? 'Testimonial activated successfully!' : 'Testimonial deactivated successfully!'
        ]);
    }
}
