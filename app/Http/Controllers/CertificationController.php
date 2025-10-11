<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class CertificationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Certification::orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', fn($data) => $data->status)
                ->addColumn('action', function ($data) {
                    return '
                        <button class="btn btn-sm btn-icon me-2" onclick="edit(\'/admin/certifications/' . $data->id . '/edit\', \'modal-lg\')">
                            <i class="ti ti-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-icon delete-record" onclick="destry(\'/admin/certifications/' . $data->id . '\', \'certification-table\')">
                            <i class="ti ti-trash"></i>
                        </button>
                    ';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.certifications.index');
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'badge_icon'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'issued_date'    => 'nullable|string|max:50',
            'certificate_id' => 'nullable|string|max:50',
            'status'         => 'nullable|boolean',
        ]);

        if ($request->hasFile('badge_icon')) {
            $data['badge_icon'] = uploadImage($request->file('badge_icon'), 'certifications'); 
            // or: $request->file('badge_icon')->store('certifications','public');
        }

        Certification::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Certification added successfully!'
        ]);
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'badge_icon'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'issued_date'    => 'nullable|string|max:50',
            'certificate_id' => 'nullable|string|max:50',
            'status'         => 'nullable|boolean',
        ]);

        if ($request->hasFile('badge_icon')) {
            // Delete old image
            if ($certification->badge_icon && file_exists(public_path($certification->badge_icon))) {
                unlink(public_path($certification->badge_icon));
            }
            $data['badge_icon'] = uploadImage($request->file('badge_icon'), 'certifications');
        }

        $certification->update($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Certification updated successfully!'
        ]);
    }

    public function destroy(Certification $certification)
    {
        try {
            if ($certification->badge_icon && file_exists(public_path($certification->badge_icon))) {
                unlink(public_path($certification->badge_icon));
            }
            $certification->delete();
            return response()->json([
                'status'  => 'success',
                'message' => 'Certification deleted successfully!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to delete certification. Please try again.'
            ], 500);
        }
    }

    public function toggleStatus(Certification $certification)
    {
        $certification->status = !$certification->status;
        $certification->save();

        return response()->json([
            'success' => true,
            'status'  => $certification->status,
            'message' => $certification->status ? 'Certification activated successfully!' : 'Certification deactivated successfully!'
        ]);
    }
}
