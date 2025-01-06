@extends('layouts.master')
@section('title', __('trans.profile'))
@section("breadcrumb")
<li class="breadcrumb-item">{{ __('trans.profile') }}</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card custom-card">
      <div class="card-header justify-content-between">
        <div class="tab-pane show active" id="personal-info" role="tabpanel">
          <div class="p-sm-3 p-0">
            <div class="card-title mb-3">
              @lang('trans.profile')
            </div>

            <!-- Start of Form -->
            <form method="POST" action="{{ route('profile.update') }}">
              @csrf
              @method('PUT')
              <!-- Use PUT method for updates -->

              <div class="row gy-4 mb-4">
                <div class="col-md-12">
                  <label for="name" class="form-label">@lang('trans.name')</label>
                  <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', auth()->user()->name) }}">
                  @error("name")
                  <span class="text-danger d-block mt-2">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-md-12">
                  <label for="email" class="form-label">@lang('trans.email')</label>
                  <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', auth()->user()->email) }}">
                  @error("email")
                  <span class="text-danger d-block mt-2">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-md-12">
                  <label for="password" class="form-label">@lang('trans.password')</label>
                  <input type="password" class="form-control" id="password" name="password">
                  @error("password")
                  <span class="text-danger d-block mt-2">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-md-12">
                  <label for="password_confirmation" class="form-label">@lang('trans.password_confirmation')</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                  @error("password_confirmation")
                  <span class="text-danger d-block mt-2">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <!-- Save Updates Button -->
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                  @lang('trans.save')
                </button>
              </div>
            </form>
            <!-- End of Form -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection