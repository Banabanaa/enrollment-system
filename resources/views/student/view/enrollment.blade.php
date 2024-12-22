@extends('layouts.student')

@section('content')

<div class="container-fluid px-4">
<h1 class="mt-4">Enrollment Status</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">View</li>
</ol>

    <!-- Year and Semester and Section Designation -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">Academic Year</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Year -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="text" id="year" class="form-control" value="" readonly>
                </div>
            </div>

            <!-- Semester -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="text" id="semester" class="form-control" value="" readonly>
                </div>
            </div>

            <!-- Year & Section -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="section" class="form-label">Year & Section</label>
                    <input type="text" id="section" class="form-control" value="" readonly>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Subjects Enrolled Table --}}
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Subjects Enrolled
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection

