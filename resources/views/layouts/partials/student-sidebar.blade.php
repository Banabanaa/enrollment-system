<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Core Section -->
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ url('student/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- Management Section -->
                <div class="sb-sidenav-menu-heading">View</div>
                <!-- Enrollment -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEnrollment" aria-expanded="false" aria-controls="collapseEnrollment">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                    Status
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseEnrollment" aria-labelledby="headingEnrollment" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('student.view.checklist') }}">Checklist</a>
                        <a class="nav-link" href="{{ route('student.view.enrollment') }}">Enrollment</a>
                    </nav>
                </div>

                <!-- Addons Section -->
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="{{ route('student.addons.preenrollment') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table-list"></i></div>
                    Pre-Enrollment Form
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="sb-sidenav-footer" style="background-color: transparent;">
            <!-- Authentication and Log Out -->
            <form method="POST" action="{{ route('student.logout') }}">
                @csrf
                <!-- Apply the custom class -->
                <button type="submit" class="btn-custom-logout">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </button>
            </form>
        </div>
    </nav>
</div>
