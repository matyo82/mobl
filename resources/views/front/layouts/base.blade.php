<!DOCTYPE html>
<html lang="fa-IR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        فروشگاه مبل
        | @yield('title')
    </title>

    <!-- Stylesheet -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Header Section -->
    @include('front.layouts.header')

    {{-- Content Section --}}
    @yield('content')

    {{-- Footer Section --}}
    @include('front.layouts.footer')

</body>

</html>
