<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Homefaqs;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class HomeFaqController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Homefaqs::orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($data) {
                    return $data->status; // 1 or 0 for JS checkbox
                })
                ->addColumn('action', function ($data) {
                    return '
                        <button class="btn btn-sm btn-icon me-2" onclick="edit(\'/admin/faqs/' . $data->id . '/edit\', \'modal-lg\')">
                            <i class="ti ti-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-icon delete-record" onclick="destry(\'/admin/faqs/' . $data->id . '\', \'faq-table\')">
                            <i class="ti ti-trash"></i>
                        </button>
                    ';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.faqs.index');
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'status'   => 'nullable|boolean',
        ]);

        Homefaqs::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'FAQ added successfully!'
        ]);
    }

    public function edit(Homefaqs $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Homefaqs $faq)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'status'   => 'nullable|boolean',
        ]);

        $faq->update($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'FAQ updated successfully!'
        ]);
    }

    public function destroy(Faq $faq)
    {
        try {
            $faq->delete();
            return response()->json([
                'status'  => 'success',
                'message' => 'FAQ deleted successfully!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to delete FAQ. Please try again.'
            ], 500);
        }
    }

    public function toggleStatus(Homefaqs $faq)
    {
        $faq->status = !$faq->status;
        $faq->save();

        return response()->json([
            'success' => true,
            'status'  => $faq->status,
            'message' => $faq->status ? 'FAQ activated successfully!' : 'FAQ deactivated successfully!'
        ]);
    }
}
