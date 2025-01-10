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
      {{-- <div class="prism-toggle">
        <a href="{{ route('sections.create') }}" class="btn btn-primary m-1">@lang("trans.AddNew")<i
            class="bi bi-plus-lg ms-2"></i></a>
      </div> --}}
      <div class="prism-toggle">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">@lang("trans.AddNew")</a>
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
            {{-- <td>{{ $section->status }}</td> --}}
            <td>
              @if ($section->status == 'active')
              <span class="btn btn-primary btn-wave">@lang('trans.active')</span>
              @else
              <span class="btn btn-danger btn-wave">@lang('trans.inactive')</span>
              @endif
            </td>
            <td>{{ $section->created_at->diffForHumans() }}</td>

            <td>
              {{-- <div class="hstack gap-2 fs-15">
                <a href="edit-products.html" class="btn btn-icon btn-sm btn-info-light"><i class="ri-edit-line"></i></a>
                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger-light product-btn"><i
                    class="ri-delete-bin-line"></i></a>
              </div> --}}
              <button class="btn btn-icon btn-sm btn-info-light" data-id="{{ $section->id }}"
                data-name="{{ $section->name }}" data-status="{{ $section->status }}" data-price="{{ $section->price }}"
                data-bs-toggle="modal" data-bs-target="#editModal">
                {{-- icon --}}
                <i class="ri-edit-line"></i></button>
              <button class="btn btn-icon btn-sm btn-danger-light product-btn" data-id="{{ $section->id }}">
                {{-- icon --}}
                <i class="ri-delete-bin-line"></i></button>
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
        <h6 class="modal-title" id="exampleModalLabel1">@lang("trans.Add Section")</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('sections.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="name"><strong>@lang('trans.name')</strong></label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
              value="{{ old('name') }}">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="description"><strong>@lang('trans.description')</strong></label>
            <textarea name="description" id="description"
              class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="status"><strong>@lang('trans.status')</strong></label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
              {{-- <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>@lang('trans.active')</option>
              <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>@lang('trans.inactive')
              </option> --}}
              <option value="active">@lang('trans.active')</option>
              <option value="inactive">@lang('trans.inactive')</option>
            </select>
            @error('status')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection