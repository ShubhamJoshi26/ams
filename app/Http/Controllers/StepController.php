<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Step;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class StepController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Step::orderBy('order')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($data) {
                    return $data->status; // 1 or 0 for JS checkbox
                })
                ->addColumn('action', function ($data) {
                    return '
                        <button class="btn btn-sm btn-icon me-2" onclick="edit(\'/admin/steps/' . $data->id . '/edit\', \'modal-lg\')">
                            <i class="ti ti-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-icon delete-record" onclick="destry(\'/admin/steps/' . $data->id . '\', \'step-table\')">
                            <i class="ti ti-trash"></i>
                        </button>
                    ';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.steps.index');
    }

    public function create()
    {
        return view('admin.steps.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:255',
            'order'       => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        Step::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Step added successfully!'
        ]);
    }

    public function edit(Step $step)
    {
        return view('admin.steps.edit', compact('step'));
    }

    public function update(Request $request, Step $step)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:255',
            'order'       => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        $step->update($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Step updated successfully!'
        ]);
    }

    public function destroy(Step $step)
    {
        try {
            $step->delete();
            return response()->json([
                'status'  => 'success',
                'message' => 'Step deleted successfully!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to delete step. Please try again.'
            ], 500);
        }
    }

    public function toggleStatus(Step $step)
    {
        $step->status = !$step->status;
        $step->save();

        return response()->json([
            'success' => true,
            'status'  => $step->status,
            'message' => $step->status ? 'Step activated successfully!' : 'Step deactivated successfully!'
        ]);
    }
}
