@extends('layouts.master')
@section('title', __('trans.sections'))
@section('breadcrumb')
<li class="breadcrumb-item">
  @lang('trans.sections')
</li>
@endsection

@section('content')
<section>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="prism-toggle">
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">@lang("trans.AddNew")</a>
          </div>
        </div>
        <div class="card-content py-2 collapse show">
          <table
            class="table border dataTable @if(app()->getLocale() == 'ar') table-hover @else table-striped responsive @endif">
            <thead>
              <tr>
                <th>@lang('trans.name')</th>
                <th>@lang('trans.description')</th>
                <th>@lang('trans.status')</th>
                <th>@lang('trans.created_at')</th>
                <th>@lang('trans.actions')</th>
              </tr>
            </thead>
            <tbody id="sectionTableBody">
              @foreach ($model as $section)
              <tr id="row-{{ $section->id }}">
                <td>{{ $section->name }}</td>
                <td>{{ $section->description }}</td>
                <td>
                  @if ($section->status == 'active')
                  <span class="badge badge-success">@lang('trans.active')</span>
                  @else
                  <span class="badge badge-danger">@lang('trans.inactive')</span>
                  @endif
                </td>
                <td>{{ $section->created_at->diffForHumans() }}</td>
                <td>
                  <button class="btn btn-info btn-sm edit-btn text-white" data-id="{{ $section->id }}"
                    data-name="{{ $section->name }}" data-description="{{ $section->description }}"
                    data-status="{{ $section->status }}" data-bs-toggle="modal" data-bs-target="#editModal">
                    <i class="fas fa-edit small"></i> @lang('trans.edit')
                  </button>
                  <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $section->id }}">
                    <i class="fas fa-trash small"></i> @lang('trans.delete')
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
</section>

<!-- Modal for Adding section -->
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
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
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
              <select name="status" class="form-control form-select @error('status') is-invalid @enderror" id="status"
                required style="background-position: left .75rem center !important;">
                <option value="active">@lang('trans.active')</option>
                <option value="inactive">@lang('trans.inactive')</option>
              </select>
              <span class="text-danger" id="addStatusError"></span>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center pb-0">
            <button type="submit" class="btn btn-success">
              <i class="fas fa-save small"></i> @lang('trans.save')
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('trans.create_close')</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Editing section -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h5 class="modal-title" id="editModalLabel">@lang('trans.edit')</h5>
        <button type="button" class="btn-close  m-inherit" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editForm">
          @csrf
          @method('PUT')
          <input type="hidden" id="editId">
          <div class="form-body">
            <div class="form-group">
              <label for="editName"><strong>@lang('trans.name')</strong></label>
              <input type="text" name="name" class="form-control" id="editName">
              <span class="text-danger" id="editNameError"></span>
            </div>
            <div class="form-group">
              <label for="editDescription"><strong>@lang('trans.description')</strong></label>
              <textarea name="description" class="form-control" id="editDescription" rows="3"></textarea>
              <span class="text-danger" id="editDescriptionError"></span>
            </div>
            <div class="form-group">
              <label for="editStatus"><strong>@lang('trans.status')</strong></label>
              <select name="status" class="form-control form-select" id="editStatus"
                style="background-position: left .75rem center !important;">
                <option value="active">@lang('trans.active')</option>
                <option value="inactive">@lang('trans.inactive')</option>
              </select>
              <span class="text-danger" id="editStatusError"></span>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center pb-0">
            <button type="submit" class="btn btn-success">
              <i class="fas fa-save small"></i> @lang('trans.save')
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('trans.create_close')</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $('.dataTable').DataTable();

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
                        $("#addNameError").text(item);
                    } else if (key === 'description') {
                        $("#addDescriptionError").text(item);
                    } else if (key === 'status') {
                        $("#addStatusError").text(item);
                    }
                });
            }
        });
    });

    // Edit section
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

    $("#editForm").submit(function(e) {
        e.preventDefault();
        var id = $('#editId').val();
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('sections.update', ':id') }}".replace(':id', id),
            type: "POST",
            data: formData,
            success: function() {
                window.location.reload();
            },
            error: function(xhr) {
                $("#editNameError, #editDescriptionError, #editStatusError").text('');
                $.each(xhr.responseJSON.errors, function(key, item) {
                    if (key === 'name') {
                        $("#editNameError").text(item);
                    } else if (key === 'description') {
                        $("#editDescriptionError").text(item);
                    } else if (key === 'status') {
                        $("#editStatusError").text(item);
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