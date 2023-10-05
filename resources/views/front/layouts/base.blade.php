<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>فروشگاه مبل</title>

    <!-- Stylesheet -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
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
