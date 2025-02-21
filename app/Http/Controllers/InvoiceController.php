<?php
namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Section;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('section', 'product')->get();
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::where('status', 'active')->get();
        $code     = 'V' . date('Ymd') . '-' . time();

        return view('invoices.create', compact('sections', 'code'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request)
    {
        Invoice::create($request->validated());
        Alert::toast(__("trans.data_saved_successfully"), 'success');
        return redirect()->route('invoices.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice  = Invoice::find($id);
        $sections = Section::get();

        return view('invoices.edit', compact('invoice', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceRequest $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->validated());
        Alert::toast(__("trans.data_updated_successfully"), 'success');
        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        Alert::toast(__("trans.data_deleted_successfully"), 'success');
        return redirect()->route('invoices.index');
    }

    public function getProducts($section_id)
    {
        $products = Product::where('section_id', $section_id)->pluck('name', 'id');
        return response()->json($products);
    }
}
