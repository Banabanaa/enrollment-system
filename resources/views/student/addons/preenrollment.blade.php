@extends('layouts.student')

@section('title', 'Pre-Enrollment Form')
@section('content')

<h1 class="mt-4">Pre-Enrollment Form</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Removing Advised Subjects may cause your Student Classification to change.</li>
</ol>

@if($student)

    @if($student->classification == 'under evaluation')

        <!-- Button to confirm disable/remove actions -->
        @if(!$student->confirmation_action_taken)
            <button id="confirmButton" class="btn btn-primary mb-3" onclick="confirmAction()">Confirm Action</button>
        @else
            <p class="alert alert-success">Removal actions for Subjects/Courses have been permanently disabled.</p>
        @endif

        <!-- Table for displaying advised courses -->
        <table id="datatablesSimple" class="table table-striped">
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Unit Lecture</th>
                    <th>Unit Laboratory</th>
                    <th>Pre-Requisite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($advisedCourses as $course)
                    <tr>
                        <td>{{ $course['course_code'] }}</td>
                        <td>{{ $course['course_title'] }}</td>
                        <td>{{ $course['credit_unit_lecture'] }}</td>
                        <td>{{ $course['credit_unit_laboratory'] }}</td>
                        <td>{{ $course['pre_requisite'] }}</td>
                        <td>
                            <!-- Form for removing course from the advised list with confirmation -->
                            <form id="removeForm_{{ $course['course_code'] }}" action="{{ route('student.addons.remove_course') }}" method="POST" style="display: inline-block;" onsubmit="return confirmRemove()" 
                                  @if($student->confirmation_action_taken) disabled @endif>
                                @csrf
                                <input type="hidden" name="course_code" value="{{ $course['course_code'] }}">
                                <button type="submit" class="btn btn-danger removeButton" data-course="{{ $course['course_code'] }}" @if($student->confirmation_action_taken) disabled @endif>Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><strong>Total Units</strong></td>
                    <td>{{ $totalLectureUnits }}</td>
                    <td>{{ $totalLabUnits }}</td>
                    <td colspan="2"></td> <!-- Empty cells for styling -->
                </tr>
            </tfoot>
        </table>

        @if(!$meetsRequirement)
            <div class="alert alert-warning mt-4">
                <strong>Warning:</strong> You have not reached the required 21 units to stay as a regular student. You currently have a total of {{ $totalUnits }} units.
            </div>
        @else
            <div class="alert alert-success mt-4">
                <strong>Success:</strong> You have met the 21-unit requirement for Regular Students.
            </div>
        @endif
    @elseif($student->classification == 'pending' || $student->classification == 'incomplete')
        <p>You are not eligible to add courses at this time. Please complete your requirements.</p>
    @endif

@else
    <p>Error: Student data not found. Please log in again.</p>
@endif

<!-- JavaScript for disabling buttons permanently -->
<script>
    function confirmAction() {
        if (confirm("Upon clicking this button, you will not be able to remove subjects. Confirm?")) {
            // Submit a request to the server to mark the confirmation
            fetch('{{ route('student.addons.confirm_action') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ confirmed: true })
            })
            .then(function(response) {
                if (response.ok) {
                    window.location.reload();  // Reload the page to reflect changes
                } else {
                    alert("Failed to confirm action.");
                }
            });
        }
    }

    function confirmRemove() {
        return confirm("Are you sure you want to remove this course?");
    }
</script>

@endsection
