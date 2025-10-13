<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Exception;
use Illuminate\Support\Facades\Validator;

class TutorController extends Controller
{
    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Tutor::orderBy('id', 'desc')->get();

    //         return DataTables::of($data)
    //             ->addIndexColumn()
    //             ->editColumn('status', function ($data) {
    //                 return $data->status; // 1 or 0 for JS checkbox
    //             })
    //             ->addColumn('action', function ($data) {
    //                 return '
    //                     <button class="btn btn-sm btn-icon me-2" onclick="edit(\'/admin/tutors/' . $data->id . '/edit\', \'modal-lg\')">
    //                         <i class="ti ti-edit"></i>
    //                     </button>
    //                     <button class="btn btn-sm btn-icon delete-record" onclick="destry(\'/admin/tutors/' . $data->id . '\', \'tutor-table\')">
    //                         <i class="ti ti-trash"></i>
    //                     </button>
    //                 ';
    //             })
    //             ->rawColumns(['action', 'status'])
    //             ->make(true);
    //     }

    //     return view('admin.tutors.index');
    // }

    // public function create()
    // {
    //     return view('admin.tutors.create');
    // }

    // public function store(Request $request)
    // {
    //     // Validate request
    //     $validator = Validator::make($request->all(), [
    //         'name'        => 'required|string|max:255',
    //         'designation' => 'nullable|string|max:255',
    //         'experience' => 'nullable|string|max:255',
    //         'bio'         => 'nullable|string',
    //         'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    //         'status'      => 'nullable|boolean',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status'  => 'error',
    //             'message' => $validator->errors()->first()
    //         ], 422);
    //     }

    //     $data = $validator->validated();

    //     // Handle image upload
    //     if ($request->hasFile('image')) {
    //         $data['image'] = uploadImage($request->file('image'), 'tutors', 'image');
    //     }

    //     // Create tutor
    //     Tutor::create($data);

    //     return response()->json([
    //         'status'  => 'success',
    //         'message' => 'Tutor added successfully!',
    //     ], 200);
    // }


    // public function edit(Tutor $tutor)
    // {
    //     return view('admin.tutors.edit', compact('tutor'));
    // }

    // public function update(Request $request, Tutor $tutor)
    // {
    //     // Validate request
    //     // dd($request->all());    
    //     $validator = Validator::make($request->all(), [
    //         'name'        => 'required|string|max:255',
    //         'designation' => 'nullable|string|max:255',
    //         'experience'  => 'nullable|string|max:255',
    //         'bio'         => 'nullable|string',
    //         'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    //         'status'      => 'nullable|boolean',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status'  => 'error',
    //             'message' => $validator->errors()->first()
    //         ], 422);
    //     }

    //     $data = $validator->validated();

    //     // Handle image upload
    //     if ($request->hasFile('image')) {
    //         // Delete old image if exists
    //         if ($tutor->image && file_exists(public_path($tutor->image))) {
    //             unlink(public_path($tutor->image));
    //         }

    //         // Upload new image
    //         $data['image'] = uploadImage($request->file('image'), 'tutors', 'image');
    //     }

    //     // Update tutor
    //     $tutor->update($data);

    //     return response()->json([
    //         'status'  => 'success',
    //         'message' => 'Tutor updated successfully!',
    //         'data'    => $tutor
    //     ], 200);
    // }

  public function index(Request $request)
{
    if ($request->ajax()) {
        $data = Tutor::with('course')->orderBy('id', 'desc')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('course_name', function ($row) {
                // Return the course name or fallback if none
                return $row->course ? $row->course->name : '<span class="text-muted">No Course</span>';
            })
            ->editColumn('status', function ($row) {
                // return 1 or 0 for JS toggle
                return $row->status;
            })
            ->addColumn('action', function ($row) {
                return '
                    <button class="btn btn-sm btn-icon me-2" onclick="edit(\'/admin/tutors/' . $row->id . '/edit\', \'modal-lg\')">
                        <i class="ti ti-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-icon delete-record" onclick="destry(\'/admin/tutors/' . $row->id . '\', \'tutors-table\')">
                        <i class="ti ti-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['action', 'course_name', 'status'])
            ->make(true);
    }

    return view('admin.tutors.index');
}


    public function create()
    {
        $courses = Course::where('status', 1)->get();
        return view('admin.tutors.create', compact('courses'));
    }

    // Store
    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'experience'  => 'nullable|string|max:255',
            'bio'         => 'nullable|string',
            'course_id'   => 'nullable|exists:courses,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status'      => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = uploadImage($request->file('image'), 'tutors');
        }

        Tutor::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Tutor added successfully!'
        ]);
    }

    // Edit
    public function edit(Tutor $tutor)
    {
        $courses = Course::where('status', 1)->get();
        return view('admin.tutors.edit', compact('tutor', 'courses'));
    }

    // Update
    public function update(Request $request, Tutor $tutor)
    {
        // dd($request->all());
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'experience'  => 'nullable|string|max:255',
            'bio'         => 'nullable|string',
            'course_id'   => 'nullable|exists:courses,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status'      => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($tutor->image && file_exists(public_path($tutor->image))) {
                unlink(public_path($tutor->image));
            }
            $data['image'] = uploadImage($request->file('image'), 'tutors');
        }

        $tutor->update($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Tutor updated successfully!'
        ]);
    }

    public function destroy(Tutor $tutor)
    {
        try {
            $tutor->delete();
            return response()->json([
                'status'  => 'success',
                'message' => 'Tutor deleted successfully!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to delete tutor. Please try again.'
            ], 500);
        }
    }

    public function toggleStatus(Tutor $tutor)
    {
        $tutor->status = !$tutor->status;
        $tutor->save();

        return response()->json([
            'success' => true,
            'status'  => $tutor->status,
            'message' => $tutor->status ? 'Tutor activated successfully!' : 'Tutor deactivated successfully!'
        ]);
    }
}
