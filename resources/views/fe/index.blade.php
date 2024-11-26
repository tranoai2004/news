<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- plugins -->
    @include('fe.layouts.css')
</head>
<body>
    <!-- navigation -->
    @include('fe.layouts.header')
    <!-- /navigation -->

    @yield('main')

    @include('fe.layouts.footer')


    @include('fe.layouts.js')
</body>
</html>