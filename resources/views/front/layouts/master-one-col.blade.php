<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('front-assets/assets/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('front-assets/bootstrap/bootstrap.rtl.css') }}" rel="stylesheet" />
    @yield('head-tag')
</head>

<body style="direction:rtl">
    @yield('content')

    <script src="{{ asset('front-assets/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('front-assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-ssets/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/grid.js') }}"></script>
    <script src="{{ asset('admin-assets/js/jquery-3.5.1.min.js') }}"></script>
    @yield('script')

</body>

</html>
