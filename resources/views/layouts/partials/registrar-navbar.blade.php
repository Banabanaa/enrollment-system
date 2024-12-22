<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <img src="{{ asset('assets/cvsulogo.png') }}" class="navbar-brand ps-3" alt="CvSU-B Logo" style="height: 50px; width: auto; margin-top:-3px">
    <a class="navbar-brand ps-3" href="{{ route('registrar.dashboard') }}">Enrollment System</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    
    <!-- User Display -->
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <span class="nav-link">
                <i class="fas fa-user fa-fw"></i>
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
            </span>
        </li>
    </ul>
</nav>
