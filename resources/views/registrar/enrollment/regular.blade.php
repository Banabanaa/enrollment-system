@extends('layouts.registrar')

@section('title', 'Regular Enrollment')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Enrollment Module</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">REGULAR STUDENTS</li>
    </ol>

        {{-- Regular Students Table --}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Regular Students
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
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Student Number</th>
                            <th>Name</th>
                            <th>Program</th>
                            <th>Year</th>
                            <th>Section</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
