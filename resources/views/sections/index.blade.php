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
        <a href="{{ route('sections.create') }}" class="btn btn-primary m-1">@lang("trans.AddNew")<i
            class="bi bi-plus-lg ms-2"></i></a>
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
            <td>{{ $invoice->name }}</td>
            <td>{{ $invoice->description }}</td>
            <td>{{ $invoice->status }}</td>
            {{-- <td>{{ $invoice->created_at->format('Y-m-d H:i:s') }}</td> --}}
            <td>{{ $invoice->created_at->diffForHumans() }}</td>

            <td>
              <a href=" {{ route('countries.edit', $job->id) }}" class="btn btn-info btn-md">@lang('trans.edit')</i></a>

              {!! Form::open(['route' => ['countries.destroy', $job->id], 'method' => 'delete', 'style' =>
              'display:inline' ,
              ]) !!}
              {!! Form::close() !!}

            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection