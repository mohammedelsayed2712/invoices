@extends('layouts.master')
@section('title', __('trans.sections'))
@section("breadcrumb")
<li class="breadcrumb-item">{{ __('trans.sections') }}</li>
@endsection
@section('content')

<div class="col-12">
  <div class="card custom-card">
    <div class="card-header justify-content-between">
      <div class="card-title">{{ __('trans.sections') }}</div>
      <div class="prism-toggle">
        {{-- <a href="{{ route('sections.create') }}" class="btn btn-primary m-1">@lang("trans.AddNew")<i
            class="bi bi-plus-lg ms-2"></i></a> --}}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          {{-- Launch demo modal --}}
          @lang("trans.AddNew")
        </button>
      </div>
    </div>
    <div class="card-body">
      <table id="file-export" class="table table-bordered text-nowrap" style="width: 100%">
        <thead>
          <tr>
            <th>#</th>
            <th>@lang('trans.name')</th>
            <th>@lang('trans.description')</th>
            <th>@lang('trans.status')</th>
            <th>@lang('trans.created_at') </th>
            <th>@lang('trans.actions') </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($model as $section)
          <tr>
            <td>{{ $section->id}}</td>
            <td>{{ $section->name }}</td>
            <td>{{ $section->description }}</td>
            <td>{{ $section->status }}</td>
            <td>{{ $section->created_at->diffForHumans() }}</td>

            <td>
              <div class="hstack gap-2 fs-15">
                <a href="edit-products.html" class="btn btn-icon btn-sm btn-info-light"><i class="ri-edit-line"></i></a>
                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger-light product-btn"><i
                    class="ri-delete-bin-line"></i></a>
              </div>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


{{-- model add --}}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel1">Modal title</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save
          changes</button>
      </div>
    </div>
  </div>
</div>
@endsection