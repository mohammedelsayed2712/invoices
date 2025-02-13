@extends('layouts.master')

@section('title', __('trans.edit'))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">@lang('trans.invoices')</a></li>
<li class="breadcrumb-item">@lang('trans.edit')</li>
@endsection

@section('content')
<div class="content-body">
  <section id="basic-form-layouts">
    <div class="row justify-content-md-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-content collapse show">
            <div class="card-body">
              <form action="{{ route('invoices.update', $invoice->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('invoices.form')
                <button type="submit" class="btn btn-primary">@lang('trans.save')</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection