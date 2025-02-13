@extends('layouts.master')

@section('title', __('trans.create_new'))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('sections.index') }}">@lang('trans.sections')</a></li>
<li class="breadcrumb-item">@lang('trans.create')</li>
@endsection

@section('content')
<section id="basic-form-layouts">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
            <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @include('sections.form')
              <button type="submit" class="btn btn-primary mt-2">@lang('trans.save')</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection