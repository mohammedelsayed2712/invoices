<aside class="app-sidebar sticky" id="sidebar">
  <!-- Start::main-sidebar-header -->
  <div class="main-sidebar-header">
    <a href="{{ route('home') }}" class="header-logo">
      <img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo" />
      <img src="{{ asset('assets/images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo" />
      <img src="{{ asset('assets/images/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark" />
      <img src="{{ asset('assets/images/brand-logos/toggle-dark.png') }}" alt="logo" class="toggle-dark" />
    </a>
  </div>
  <!-- End::main-sidebar-header -->

  <!-- Start::main-sidebar -->
  <div class="main-sidebar" id="sidebar-scroll">
    <!-- Start::nav -->
    <nav class="main-menu-container nav nav-pills flex-column sub-open">
      <div class="slide-left" id="slide-left">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
          <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
        </svg>
      </div>
      <ul class="main-menu">

        <li class="slide">
          <a href="{{ route('home') }}" class="side-menu__item">
            <i class="bx bx-home side-menu__icon"></i>
            <span class="side-menu__label">@lang('trans.home')</span>
          </a>
        </li>

        <!-- Start::slide__category -->
        <li class="slide__category">
          <span class="category-name">Main</span>
        </li>
        <!-- End::slide__category -->

        <!-- Start::slide -->
        <li class="slide">
          <a href="{{ route('sections.index') }}" class="side-menu__item">
            <i class="bx bx-grid side-menu__icon"></i>
            <span class="side-menu__label">@lang('trans.categories')</span>
          </a>
        </li>
        <!-- End::slide -->

        <!-- Start::slide -->
        <li class="slide">
          <a href="{{ route('products.index') }}" class="side-menu__item">
            <i class="bx bx-cart-alt side-menu__icon"></i>
            <span class="side-menu__label">@lang('trans.products')</span>
          </a>
        </li>
        <!-- End::slide -->

        <!-- Start::slide -->
        <li class="slide has-sub">
          <a href="javascript:void(0);" class="side-menu__item">
            <i class="bx bx-receipt side-menu__icon"></i>
            <span class="side-menu__label">@lang('trans.Invoices')</span>
            <i class="fe fe-chevron-right side-menu__angle"></i>
          </a>
          <ul class="slide-menu child1">
            <li class="slide side-menu__label1">
              <a href="javascript:void(0)">@lang('trans.Invoices')</a>
            </li>
            <li class="slide">
              <a href="{{ route('invoices.index') }}" class="side-menu__item">@lang('trans.invoices')</a>
            </li>
            <li class="slide">
              <a href="index-1.html" class="side-menu__item">@lang('trans.Partially paid invoices')</a>
            </li>
            <li class="slide">
              <a href="index-1.html" class="side-menu__item">@lang('trans.Unpaid Bills')</a>
            </li>
            <li class="slide">
              <a href="index-1.html" class="side-menu__item">@lang('trans.Paid bills')</a>
            </li>

          </ul>
        </li>
        <!-- End::slide -->

        <!-- Start::slide -->
        <li class="slide has-sub">
          <a href="javascript:void(0);" class="side-menu__item">
            <i class="bx bx-file side-menu__icon"></i>
            <span class="side-menu__label">@lang('trans.reports')</span>
            <i class="fe fe-chevron-right side-menu__angle"></i>
          </a>
          <ul class="slide-menu child1">
            <li class="slide side-menu__label1">
              <a href="javascript:void(0)">@lang('trans.reports')</a>
            </li>
            <li class="slide">
              <a href="index-1.html" class="side-menu__item">@lang('trans.Billing reports')</a>
            </li>
            <li class="slide">
              <a href="index-1.html" class="side-menu__item">@lang('trans.Customer reports')</a>
            </li>

          </ul>
        </li>
        <!-- End::slide -->

        <!-- Start::slide -->
        <li class="slide has-sub">
          <a href="javascript:void(0);" class="side-menu__item">
            <i class="bx bx-cog side-menu__icon"></i>
            <span class="side-menu__label">@lang('trans.settings')</span>
            <i class="fe fe-chevron-right side-menu__angle"></i>
          </a>
          <ul class="slide-menu child1">
            <li class="slide side-menu__label1">
              <a href="javascript:void(0)">@lang('trans.settings')</a>
            </li>
            <li class="slide">
              <a href="index-1.html" class="side-menu__item">@lang('trans.users')</a>
            </li>
            <li class="slide">
              <a href="index-1.html" class="side-menu__item">@lang('trans.roles')</a>
            </li>

          </ul>
        </li>
        <!-- End::slide -->

      </ul>
      <div class="slide-right" id="slide-right">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
          <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
        </svg>
      </div>
    </nav>
    <!-- End::nav -->
  </div>
  <!-- End::main-sidebar -->
</aside>