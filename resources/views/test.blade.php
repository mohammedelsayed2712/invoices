@extends('layouts.master')
@section('title', __('trans.categories'))
@section("breadcrumb")
<li class="breadcrumb-item">{{ __('trans.categories') }}</li>
@endsection
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card custom-card">
      <div class="card-header justify-content-between">
        <div class="card-title">
          @lang('trans.categories')
        </div>
        {{-- <div class="prism-toggle">
          <button class="btn btn-primary-light m-1" data-bs-toggle="modal" data-bs-target="#create">@lang("trans.Add
            New")<i class="bi bi-plus-lg ms-2"></i></button>
        </div> --}}
      </div>
      <div class="card-body">

      </div>

    </div>
  </div>
</div>

@endsection