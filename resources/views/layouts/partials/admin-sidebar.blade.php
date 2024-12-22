<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">MANAGEMENT</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Account
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/manage/admin') }}">Admin</a>
                        <a class="nav-link" href="{{ url('admin/manage/registrar') }}">Registrar</a>
                        <a class="nav-link" href="{{ url('admin/manage/department') }}">Department</a>
                        <a class="nav-link" href="{{ url('admin/manage/student') }}">Student</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="{{ url('admin/addons/checklist') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Checklist
                </a>
                <a class="nav-link" href="{{ url('admin/addons/masterlist') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                    Masterlist
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer" style="background-color: transparent;">
            <!-- Authentication and Log Out -->
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <!-- Apply the custom class -->
                <button type="submit" class="btn-custom-logout">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </button>
            </form>
        </div>
    </nav>
</div>
