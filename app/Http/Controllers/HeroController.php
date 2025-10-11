<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Container\Attributes\Auth;
use Yajra\DataTables\Facades\DataTables;
use Exception;
use stdClass;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class HeroController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Hero::orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($data) {
                    return $data->status; // 1 or 0 for JS checkbox
                })
                ->addColumn('action', function ($data) {
                    return '
                        <button class="btn btn-sm btn-icon me-2" onclick="edit(\'/heros/' . $data->id . '/edit\', \'modal-lg\')">
                            <i class="ti ti-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-icon delete-record" onclick="destry(\'/heros/' . $data->id . '\', \'hero-table\')">
                            <i class="ti ti-trash"></i>
                        </button>
                    ';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.heros.index');
    }

    public function create()
    {
        return view('admin.heros.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'title'       => 'required|string|max:255',
        'subtitle'    => 'nullable|string|max:500',
        'button_text' => 'nullable|string|max:255',
        'button_link' => 'nullable|string|max:255',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'status'      => 'nullable|boolean',
    ]);

    // Handle image upload using uploadImage() helper
    if ($request->hasFile('image')) {
        $data['image'] = uploadImage($request->file('image'), 'heros'); // Upload to 'heros' folder
    }

    Hero::create($data);

    return response()->json([
        'status'  => 'success',
        'message' => 'Hero added successfully!'
    ]);
}

    public function edit(Hero $hero)
    {
        $hero = Hero::find($hero->id);
        return view('admin.heros.edit', compact('hero'));
    }

   public function update(Request $request, Hero $hero)
{
    $data = $request->validate([
        'title'       => 'required|string|max:255',
        'subtitle'    => 'nullable|string|max:500',
        'button_text' => 'nullable|string|max:255',
        'button_link' => 'nullable|string|max:255',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'status'      => 'nullable|boolean',
    ]);

    // Handle image upload with deletion of old image
    if ($request->hasFile('image')) {
        if ($hero->image && file_exists(public_path($hero->image))) {
            unlink(public_path($hero->image));
        }
        $data['image'] = uploadImage($request->file('image'), 'heros');
    }

    $hero->update($data);

    return response()->json([
        'status'  => 'success',
        'message' => 'Hero updated successfully!'
    ]);
}

    public function destroy(Hero $hero)
    {
        try {
            $hero->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Hero deleted successfully!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete hero. Please try again.'
            ], 500);
        }
    }
    public function toggleStatus(Hero $hero)
    {
        $hero->status = !$hero->status;
        $hero->save();

        return response()->json([
            'success' => true,
            'status' => $hero->status,
            'message' => $hero->status ? 'Hero activated successfully!' : 'Hero deactivated successfully!'
        ]);
    }
}
