<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.partials.head')
</head>
<body class="hold-transition skin-blue-light sidebar-mini fixed">
<div class="wrapper">
    @include('admin.partials.header')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @if('page-title')
                <section class="content-header">
                    <h1>
                        @yield('page-title')
                        <small>@yield('optional-title')</small>
                    </h1>
                </section>
            @endif

            <!-- Main content -->
            <section class="content container-fluid">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        @include('admin.partials.sidebar')
        @include('admin.partials.footer')
</div>


    @include('admin.partials.scripts')
</body>
</html>