@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    
    <div class="row">
        <!-- Number of Students -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Number of Students</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="total-value text-3xl font-semibold">{{ $studentCount }}</span>
                    <a class="small text-white stretched-link" href="{{ url('admin/manage/student') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-user-graduate"></i></div>
                </div>
            </div>
        </div>
    
        <!-- Number of Admins -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Number of Admins</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="total-value text-3xl font-semibold">{{ $adminCount }}</span>
                    <a class="small text-white stretched-link" href="{{ url('admin/manage/admin') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-user-shield"></i></div>
                </div>
            </div>
        </div>
    
        <!-- Number of Registrars -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Number of Registrars</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="total-value text-3xl font-semibold">{{ $registrarCount }}</span>
                    <a class="small text-white stretched-link" href="{{ url('admin/manage/registrar') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-user-edit"></i></div>
                </div>
            </div>
        </div>
    
        <!-- Number of Departments -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Number of Departments</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="total-value text-3xl font-semibold">{{ $departmentCount }}</span>
                    <a class="small text-white stretched-link" href="{{ url('admin/manage/department') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-building"></i></div>
                </div>
            </div>
        </div>
    </div>
    
    

    {{-- Admins Table --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Admins Table
        </div>
        <div class="card-body">
            <table id="datatablesSimple1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->created_at->format('m/d/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Students Table --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Students Table
        </div>
        <div class="card-body">
            <table id="datatablesSimple2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->created_at->format('m/d/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Departments Table --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Departments Table
        </div>
        <div class="card-body">
            <table id="datatablesSimple3" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Department Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->first_name }}</td>
                            <td>{{ $department->last_name }}</td>
                            <td>{{ $department->department_name }}</td>
                            <td>{{ $department->email }}</td>
                            <td>{{ $department->created_at->format('m/d/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Registrars Table --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Registrars Table
        </div>
        <div class="card-body">
            <table id="datatablesSimple4" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrars as $registrar)
                        <tr>
                            <td>{{ $registrar->id }}</td>
                            <td>{{ $registrar->first_name }}</td>
                            <td>{{ $registrar->last_name }}</td>
                            <td>{{ $registrar->email }}</td>
                            <td>{{ $registrar->created_at->format('m/d/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize Simple-Datatables for each table
        const table1 = document.getElementById('datatablesSimple1');
        const table2 = document.getElementById('datatablesSimple2');
        const table3 = document.getElementById('datatablesSimple3');
        const table4 = document.getElementById('datatablesSimple4');

        if (table1) new simpleDatatables.DataTable(table1);
        if (table2) new simpleDatatables.DataTable(table2);
        if (table3) new simpleDatatables.DataTable(table3);
        if (table4) new simpleDatatables.DataTable(table4);
    });
</script>
@endsection
