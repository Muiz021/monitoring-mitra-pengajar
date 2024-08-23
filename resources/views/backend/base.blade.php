<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('backend/assets/')}}"
  data-template="vertical-menu-template-free"
>
  <head>

    @include('backend.template.meta')
    <title>Admin | @yield('title')</title>
    @include('backend.template.style')
    @stack('style')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">


        <!-- Menu -->
        @include('backend.template.aside')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">


            <!-- Navbar -->
            @include('backend.template.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">

            <!-- Content -->
            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
           @include('backend.template.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('backend.template.script')
    @stack('script')
  </body>
</html>
