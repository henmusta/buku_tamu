<!-- Sidemenu -->
<div class="main-sidebar main-sidebar-sticky side-menu ps d-print-none">
  <div class="sidemenu-logo">
    <a class="main-logo" href="{{ Auth::user()->roles[0]->url_dashboard }}">
      <img src="{{ asset('storage/images/thumbnail/logo-light.png') }}" class="header-brand-img desktop-logo" alt="logo">
      <img src="{{ asset('storage/images/favicon/favicon.png') }}" class="header-brand-img icon-logo" alt="logo">
      <img src="{{ asset('storage/images/thumbnail/logo.png') }}" class="header-brand-img desktop-logo theme-logo" alt="logo">
      <img src="{{ asset('storage/images/favicon/favicon.png') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
    </a>
  </div>
  <div class="main-sidebar-body">
    <ul class="nav">
      {!! Menu::sidebar(); !!}
    </ul>
  </div>
</div>
<!-- End Sidemenu -->