<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Core Section -->
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('registrar.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- Management Section -->
                <div class="sb-sidenav-menu-heading">Management</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAccount" aria-expanded="false" aria-controls="collapseAccount">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Account
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAccount" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('registrar.manage.registrar') }}">Registrar</a>
                        <a class="nav-link" href="{{ route('registrar.manage.student') }}">Student</a>
                    </nav>
                </div>

                <!-- Enrollment Section -->
                <div class="sb-sidenav-menu-heading">Enrollment</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEnrollment" aria-expanded="false" aria-controls="collapseEnrollment">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Under Evaluation
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseEnrollment" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('registrar.enrollment.undereval') }}">Under Evaluation</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUnderEvalEnrollment" aria-expanded="false" aria-controls="collapseEnrollment">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Finished Enrollment
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUnderEvalEnrollment" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('registrar.enrollment.regular') }}">Regular</a>
                        <a class="nav-link" href="{{ route('registrar.enrollment.irregular') }}">Irregular</a>
                        <a class="nav-link" href="{{ route('registrar.enrollment.transferee') }}">Transferee</a>
                        <a class="nav-link" href="{{ route('registrar.enrollment.returnee') }}">Returnee</a>
                    </nav>
                </div>

                <!-- Addons Section -->
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="{{ route('registrar.addons.masterlist') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                    Masterlist
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer" style="background-color: transparent;">
            <!-- Authentication and Log Out -->
            <form method="POST" action="{{ route('registrar.logout') }}">
                @csrf
                <!-- Apply the custom class -->
                <button type="submit" class="btn-custom-logout">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </button>
            </form>
        </div>
    </nav>
</div>
