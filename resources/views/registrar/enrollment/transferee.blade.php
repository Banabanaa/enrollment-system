@extends('layouts.registrar')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Enrollment Module</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">TRANSFEREE STUDENTS</li>
    </ol>

        {{-- Trandferee Students Table --}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Transferee Students
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Student Number</th>
                            <th>Name</th>
                            <th>Program</th>
                            <th>Year</th>
                            <th>Section</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Student Number</th>
                            <th>Name</th>
                            <th>Program</th>
                            <th>Year</th>
                            <th>Section</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->student_number }}</td>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->program_id }}</td>
                                <td>{{ $student->year }}</td>
                                <td>{{ $student->section }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Enroll</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
