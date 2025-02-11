@extends('layouts.master')
@section('title', __('trans.invoices'))
@section("breadcrumb")
<li class="breadcrumb-item">{{ __('trans.invoices') }}</li>
@endsection

@section('content')
<form action="{{ route('invoices.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-xl-12">
      <div class="card custom-card">

        <div class="card-body">
          <div class="row gy-4">

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="invoice_number" class="form-label">@lang('trans.invoice_number')</label>
              <input type="text" name="invoice_number" id="invoice_number" class="form-control"
                value="{{ $invoice->invoice_number ?? old('invoice_number') }}">
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="invoice_date" class="form-label">@lang('trans.invoice_date')</label>
              <input type="date" name="invoice_date" id="invoice_date" class="form-control"
                value="{{ $invoice->invoice_date ?? old('invoice_date') }}">
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="due_date" class="form-label">@lang('trans.due_date')</label>
              <input type="date" name="due_date" id="due_date" class="form-control"
                value="{{ $invoice->due_date ?? old('due_date') }}">
            </div>

            <!-- Product Field -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="product" class="form-label">@lang('trans.product')</label>
              <input type="text" name="product" id="product" class="form-control"
                value="{{ $invoice->product ?? old('product') }}">
            </div>

            <!-- Section Field -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="section" class="form-label">@lang('trans.section')</label>
              <input type="text" name="section" id="section" class="form-control"
                value="{{ $invoice->section ?? old('section') }}">
            </div>

            <!-- Discount Field -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="discount" class="form-label">@lang('trans.discount')</label>
              <input type="text" name="discount" id="discount" class="form-control"
                value="{{ $invoice->discount ?? old('discount') }}">
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="rate_vat" class="form-label">@lang('trans.rate_vat')</label>
              <input type="text" name="rate_vat" id="rate_vat" class="form-control"
                value="{{ $invoice->rate_vat ?? old('rate_vat') }}">
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="value_vat" class="form-label">@lang('trans.value_vat')</label>
              <input type="text" name="value_vat" id="value_vat" class="form-control"
                value="{{ $invoice->value_vat ?? old('value_vat') }}">
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="total" class="form-label">@lang('trans.total')</label>
              <input type="number" name="total" id="total" class="form-control"
                value="{{ $invoice->total ?? old('total') }}">
            </div>

            <!-- Value Status -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="value_status" class="form-label">@lang('trans.value_status')</label>
              <input type="number" name="value_status" id="value_status" class="form-control"
                value="{{ $invoice->value_status ?? old('value_status') }}">
            </div>

            <!-- User -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="user" class="form-label">@lang('trans.user')</label>
              <input type="text" name="user" id="user" class="form-control" value="{{ $invoice->user ?? old('user') }}">
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
              <label for="status" class="form-label">@lang('trans.status')</label>
              <select name="status" id="status" class="form-control">
                <option value="active" {{ ($invoice->status ?? old('status')) == 'active' ? 'selected' : ''
                  }}>@lang('trans.active')</option>
                <option value="inactive" {{ ($invoice->status ?? old('status')) == 'inactive' ? 'selected' : ''
                  }}>@lang('trans.inactive')</option>
              </select>
            </div>

            <!-- Note -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <label for="note" class="form-label">@lang('trans.note')</label>
              <textarea name="note" id="note" class="form-control"
                rows="1">{{ $invoice->note ?? old('note') }}</textarea>
            </div>

          </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 my-3 mx-2">
          <button type="submit" class="btn btn-primary">@lang('trans.save')</button>
        </div>

        <div class="card-footer d-none border-top-0">
        </div>
      </div>
    </div>
  </div>
</form>
@endsection