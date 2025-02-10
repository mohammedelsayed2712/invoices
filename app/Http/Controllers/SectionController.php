<?php
namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SectionController extends Controller
{
    public function __construct(private Section $model)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = $this->model->all();
        return view('sections.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::pluck('name', 'id')->toArray();
        return view('expenses.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        $this->model->create($request->validated());
        Alert::toast(__("trans.data_saved_successfully"), 'success');
        return redirect()->route('sections.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sections = Section::pluck('name', 'id')->toArray();
        $model    = $this->model->findOrFail($id);

        return view('sections.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(SectionRequest $request, $id)
    // {
    //     $model = $this->model->findOrFail($id);
    //     $model->update($request->validated());
    //     Alert::toast(__("trans.data_updated_successfully"), 'success');
    //     return response()->json(['success' => 'Section updated successfully!']);
    // }
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
        ]);

        $section->update($request->all());

        return response()->json(['success' => true, 'message' => 'Section updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     $model = $this->model->findOrFail($id);
    //     $model->delete();
    //     Alert::toast(__("trans.data_deleted_successfully"), 'success');
    //     return response()->json(['success' => 'Section deleted successfully!']);
    // }
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        Alert::toast(__("trans.data_deleted_successfully"), 'success');
        return response()->json(['success' => 'PriceSegment deleted successfully!']);
    }
}
