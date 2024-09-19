<!DOCTYPE html>
<html lang="en">
<head>
  <!--meta tag-->
  @include('admin.layouts.metatag')
  <title>@yield('title')-{{ config('app.name')}}</title>
  <!-- Css -->
  @include('admin.layouts.style')
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- Nav Bar -->
      @include('admin.layouts.navbar')
      <!-- Side Bar -->
      @include('admin.layouts.sidebar')
      <!-- Main Content -->
      <div class="main-content">
        <!--Massages-->
        @include('admin.layouts.massages')
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            @yield('content')
          </div>
        </section>
        <!-- settingSidebar -->
        @include('admin.layouts.settingSidebar')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="https://boraxip.com/" target="_blank">Developed by Borax Ip</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!--JS Scripts-->
  @include('admin.layouts.javascript')
</body>
</html>
