@extends('layouts.department')

@section('title', 'Student Advising')
@section('content')
<h1 class="mt-4">Student Advising</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">By Program/Course</li>
</ol>
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
                    <!-- Static data rows, no database connection -->
                    <tr>
                        <td>123456</td>
                        <td><a href="#" class="student-name" data-student-id="1">Doe</a></td>
                        <td>John</td>
                        <td>johndoe@example.com</td>
                        <td>Regular</td>
                        <td>Bachelor of Science in Computer Science</td>
                    </tr>
                    <tr>
                        <td>789012</td>
                        <td><a href="#" class="student-name" data-student-id="2">Smith</a></td>
                        <td>Jane</td>
                        <td>janesmith@example.com</td>
                        <td>Irregular</td>
                        <td>Bachelor of Science in Information Technology</td>
                    </tr>
                    <!-- Add more static data rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Advising -->
    <div class="modal" tabindex="-1" id="advisingModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Advising for <span id="studentName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Select the subjects the student should take:</p>
                    <!-- Table to add subjects -->
                    <table class="table" id="subjectsTable">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Select</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Math 101</td>
                                <td><input type="checkbox" class="subject-select" data-subject="Math 101"></td>
                            </tr>
                            <tr>
                                <td>CS 101</td>
                                <td><input type="checkbox" class="subject-select" data-subject="CS 101"></td>
                            </tr>
                            <tr>
                                <td>IT 101</td>
                                <td><input type="checkbox" class="subject-select" data-subject="IT 101"></td>
                            </tr>
                            <!-- Add more subjects as needed -->
                        </tbody>
                    </table>
                    <button type="button" id="addSubjectsBtn" class="btn btn-primary">Add Subjects</button>
                </div>
            </div>
        </div>
    </div>

@endsection
