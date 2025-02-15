<div class="form-body row gy-4">
  {{-- Name --}}
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="name" class="form-label">@lang('trans.name')</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $model->name ?? old('name') }}">
    @error('name')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Section Field -->
  {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="section_id" class="form-label">@lang('trans.sections')</label>
    <select name=" section_id" id="section_id" class="form-control">
      <option value="">{{ __('trans.select_section') }}</option>
      @foreach($sections as $id => $name)
      <option value="{{ $id }}" {{ old($name)==$id ? 'selected' : '' }}>
        {{ $name }}
      </option>
      @endforeach
    </select>
    @error('section_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div> --}}
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="section_id" class="form-label">@lang('trans.sections')</label>
    <select name="section_id" id="section_id" class="form-control">
      <option value="">{{ __('trans.select_section') }}</option>
      @foreach($sections as $id => $name)
      <option value="{{ $id }}" {{ ($model->section_id ?? old('section_id')) == $id ? 'selected' : '' }}>
        {{ $name }}
      </option>
      @endforeach
    </select>
    @error('section_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  <!-- Status -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
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