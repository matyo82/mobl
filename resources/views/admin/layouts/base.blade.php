<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <title>
        dashboard
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('admin-assets/assets/img/favicon.ico') }}" />
    <link href="{{ asset('admin-assets/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('admin-assets/assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('admin-assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('admin-assets/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('admin-assets/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('admin-assets/select2/css/select2.min.css')}}">
    <link rel="icon" type="image/x-icon" href="./assets/img/logo.png">
    <!--  END CUSTOM STYLE FILE  -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body data-spy="scroll" data-target="#navSection" data-offset="100">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    @include('admin.layouts.header')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('admin.layouts.sidebar')
        @yield('content')

    </div>
    <!-- END MAIN CONTAINER -->

    @include('admin.layouts.scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('script')
</body>

</html>
