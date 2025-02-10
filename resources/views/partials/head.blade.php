<head>
  <!-- Meta Data -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>{{ env('APP_NAME') }} | @yield('title')</title>
  <meta name="description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template" />
  <meta name="author" content="Spruko Technologies Private Limited" />
  <meta name="keywords"
    content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit." />

  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="{{ env('APP_NAME') }} | @yield('title')" />
  <meta property="og:description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://yourwebsite.com/current-page" />
  <meta property="og:image" content="https://yourwebsite.com/assets/images/og-image.jpg" />

  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="{{ env('APP_NAME') }} | @yield('title')" />
  <meta name="twitter:description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template" />

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon" />

  <!-- Preload Critical Resources -->
  <link rel="preload" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" as="style" />
  <link rel="preload" href="{{ asset('assets/css/styles.css') }}" as="style" />

  @if(app()->getLocale() == "ar")
  <!-- Bootstrap CSS -->
  <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet" />
  @else
  <!-- Bootstrap CSS -->
  <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  @endif

  <!-- Style CSS -->
  <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />

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
  <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Choices JS -->
  <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}" defer></script>

  <!-- Main Theme JS -->
  <script src="{{ asset('assets/js/main.js') }}" defer></script>

  <!-- Prism CSS -->
  <link rel="stylesheet" href="{{ asset('assets/libs/prismjs/themes/prism-coy.min.css') }}">
</head>