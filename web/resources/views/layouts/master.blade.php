<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('partials.header')
</head>
<body>
@include('partials.navbar')
@yield('content')
@include('partials.footer')
</body>
</html>
