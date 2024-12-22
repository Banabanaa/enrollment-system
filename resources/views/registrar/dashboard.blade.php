@extends('layouts.registrar')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row">
        <!-- Number of Regular Students -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Number of Regular Students</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="total-value text-3xl font-semibold">{{ $regularCount }}</span>
                    <a class="small text-white stretched-link" href="{{ url('registrar/manage/student?classification=regular') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-user-graduate"></i></div>
                </div>
            </div>
        </div>

        <!-- Number of Irregular Students -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Number of Irregular Students</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="total-value text-3xl font-semibold">{{ $irregularCount }}</span>
                    <a class="small text-white stretched-link" href="{{ url('registrar/manage/student?classification=irregular') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-user-graduate"></i></div>
                </div>
            </div>
        </div>

        <!-- Number of Transferee Students -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Number of Transferee Students</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="total-value text-3xl font-semibold">{{ $transfereeCount }}</span>
                    <a class="small text-white stretched-link" href="{{ url('registrar/manage/student?classification=transferee') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-user-graduate"></i></div>
                </div>
            </div>
        </div>

        <!-- Number of Returnee Students -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Number of Returnee Students</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="total-value text-3xl font-semibold">{{ $returneeCount }}</span>
                    <a class="small text-white stretched-link" href="{{ url('registrar/manage/student?classification=returnee') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-user-graduate"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Students Table -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Students List
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Classification</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->student_number }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ ucfirst($student->classification) }}</td>
                            <td>{{ $student->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
