<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <title>{{ $title ?? 'Default Title' }}</title>
        <link rel="icon" href="{{ asset($favicon ?? 'assets/cvsu.svg') }}" type="image/svg+xml">
        @vite('resources/css/app.css')
    </head>
    <body class="sb-nav-fixed">

        @include('layouts.partials.registrar-navbar')

        <div id="sidebar-nav">

            <div id="sidebar-nav">
                @include('layouts.partials.registrar-sidebar')
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
