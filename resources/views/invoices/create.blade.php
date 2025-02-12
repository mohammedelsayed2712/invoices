@extends('layouts.master')

@section('title', __('trans.create_new'))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">@lang('trans.invoices')</a></li>
<li class="breadcrumb-item">@lang('trans.create')</li>
@endsection

@section('content')
<section id="basic-form-layouts">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
            <form action="{{ route('invoices.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @include('invoices.form')
              <button type="submit" class="btn btn-primary">@lang('trans.save')</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection