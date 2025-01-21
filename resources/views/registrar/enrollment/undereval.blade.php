@extends('layouts.registrar')

@section('title', 'Under Evaluation for Enrollment')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Enrollment Module</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Under Evaluation Students</li>
    </ol>

    {{-- Success/Error Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {{-- Under Evaluation Students Table --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Under Evaluation Students
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Program</th>
                        <th>Classification</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Program</th>
                        <th>Classification</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->student_number }}</td>
                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td>{{ $student->program_id }}</td>
                            <td>{{ ucfirst($student->classification) }}</td>
                            <td>
                                <!-- Enroll Button -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#enrollModal{{ $student->id }}">
                                    Enroll
                                </button>

                                <!-- Enrollment Modal -->
                                <div class="modal fade" id="enrollModal{{ $student->id }}" tabindex="-1" aria-labelledby="enrollModalLabel{{ $student->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="enrollModalLabel{{ $student->id }}">Enroll Student</h5> 
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('registrar.enrollment.enroll.student', $student->id) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <!-- Student Number -->
                                                    <div class="mb-2">
                                                        <label for="studentNumber" class="form-label fs-5 fw-bold">Student Number</label>
                                                        <input type="text" class="form-control" id="studentNumber" value="{{ $student->student_number }}" readonly>
                                                    </div>

                                                    <!-- Courses Table -->
                                                    <div class="mb-3">
                                                        <label for="courses" class="form-label fs-5 fw-bold">Courses</label>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Course Code</th>
                                                                        <th>Course Title</th>
                                                                        <th>Year</th>
                                                                        <th>Semester</th>
                                                                        <th>Lecture Units</th>
                                                                        <th>Laboratory Units</th>
                                                                        <th>Pre-requisite</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $courses = json_decode($student->courses, true);
                                                                        $totalLecUnits = 0;
                                                                        $totalLabUnits = 0;
                                                                    @endphp
                                                                    @if(is_array($courses))
                                                                        @foreach($courses as $course)
                                                                            @php
                                                                                $totalLecUnits += $course['credit_unit_lecture'];
                                                                                $totalLabUnits += $course['credit_unit_laboratory'];
                                                                            @endphp
                                                                            <tr>
                                                                                <td>{{ $course['course_code'] }}</td>
                                                                                <td>{{ $course['course_title'] }}</td>
                                                                                <td>{{ $course['year'] }}</td>
                                                                                <td>{{ $course['semester'] }}</td>
                                                                                <td>{{ $course['credit_unit_lecture'] }}</td>
                                                                                <td>{{ $course['credit_unit_laboratory'] }}</td>
                                                                                <td>{{ $course['pre_requisite'] }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td colspan="8" class="text-center">No courses available</td>
                                                                        </tr>
                                                                    @endif
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th colspan="5" class="text-end">Total Units:</th>
                                                                        <th>{{ $totalLecUnits }}</th>
                                                                        <th>{{ $totalLabUnits }}</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <!-- Classification -->
                                                    <div class="mb-3">
                                                        <label for="classification" class="form-label fs-5 fw-bold">Classification</label>
                                                        <select class="form-select" name="classification" id="classification" required>
                                                            <option value="regular" {{ $student->classification === 'regular' ? 'selected' : '' }}>Regular</option>
                                                            <option value="irregular" {{ $student->classification === 'irregular' ? 'selected' : '' }}>Irregular</option>
                                                            <option value="under evaluation" {{ $student->classification === 'under evaluation' ? 'selected' : '' }}>Under Evaluation</option>
                                                        </select>
                                                    </div>

                                                    <!-- Year -->
                                                    <div class="mb-3">
                                                        <label for="year" class="form-label fs-5 fw-bold">Year</label>
                                                        <select class="form-select" name="year" id="year" required>
                                                            <option value="1st Year" {{ old('year', $student->year) === '1st Year' ? 'selected' : '' }}>1st Year</option>
                                                            <option value="2nd Year" {{ old('year', $student->year) === '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                                                            <option value="3rd Year" {{ old('year', $student->year) === '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                                            <option value="4th Year" {{ old('year', $student->year) === '4th Year' ? 'selected' : '' }}>4th Year</option>
                                                            <option value="5th Year" {{ old('year', $student->year) === '5th Year' ? 'selected' : '' }}>5th Year</option>
                                                        </select>
                                                    </div>

                                                    <!-- Section -->
                                                    <div class="mb-3">
                                                        <label for="section" class="form-label fs-5 fw-bold">Section</label>
                                                        <input type="text" class="form-control" name="section" id="section" value="{{ $student->section }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const existingSections = {!! json_encode($existingSections) !!};

    document.querySelectorAll('.btn-primary').forEach((button) => {
        button.addEventListener('click', function() {
            const sectionInput = this.closest('.modal').querySelector('#section');
            const sectionValue = sectionInput.value;

            if (existingSections.includes(sectionValue)) {
                const sectionWarning = confirm("This section is already full of students enrolled. Please select another section.");
                if (!sectionWarning) {
                    sectionInput.focus();
                }
            }
        });
    });
</script>

@endsection
