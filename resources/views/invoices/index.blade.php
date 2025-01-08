@extends('layouts.master')
@section('title', __('trans.invoices'))
@section("breadcrumb")
<li class="breadcrumb-item">{{ __('trans.invoices') }}</li>
@endsection
@section('content')

<div class="col-12">
  <div class="card custom-card">
    <div class="card-header">
      <div class="card-title">Add New Row</div>
      <div class="prism-toggle">
        <button class="btn btn-primary-light m-1 " data-bs-toggle="modal"
          data-bs-target="#create">@lang("trans.AddNew")<i class="bi bi-plus-lg ms-2"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        {{-- <div class="text-center">
          <button id="addRow" class="btn btn-primary mb-2 data-table-btn">
            Add new row
          </button>
        </div> --}}
        <table id="add-row" class="table table-bordered text-nowrap" style="width: 100%">
          <thead>
            <tr>
              <th>Column 1</th>
              <th>Column 2</th>
              <th>Column 3</th>
              <th>Column 4</th>
              <th>Column 5</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011-04-25</td>
            </tr>
            <tr>
              <td>Garrett Winters</td>
              <td>Accountant</td>
              <td>Tokyo</td>
              <td>63</td>
              <td>2011-07-25</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection