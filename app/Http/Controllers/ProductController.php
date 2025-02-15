<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Section;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function __construct(private Product $model)
    {
    }

    public function index()
    {
        $model = $this->model->all();
        return view('products.index', compact('model'));
    }

    public function create()
    {
        $sections = Section::where('status', 'active')->pluck('name', 'id');

        return view('products.create', compact('sections'));
    }

    public function store(ProductRequest $request)
    {
        $this->model->create($request->validated());
        Alert::toast(__("trans.data_saved_successfully"), 'success');
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $model    = $this->model->findOrFail($id);
        $sections = Section::pluck('name', 'id');
        return view('products.edit', compact('model', 'sections'));
    }

    public function update(ProductRequest $request, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->update($request->validated());
        Alert::toast(__("trans.data_updated_successfully"), 'success');
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        Alert::toast(__("trans.data_deleted_successfully"), 'success');
        return redirect()->route('products.index');
    }
}
