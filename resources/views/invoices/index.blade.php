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
            <a href="{{ route('invoices.create') }}" class="btn btn-primary btn-sm right">
              <i class="fas fa-plus">@lang('trans.add_item')</i>
            </a>
          </div>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table text-nowrap">
              <thead>
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">@lang('trans.invoice_number')</th>
                  <th scope="col">@lang('trans.product')</th>
                  <th scope="col">@lang('trans.section')</th>
                  <th scope="col">@lang('trans.status')</th>
                  <th>@lang('trans.created_at')</th>
                  <th scope="col">@lang('trans.actions')</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($models as $model)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $model->invoice_number }}</td>
                  <td>{{ $model->product }}</td>
                  <td>{{ $model->section }}</td>
                  <td>{{ $model->status }}</td>
                  <td>{{ $model->created_at->diffForHumans() }}</td>
                  <td>
                    <div class="hstack gap-2 flex-wrap">
                      <a href="{{ route('invoices.edit', $model->id) }}" class="text-info fs-14 lh-1"><i
                          class="ri-edit-line"></i></a>
                      <a href="{{ route('invoices.delete', $model->id) }}" class="text-danger fs-14 lh-1"><i
                          class="ri-delete-bin-5-line"></i></a>
                    </div>
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