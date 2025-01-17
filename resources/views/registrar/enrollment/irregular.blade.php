@extends('layouts.registrar')

@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Enrollment Module</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">IRREGULAR STUDENTS</li>
    </ol>

    {{-- Irregular Students Table --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Irregular Students
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
                                <button class="btn btn-primary btn-sm enroll-btn" data-student-id="{{ $student->id }}">Enroll</button>
                                <button class="btn btn-secondary btn-sm consult-btn" data-student-id="{{ $student->id }}">Consult</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Enroll button click event
        $('.enroll-btn').on('click', function() {
            var studentId = $(this).data('student-id');
            
            if (confirm('Are you sure you want to enroll this student?')) {
                $.ajax({
                    url: '/enroll-student/' + studentId,  // Endpoint to handle enrollment
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',  // Include CSRF token for security
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Student enrolled successfully!');
                            location.reload();  // Reload the page to reflect changes
                        } else {
                            alert('Error enrolling student. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            }
        });

        // Consult button click event
        $('.consult-btn').on('click', function() {
            var studentId = $(this).data('student-id');

            if (confirm('Are you sure you want to mark this student for consultation?')) {
                $.ajax({
                    url: '/consult-student/' + studentId,  // Endpoint to handle consultation
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',  // Include CSRF token for security
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Student marked for consultation successfully!');
                            location.reload();  // Reload the page to reflect changes
                        } else {
                            alert('Error updating consultation status. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            }
        });
    });
</script>


@endsection
