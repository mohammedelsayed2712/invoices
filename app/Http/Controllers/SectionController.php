<?php
namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $model = Section::all();
        return view('sections.index', compact('model'));
    }

    public function create()
    {
        return view('sections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Section::create($request->all());

        return redirect()->route('sections.index')->with('Add', 'Section added successfully.');
    }

    public function show(Section $section)
    {
        return view('sections.show', compact('section'));
    }

    public function edit(Section $section)
    {
        return view('sections.edit', compact('section'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $section->update($request->all());

        return redirect()->route('sections.index')->with('edit', 'Section updated successfully.');
    }

    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()->route('sections.index')->with('delete', 'Section deleted successfully.');
    }
}
