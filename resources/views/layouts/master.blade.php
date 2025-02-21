<!DOCTYPE html>
{{-- <html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
  data-menu-styles="dark" data-toggled="close"> --}}
@if(LaravelLocalization::getCurrentLocale() == 'en')
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
  data-menu-styles="dark" data-toggled="close">

@elseif(LaravelLocalization::getCurrentLocale() == 'ar')
<html lang="ar" dir="rtl" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
  data-menu-styles="dark" data-toggled="close">
@endif

@include('partials.head')

<body>

  <div class="page">
    <!-- app-header -->
    @include('partials.header')
    <!-- /app-header -->
    @include('sweetalert::alert')

    <!-- Start::app-sidebar -->
    @include('partials.sidebar')
    <!-- End::app-sidebar -->

    <!-- Start::app-content -->
    <div class="main-content app-content">
      <div class="container-fluid">
        <!-- Start::page-header -->

        <div class="content-header-left col-md-6 col-12 mb-2 page-header-breadcrumb">
          <h3 class="page-title fw-semibold fs-18 my-3">@yield('title')</h3>
          <div class="ms-md-1 ms-0">
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('trans.home')</a></li>
                @yield('breadcrumb')
              </ol>
            </nav>
          </div>
        </div>

        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
          @yield('content')
        </div>
        <!-- End::row-1 -->
      </div>
    </div>
    <!-- End::app-content -->


    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->