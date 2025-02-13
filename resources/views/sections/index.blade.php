@extends('layouts.master')
@section('title', __('trans.sections'))
@section("breadcrumb")
<li class="breadcrumb-item">{{ __('trans.sections') }}</li>
@endsection

@section('content')
<div class="main-content mt-2">
  <div class="container-fluid">
    <div class="row">
      <div class="card custom-card">
        <div class="card-header justify-content-between">
          <div class="card-title">
            @lang('trans.sections')
          </div>
          <div class="prism-toggle">
            <a href="{{ route('sections.create') }}" class="btn btn-primary btn-sm right">
              <i class="fas fa-plus">@lang('trans.add_item')</i>
            </a>
          </div>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="file-export" class="table table-bordered text-nowrap" style="width: 100%">
              <thead>
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">@lang('trans.name')</th>
                  <th scope="col">@lang('trans.description')</th>
                  <th scope="col">@lang('trans.status')</th>
                  <th scope="col">@lang('trans.created_at')</th>
                  <th scope="col">@lang('trans.actions')</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($model as $section)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $section->name }}</td>
                  <td>{{ $section->description }}</td>
                  {{-- <td>{{ __('trans.' . $section->status) }}</td> --}}
                  <td>
                    @if ($section->status == 'active')
                    <span class="btn btn-success">@lang('trans.active')</span>
                    @else
                    <span class="btn btn-danger">@lang('trans.inactive')</span>
                    @endif
                  </td>

                  <td>{{ $section->created_at->diffForHumans() }}</td>
                  <td>
                    <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-info btn-sm text-white">
                      <i class="fas fa-edit small"></i> @lang('trans.edit')
                    </a>

                    <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm delete">
                        <i class="fas fa-trash small"></i> @lang('trans.delete')
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer d-none border-top-0">
        </div>
      </div>

    </div>
  </div>
</div>
@endsection