@extends('layouts.department')

@section('title', 'Advising for Enrollment')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Enrollment Module</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">ADVISING STUDENTS</li>
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

    {{-- Advising Students Table --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Advising Students
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
                                <!-- Button to open modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#adviseModal{{ $student->id }}">
                                    Advise
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="adviseModal{{ $student->id }}" tabindex="-1" aria-labelledby="adviseModalLabel{{ $student->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="adviseModalLabel{{ $student->id }}">Advise Student</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('department.enrollment.advise.student', $student->id) }}">
                                                @csrf <!-- Add CSRF token for security -->
                                                <div class="modal-body ">

                                                    <!-- Student Photo -->
                                                    <div class="text-center mb-4">
                                                        <img 
                                                            src="{{ $student->photo_url ?? asset('default-student-photo.jpg') }}" 
                                                            alt="Student Photo" 
                                                            class="img-thumbnail" 
                                                            style="width: 80%; height: 80%; object-fit: cover;">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="studentNumber" class="form-label fs-5 fw-bold">Student Number</label>
                                                        <input type="text" class="form-control" id="studentNumber" value="{{ $student->student_number }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="studentNumber" class="form-label fs-5 fw-bold">Program</label>
                                                        <input type="text" class="form-control" id="program" value="{{ $student->program_id }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="studentNumber" class="form-label fs-5 fw-bold">Select Courses</label>
                                                        <select id="courses" name="courses[]" class="form-select" multiple>
                                                            @foreach ($courses as $course)
                                                                <option value="{{ $course->course_code }}">{{ $course->course_code }} - {{ $course->course_title }}</option>
                                                            @endforeach
                                                        </select>                                                        
                                                        <small class="text-muted">Select multiple courses using Ctrl/Command key.</small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="studentNumber" class="form-label fs-5 fw-bold">Classification</label>
                                                        <select class="form-select" name="classification">
                                                            <option value="under evaluation" {{ old('classification', $student->classification) == 'under evaluation' ? 'selected' : '' }}>Under Evaluation</option>
                                                            <option value="pending" {{ old('classification', $student->classification) == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="studentNumber" class="form-label fs-5 fw-bold">Advising Notes</label>
                                                        <textarea name="advising_notes" id="advisingNotes" class="form-control">{{ old('advising_notes', $student->advising_notes) }}</textarea>
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
                                <!-- End of Modal -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
