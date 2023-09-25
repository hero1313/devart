<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
@include("admin.layouts.head")
<!-- Messenger საუბრის დანამატი Code -->
<div id="fb-root"></div>

<!-- Your საუბრის დანამატი code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>



<!-- Your SDK code -->

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      @include("admin.layouts.navbar")
      <div class="layout-page">
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  @include("admin.layouts.script")
</body>

</html>
