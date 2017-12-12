<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('partials.header')
</head>
<body>
@yield('content')
@include('partials.footer')
</body>

</html>
