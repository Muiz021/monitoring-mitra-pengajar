<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('backend/assets/')}}"
  data-template="vertical-menu-template-free"
>
  <head>

    @include('auth.template.meta')

    <title>@yield('title')</title>

    @include('auth.template.style')

  </head>

  <body>

    <!-- Content -->
    @yield('content')
    <!-- / Content -->

@include('auth.template.script')
  </body>
</html>
