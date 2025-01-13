<?php

namespace App\Http\Controllers;

use App\Models\Section;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

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
    // public function store(SectionRequest $request)
    // {
    //     $this->model->create($request->validated());

    //     Alert::toast(__("trans.data_saved_successfully"), 'success');
    //     return redirect()->route('sections.index');
    // }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $section = Section::create($validatedData);

        return response()->json([
            'success' => true,
            'section' => $section,
        ]);
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
    public function destroy(Section $section)
    {
        // Alert::toast(__("data_deleted_successfully"), 'success');
    }
}
