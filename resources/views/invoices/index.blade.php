@extends('layouts.master')
@section('title', __('trans.invoices'))
@section("breadcrumb")
<li class="breadcrumb-item">{{ __('trans.invoices') }}</li>
@endsection

@section('content')
<div class="main-content mt-2">
  <div class="container-fluid">
    <div class="row">
      <div class="card custom-card">
        <div class="card-header justify-content-between">
          <div class="card-title">
            @lang('trans.invoices')
          </div>
          <div class="prism-toggle">
            <a href="{{ route('invoices.create') }}" class="btn btn-md btn-primary">@lang('trans.add_item') <i
                class="fas fa-plus"></i>
            </a>
          </div>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="file-export" class="table table-bordered text-nowrap" style="width: 100%">
              <thead>
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">@lang('trans.invoice_number')</th>
                  <th scope="col">@lang('trans.product')</th>
                  <th scope="col">@lang('trans.section')</th>
                  <th scope="col">@lang('trans.status')</th>
                  <th scope="col">@lang('trans.created_at')</th>
                  <th scope="col">@lang('trans.actions')</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($invoices as $invoice)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $invoice->invoice_number }}</td>
                  <td>{{ $invoice->product }}</td>
                  <td>{{ $invoice->section->name }}</td>
                  {{-- <td>{{ __('trans.' . $invoice->status) }}</td> --}}
                  <td>
                    @if ($invoice->status == 'active')
                    <span class="btn btn-success">@lang('trans.active')</span>
                    @else
                    <span class="btn btn-danger">@lang('trans.inactive')</span>
                    @endif
                  </td>

                  <td>{{ $invoice->created_at->diffForHumans() }}</td>
                  <td>
                    <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-info btn-sm text-white">
                      <i class="fas fa-edit small"></i> @lang('trans.edit')
                    </a>

                    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
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