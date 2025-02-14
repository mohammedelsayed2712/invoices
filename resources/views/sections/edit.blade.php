@extends('layouts.master')

@section('title', __('trans.edit'))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('sections.index') }}">@lang('trans.sections')</a></li>
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
              <form action="{{ route('sections.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('sections.form')
                <button type="submit" class="btn btn-primary mt-2">@lang('trans.save')</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection