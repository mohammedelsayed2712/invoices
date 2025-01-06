<head>
  <!-- Meta Data -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>{{ env('APP_NAME') }} | @yield('title')</title>
  <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template" />
  <meta name="Author" content="Spruko Technologies Private Limited" />
  <meta name="keywords"
    content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit." />

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon" />

  <!-- Bootstrap CSS -->

  <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

  <!-- Style CSS -->
  <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet" />

  <!-- Icons CSS -->
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

  <!-- Node Waves CSS -->
  <link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet" />

  <!-- Simplebar CSS -->
  <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet" />

  <!-- Color Picker CSS -->
  <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}" />

  <!-- Choices CSS -->
  <link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}" />

  <!-- JSVectorMap CSS -->
  <link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" />

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" />

  <!-- SweetAlert2 CSS -->
  {{--
  <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}" /> --}}
  <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />

  <!-- Choices JS -->
  <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

  <!-- Main Theme JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</head>