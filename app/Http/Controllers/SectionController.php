<?php
namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Section;
use GuzzleHttp\Promise\Create;
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
        return view('sections.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        // Alert::toast(__("trans.data_updated_successfully"), 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     $model = $this->model->findOrFail($id);
    //     $model->delete();
    //     Alert::toast(__("trans.data_deleted_successfully"), 'success');
    //     return redirect()->route('sections.index');
    // }
    // public function destroy($id)
    // {
    //     $section = Section::findOrFail($id);
    //     $section->delete();

    //     return response()->json(['success' => true]);
    // }
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return response()->json([
            'success' => true,
            'message' => 'Section deleted successfully!',
        ]);
    }
}
