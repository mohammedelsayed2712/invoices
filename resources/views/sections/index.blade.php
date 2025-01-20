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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
            <th>@lang('trans.created_at')</th>
            <th>@lang('trans.actions')</th>
          </tr>
        </thead>
        <tbody id="sectionsTableBody">
          @foreach ($model as $section)
          <tr>
            <td>{{ $section->id }}</td>
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

{{-- Modal for Adding New Section --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="createSectionForm" action="{{ route('sections.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel1">@lang('trans.create_new')</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- Name Field --}}
          <div class="form-group mb-3">
            <label for="name" class="mb-1"><strong>@lang('trans.name')</strong></label>
            <input type="text" name="name" class="form-control" id="editName">
            <span class="text-danger" id="editNameError"></span>
          </div>

          {{-- Description Field --}}
          <div class="form-group mb-3">
            <label for="description" class="mb-1"><strong>@lang('trans.description')</strong></label>
            <textarea name="description" class="form-control" id="editDescription" rows="3"></textarea>
            <span class="text-danger" id="editDescriptionError"></span>
          </div>

          {{-- Status Field --}}
          <div class="form-group mb-3">
            <label for="status" class="mb-1"><strong>@lang('trans.status')</strong></label>
            <select name="status" class="form-control" id="editStatus">
              <option value="active">@lang('trans.active')</option>
              <option value="inactive">@lang('trans.inactive')</option>
            </select>
            <span class="text-danger" id="editStatusError"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('trans.close')</button>
          <button type="submit" class="btn btn-primary">@lang('trans.save')</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  // Clear validation errors when the modal is opened
  $('#exampleModal').on('show.bs.modal', function () {
    document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');
  });

  // Handle form submission
  document.getElementById('createSectionForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    const form = e.target;
    const formData = new FormData(form);

    // Clear previous error messages
    document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');

    fetch(form.action, {
      method: 'POST',
      body: formData,
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token
        'Accept': 'application/json', // Ensure the response is JSON
      },
    })
    .then(response => {
      if (!response.ok) {
        return response.json().then(err => { throw err; });
      }
      return response.json();
    })
    .then(data => {
      if (data.success) {
        // Close the modal
        $('#exampleModal').modal('hide');

        // Clear the form
        form.reset();

        // Add the new section to the table dynamically
        const newRow = `
          <tr>
            <td>${data.section.id}</td>
            <td>${data.section.name}</td>
            <td>${data.section.description}</td>
            <td>${data.section.status}</td>
            <td>Just now</td>
            <td>
              <div class="hstack gap-2 fs-15">
                <a href="edit-products.html" class="btn btn-icon btn-sm btn-info-light"><i class="ri-edit-line"></i></a>
                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger-light product-btn"><i
                    class="ri-delete-bin-line"></i></a>
              </div>
            </td>
          </tr>
        `;
        document.getElementById('sectionsTableBody').insertAdjacentHTML('beforeend', newRow);
      }
    })
    .catch(error => {
      // Handle validation errors
      if (error.errors) {
        for (const field in error.errors) {
          const errorMessage = error.errors[field][0];
          document.getElementById(`edit${field.charAt(0).toUpperCase() + field.slice(1)}Error`).textContent = errorMessage;
        }
      } else {
        console.error('Error:', error);
      }
    });
  });
</script>
@endsection