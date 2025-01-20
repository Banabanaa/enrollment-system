<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ asset('assets/cvsulogo.png') }}" type="image/png">
        <title>@yield('title', 'Registrar Dashboard')</title>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('admin/css/dbstyles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">

        @include('layouts.partials.registrar-navbar')

        <div id="layoutSidenav">

            <div id="layoutSidenav_nav">
                @include('layouts.partials.registrar-sidebar')
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('content')
                    </div>
                </main>
                @include('layouts.partials.registrar-footer')
            </div>
        </div>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/datatables.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        @yield('scripts')
    </body>
</html>
