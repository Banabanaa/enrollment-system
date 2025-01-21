@extends('layouts.student')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Student Grades</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Upload a Copy of your Checklist</li>
        <li class="breadcrumb-item active">Fill out the Checklist Form Below</li>
    </ol>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($student->classification == 'incomplete')
        <!-- Show Upload and Checklist Form for Incomplete Students -->
        <div class="upload-container">
            <div class="text-center">
                <form method="post" action="{{ route('upload.photo') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="photoInput" class="custom-file-upload">
                        <input type="file" name="photo" id="photoInput" accept="image/*" required onchange="previewImage(event, 'preview1')">
                        Browse Photo 1
                    </label>
                    <label for="photoInput2" class="custom-file-upload">
                        <input type="file" name="photo2" id="photoInput2" accept="image/*" onchange="previewImage(event, 'preview2')">
                        Browse Photo 2
                    </label>
                    <div id="imagePreview1" class="my-4 text-center" style="display: none;">
                        <img id="preview1" src="#" alt="Selected Image 1" style="max-width: 100%; max-height: 400px;">
                    </div>

                    <div id="imagePreview2" class="my-4 text-center" style="display: none;">
                        <img id="preview2" src="#" alt="Selected Image 2" style="max-width: 100%; max-height: 400px;">
                    </div>
                    <button type="submit" class="btn-upload">Upload Photos</button>
                </form>
            </div>

            <div class="student-photo-container">
                @if ($student->photo)
                    <img src="{{ asset('storage/' . $student->photo) }}" alt="First Photo" class="student-photo" onclick="openModal('{{ asset('storage/' . $student->photo) }}')">
                @endif
                @if ($student->photo2)
                    <img src="{{ asset('storage/' . $student->photo2) }}" alt="Second Photo" class="student-photo" onclick="openModal('{{ asset('storage/' . $student->photo2) }}')">
                @endif
            </div>

            <!-- Modal for Viewing Larger Photo -->
            <div id="photoModal" class="modal" style="display: none;">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <div class="zoom-wrapper" onmousemove="zoomImage(event)" onmouseleave="resetZoom()">
                        <img id="modalImage" src="{{ $student->photo_url }}" alt="No Uploads Yet" class="zoom-image">
                    </div>
                </div>
            </div>

            @if($student->photo)
                <form method="POST" action="{{ route('student.photo.delete') }}">
                    @csrf
                    @method('DELETE')
                    <div class="text-center mt-3">
                        <button type="submit" class="btn-upload btn-danger">Delete Photos</button>
                    </div>
                </form>
            @endif
        </div>

        <div id="bscs-checklist" class="checklist">
            <form method="POST" action="{{ route('student.manage.student-course-checklist.store') }}">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                @foreach ($studentCourseChecklist as $semester => $courses)
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-table me-1"></i>
                            {{ $semester }}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="bg-success text-white" style="font-size: 0.9rem;">
                                        <tr>
                                            <th>COURSE CODE</th>
                                            <th>TITLE</th>
                                            <th>PRE-REQUISITE</th>
                                            <th>SY TAKEN</th>
                                            <th>FINAL GRADE</th>
                                            <th>INSTRUCTOR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>{{ $course->course_code }}</td>
                                                <td>{{ $course->course_title }}</td>
                                                <td>{{ $course->pre_requisite }}</td>
                                                <td>
                                                    <input type="text" name="courses[{{ $course->course_code }}][sy_taken]" class="form-control" value="{{ $course->sy_taken }}" placeholder="Enter SY Taken" />
                                                </td>
                                                <td>
                                                    <select name="courses[{{ $course->course_code }}][final_grade]" class="form-control">
                                                        <option value="">Select Grade</option>
                                                        <option value="1.00" @if($course->final_grade == "1.00") selected @endif>1.00</option>
                                                        <option value="1.25" @if($course->final_grade == "1.25") selected @endif>1.25</option>
                                                        <option value="1.50" @if($course->final_grade == "1.50") selected @endif>1.50</option>
                                                        <option value="1.75" @if($course->final_grade == "1.75") selected @endif>1.75</option>
                                                        <option value="2.00" @if($course->final_grade == "2.00") selected @endif>2.00</option>
                                                        <option value="2.25" @if($course->final_grade == "2.25") selected @endif>2.25</option>
                                                        <option value="2.50" @if($course->final_grade == "2.50") selected @endif>2.50</option>
                                                        <option value="2.75" @if($course->final_grade == "2.75") selected @endif>2.75</option>
                                                        <option value="3.00" @if($course->final_grade == "3.00") selected @endif>3.00</option>
                                                        <option value="4.00" @if($course->final_grade == "4.00") selected @endif>4.00</option>
                                                        <option value="5.00" @if($course->final_grade == "5.00") selected @endif>5.00</option>
                                                        <option value="INC" @if($course->final_grade == "INC") selected @endif>INC</option>
                                                        <option value="S" @if($course->final_grade == "S") selected @endif>S</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="courses[{{ $course->course_code }}][instructor_id]" class="form-control">
                                                        <option value="">Select Instructor</option>
                                                        @foreach ($instructors as $instructor)
                                                            <option value="{{ $instructor->id }}" 
                                                                @if($course->instructor_id == $instructor->id) selected @endif>
                                                                {{ $instructor->first_name }} {{ $instructor->last_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center my-4">
                    <button type="submit" class="btn btn-primary btn-lg custom-button" style="width: 200px; background:rgb(21, 102, 4); border: none;">Save</button>
                </div>
            </form>
        </div>

    @elseif ($student->classification == 'pending')
        <!-- Message for Pending Student -->
        <div class="alert alert-warning">
            Your Requirements are Pending. Please wait for a Confirmation Email about the Advising of Subjects.
        </div>
        <!-- Disable Buttons -->
        <script>
            document.querySelector('.btn-upload').disabled = true;
            document.querySelector('.btn-upload').style.pointerEvents = 'none'; // Disables click event
            document.querySelector('form button[type="submit"]').disabled = true;
        </script>

    @elseif ($student->classification == 'regular' || $student->classification == 'irregular')
        <!-- Message for Regular/Irregular Students -->
        <div class="alert alert-success">
            You have already accomplished this. Check your Enrollment Status.
        </div>
    @endif
    
</div>

@endsection
