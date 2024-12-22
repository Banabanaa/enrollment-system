@extends('layouts.student')

@section('content')

<div class="container-fluid px-4">
<h1 class="mt-4">Student Grades</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">View</li>
</ol>

{{-- Checklist Table --}}
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Checklist
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Credit Units Lecture</th>
                    <th>Credit Units Laboratory</th>
                    <th>Contact Hours Lecture</th>
                    <th>Contact Hours Laboratory</th>
                    <th>Pre-requisites</th>
                    <th>SY/Semester Taken</th>
                    <th>Final Grade</th>
                    <th>Instructor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection

