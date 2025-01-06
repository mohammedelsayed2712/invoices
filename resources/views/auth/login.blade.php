@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        {{-- @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $errors->first() }}</strong>
        </div>
        @endif --}}
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="my-4 d-flex justify-content-center">
                <img src="{{ asset('assets/images/brand-logos/pal.jpg') }}" alt="logo" class="desktop-logo"
                    style="width: 120px; height: 90px;">
            </div>
            <div class=" card custom-card">
                <div class="card-body p-5">
                    {{-- <p class="h5 fw-semibold mb-2 text-center">Sign In</p> --}}
                    <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back !</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="email" class="form-label text-default">Email</label>
                                <input type="text" class="form-control form-control-lg" id="email" name="email"
                                    placeholder="email">
                                @error("email")
                                <span class="text-danger d-block mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="password" class="form-label text-default d-block">Password
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" id="password"
                                            name="password" placeholder="password">
                                        <button class="btn btn-light" type="button"
                                            onclick="togglePassword('password', this)" id="button-addon2">
                                            <i class="ri-eye-off-line align-middle"></i>
                                        </button>
                                    </div>
                                    @error("password")
                                    <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                Remember password ?
                                            </label>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Bootstrap JS -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Show Password JS -->
<script>
    function togglePassword(inputId, button) {
      const passwordInput = document.getElementById(inputId);
      const icon = button.querySelector('i');
  
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('ri-eye-off-line');
        icon.classList.add('ri-eye-line');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('ri-eye-line');
        icon.classList.add('ri-eye-off-line');
      }
    }
</script>