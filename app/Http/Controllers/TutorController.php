<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class TutorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tutor::orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($data) {
                    return $data->status; // 1 or 0 for JS checkbox
                })
                ->addColumn('action', function ($data) {
                    return '
                        <button class="btn btn-sm btn-icon me-2" onclick="edit(\'/admin/tutors/' . $data->id . '/edit\', \'modal-lg\')">
                            <i class="ti ti-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-icon delete-record" onclick="destry(\'/admin/tutors/' . $data->id . '\', \'tutor-table\')">
                            <i class="ti ti-trash"></i>
                        </button>
                    ';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.tutors.index');
    }

    public function create()
    {
        return view('admin.tutors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'bio'         => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status'      => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = uploadImage($request->file('image'), 'tutors'); // Upload to tutors folder
        }

        Tutor::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Tutor added successfully!'
        ]);
    }

    public function edit(Tutor $tutor)
    {
        return view('admin.tutors.edit', compact('tutor'));
    }

    public function update(Request $request, Tutor $tutor)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'bio'         => 'nullable|string',
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
