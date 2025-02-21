<footer class="footer mt-auto py-3 bg-white text-center">
  <div class="container">
    <span class="text-muted">
      Copyright © <span id="year"></span>
      <a href="https://github.com/mohammedelsayed2712">
        <span class="fw-semibold text-primary text-decoration-underline">Mohammed Elsayed</span>
      </a>
      All rights reserved.
    </span>
  </div>
</footer>

</div>
@push('styles')

<style>
  .center-layout {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .center-layout .container {
    width: 100%;
  }
</style>

@endpush
@include('partials.scripts')


@stack('scripts')

</body>

</html>