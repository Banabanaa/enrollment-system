@extends('layouts.department')

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
                    <a class="small text-white stretched-link" href="{{ url('department/manage/student') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-user-graduate"></i></div>
                </div>
            </div>
        </div>

        <!-- Bachelor of Science in Computer Science -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">BS in Computer Science</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="total-value text-3xl font-semibold">{{ $bscsCount }}</span>
                    <a class="small text-white stretched-link" href="{{ url('department/manage/student') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-laptop-code"></i></div>
                </div>
            </div>
        </div>

        <!-- Bachelor of Science in Information Technology -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">BS in Information Technology</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="total-value text-3xl font-semibold">{{ $bsitCount }}</span>
                    <a class="small text-white stretched-link" href="{{ url('department/manage/student') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-laptop"></i></div>
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
                        <th>Program</th>
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
                            <td>{{ $student->program_id}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
