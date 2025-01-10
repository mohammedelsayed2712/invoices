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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        Section::Create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('sections.index')->with('success', 'Section created successfully!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
