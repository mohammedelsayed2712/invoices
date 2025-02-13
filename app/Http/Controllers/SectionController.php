<?php
namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Section;
use RealRashid\SweetAlert\Facades\Alert;

class SectionController extends Controller
{
    public function __construct(private Section $model)
    {
    }

    public function index()
    {
        $model = Section::all();
        return view('sections.index', compact('model'));
    }

    public function create()
    {
        return view('sections.create');
    }

    public function store(SectionRequest $request)
    {
        $this->model->create($request->validated());
        Alert::toast(__("trans.data_saved_successfully"), 'success');
        return redirect()->route('sections.index');
    }

    public function edit($id)
    {
        $model = $this->model->findOrFail($id);
        return view('sections.edit', get_defined_vars());
    }

    public function update(SectionRequest $request, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->update($request->validated());
        Alert::toast(__("trans.data_updated_successfully"), 'success');
        return redirect()->route('sections.index');
    }

    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        Alert::toast(__("trans.data_deleted_successfully"), 'success');
        return redirect()->route('sections.index');
    }
}
