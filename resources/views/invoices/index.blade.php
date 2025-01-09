@extends('layouts.master')
@section('title', __('trans.invoices'))
@section("breadcrumb")
<li class="breadcrumb-item">{{ __('trans.invoices') }}</li>
@endsection
@section('content')

<div class="col-12">
  <div class="card custom-card">
    <div class="card-header justify-content-between">
      <div class="card-title">{{ __('trans.invoices') }}</div>
      <div class="prism-toggle">
        <a href="{{ route('invoices.create') }}" class="btn btn-primary m-1">@lang("trans.AddNew")<i
            class="bi bi-plus-lg ms-2"></i></a>
      </div>
    </div>
    <div class="card-body">
      <table id="file-export" class="table table-bordered text-nowrap" style="width: 100%">
        <thead>
          <tr>
            <th>@lang('trans.invoice_number')</th>
            <th>@lang('trans.invoice_date')</th>
            <th>@lang('trans.due_date')</th>
            <th>@lang('trans.product')</th>
            <th>@lang('trans.section')</th>
            <th>@lang('trans.discount')</th>
            <th>@lang('trans.rate_vat')</th>
            <th>@lang('trans.value_vat')</th>
            <th>@lang('trans.total')</th>
            <th>@lang('trans.value_status')</th>
            <th>@lang('trans.note')</th>
            <th>@lang('trans.user')</th>
            <th>@lang('trans.status')</th>
            <th>@lang('trans.created_at') </th>
            <th>@lang('trans.actions') </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($model as $invoice)
          <tr>
            <td>{{ $invoice->invoice_number }}</td>
            <td>{{ $invoice->invoice_date }}</td>
            <td>{{ $invoice->due_date }}</td>
            <td>{{ $invoice->product }}</td>
            <td>{{ $invoice->section }}</td>
            <td>{{ $invoice->discount }}</td>
            <td>{{ $invoice->rate_vat }}</td>
            <td>{{ $invoice->value_vat }}</td>
            <td>{{ $invoice->total }}</td>
            <td>{{ $invoice->value_status }}</td>
            <td>{{ $invoice->note }}</td>
            <td>{{ $invoice->user }}</td>
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