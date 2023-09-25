<!doctype html>
<html lang="en">
@include('website.layouts.head')
<body>
    @include('website.layouts.sidenav')
    @include('website.layouts.header')

    @yield('content')

    @include('website.layouts.footer')
    @include('website.layouts.script')

</body>

</html>
