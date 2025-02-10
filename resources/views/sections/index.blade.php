@extends('layouts.master')
@section('title', __('trans.sections'))
@section("breadcrumb")
<li class="breadcrumb-item">{{ __('trans.sections') }}</li>
@endsection

@section('content')
<section>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            <button class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
              <i class="ft-plus"></i> @lang('trans.add')
            </button>
          </h4>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        </div>
        <div class="card-content py-2 collapse show">
          <table
            class="table border dataTable @if (app()->getLocale() == 'ar') table-hover @else table-striped responsive @endif">
            <thead>
              <th>#</th>
              <th>@lang('trans.name')</th>
              <th>@lang('trans.description')</th>
              <th>@lang('trans.status')</th>
              <th>@lang('trans.created_at')</th>
              <th>@lang('trans.actions')</th>
            </thead>
            <tbody>
              @foreach ($model as $section)
              <tr>
                <td>{{ $section->id }}</td>
                <td>{{ $section->name }}</td>
                <td>{{ $section->description }}</td>
                <td>{{ $section->status }}</td>
                <td>{{ $section->created_at->diffForHumans() }}</td>
                <td>
                  <button class="btn btn-info btn-sm edit-btn text-white" data-id="{{ $section->id }}"
                    data-name="{{ $section->name }}" data-description="{{ $section->description }}"
                    data-status="{{ $section->status }}" data-bs-toggle="modal" data-bs-target="#editModal">
                    <i class="fas fa-edit small"></i>
                    @lang('trans.edit')
                  </button>
                  <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $section->id }}">
                    <i class="fas fa-trash small"></i>
                    @lang('trans.delete')
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Section Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <h5 class="modal-title" id="addModalLabel">@lang('trans.create_add')</h5>
          <button type="button" class="btn-close m-inherit" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addForm">
            @csrf
            <div class="form-body">
              <div class="form-group">
                <label for="name"><strong>@lang('trans.name')</strong></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="text-danger" role="addNameError">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="text-danger" id="addNameError"></span>
              </div>
              <div class="form-group">
                <label for="description"><strong>@lang('trans.description')</strong></label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                  rows="3"></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="text-danger" id="addDescriptionError"></span>
              </div>
              <div class="form-group">
                <label for="status"><strong>@lang('trans.status')</strong></label>
                <select name="status" class="form-control @error('status') is-invalid @enderror">
                  <option value="active">@lang('trans.active')</option>
                  <option value="inactive">@lang('trans.inactive')</option>
                </select>
                @error('status')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="text-danger" id="addStatusError"></span>
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-center pb-0">
              <button type="submit" class="btn btn-success px-3">
                <i class="fas fa-save small"></i>
                @lang('trans.save')
              </button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('trans.close')</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Section Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <h5 class="modal-title" id="editModalLabel">@lang('trans.edit')</h5>
          <button type="button" class="btn-close m-inherit" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editForm">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId">
            <div class="form-body">
              <div class="form-group">
                <label for="editName"><strong>@lang('trans.name')</strong></label>
                <input type="text" name="name" id="editName" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="text-danger" id="editNameError"></span>
              </div>
              <div class="form-group">
                <label for="editDescription"><strong>@lang('trans.description')</strong></label>
                <textarea name="description" id="editDescription"
                  class="form-control @error('description') is-invalid @enderror" rows="3"></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="text-danger" id="editDescriptionError"></span>
              </div>
              <div class="form-group">
                <label for="editStatus"><strong>@lang('trans.status')</strong></label>
                <select name="status" id="editStatus" class="form-control @error('status') is-invalid @enderror">
                  <option value="active">@lang('trans.active')</option>
                  <option value="inactive">@lang('trans.inactive')</option>
                </select>
                @error('status')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="text-danger" id="editStatusError"></span>
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-center pb-0">
              <button type="submit" class="btn btn-success">
                <i class="fas fa-save small"></i>
                @lang('trans.save')
              </button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('trans.close')</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    // Add section
    $("#addForm").submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();

      $.ajax({
        url: "{{ route('sections.store') }}",
        type: "POST",
        data: formData,
        success: function() {
          window.location.reload();
        },
        error: function(xhr) {
          $("#addNameError, #addDescriptionError, #addStatusError").text('');
          $.each(xhr.responseJSON.errors, function(key, item) {
            if (key === 'name') {
              $("#addNameError").text(item[0]);
            } else if (key === 'description') {
              $("#addDescriptionError").text(item[0]);
            } else if (key === 'status') {
              $("#addStatusError").text(item[0]);
            }
          });
        }
      });
    });

    // Edit section - Populate modal
    $(document).on("click", ".edit-btn", function() {
      var id = $(this).data('id');
      var name = $(this).data('name');
      var description = $(this).data('description');
      var status = $(this).data('status');

      $('#editId').val(id);
      $('#editName').val(name);
      $('#editDescription').val(description);
      $('#editStatus').val(status);
    });

    // Edit section - Submit form
    $("#editForm").submit(function(e) {
      e.preventDefault();
      var id = $('#editId').val();
      var formData = $(this).serialize();

      $.ajax({
        url: "{{ route('sections.update', ':id') }}".replace(':id', id),
        type: "PUT",
        data: formData,
        success: function() {
          window.location.reload();
        },
        error: function(xhr) {
          $("#editNameError, #editDescriptionError, #editStatusError").text('');
          $.each(xhr.responseJSON.errors, function(key, item) {
            if (key === 'name') {
              $("#editNameError").text(item[0]);
            } else if (key === 'description') {
              $("#editDescriptionError").text(item[0]);
            } else if (key === 'status') {
              $("#editStatusError").text(item[0]);
            }
          });
        }
      });
    });

    // Delete section
    $(document).on("click", ".delete-btn", function() {
      var id = $(this).data('id');
      if (confirm('@lang('trans.delete_confirm')')) {
        $.ajax({
          type: "DELETE",
          url: "{{ route('sections.destroy', ':id') }}".replace(':id', id),
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          success: function() {
            window.location.reload();
          },
          error: function() {
            alert('@lang('trans.delete_error')');
          }
        });
      }
    });
  });
</script>
@endpush