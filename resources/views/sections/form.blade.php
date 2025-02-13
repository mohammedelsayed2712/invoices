<div class="form-body row gy-4">
  {{-- Name --}}
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
    <label for="name" class="form-label">@lang('trans.name')</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $model->name ?? old('name') }}">
    @error('name')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Status -->
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
    <label for="status" class="form-label">@lang('trans.status')</label>
    <select name="status" id="status" class="form-control">
      <option value="active" {{ ($model->status ?? old('status')) == 'active' ? 'selected' : ''
        }}>@lang('trans.active')</option>
      <option value="inactive" {{ ($model->status ?? old('status')) == 'inactive' ? 'selected' : ''
        }}>@lang('trans.inactive')</option>
    </select>
    @error('status')
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  {{-- Description --}}
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <label for="description" class="form-label">@lang('trans.description')</label>
    <textarea name="description" id="description"
      class="form-control">{{ $model->description ?? old('description') }}</textarea>
    @error('description')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

</div>