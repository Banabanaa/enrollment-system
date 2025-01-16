@extends('layouts.student')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Student Grades</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">COG</li>
    </ol>

    {{-- File Upload Container --}}
<div class="upload-container" style="border: 2px solid green; border-radius: 10px; padding: 20px; margin: 20px;">
    <div class="my-4 text-center">
        <form method="post" action="{{ route('upload.photo') }}" enctype="multipart/form-data">
            @csrf
            <label for="photoInput" class="custom-file-upload">
                <input type="file" name="photo" id="photoInput" accept="image/*" required onchange="previewImage(event)">
                Browse Files
            </label>
        </form>
    </div>

    <div id="imagePreview" class="my-4 text-center" style="display: none;">
        <img id="preview" src="#" alt="Selected Image" style="max-width: 100%; max-height: 400px;">
        <button id="replaceButton" onclick="replaceImage(event)">Replace Image</button>
    </div>
</div>

<style>
    input.form-control:focus {
        border-color: green;
        outline: none; /* Optional: Removes the default outline for a cleaner look */
        box-shadow: 0 0 5px rgba(0, 128, 0, 0.5); /* Optional: Adds a subtle green glow */
    }

    .upload-container {
        border: 2px solid green; /* Green border */
        border-radius: 10px; /* Rounded corners */
        padding: 20px; /* Inner padding */
        margin: 20px; /* Outer margin for spacing */
        background-color: #f9f9f9; /* Light background color for contrast */
    }

    .custom-file-upload {
        cursor: pointer;
        display: inline-block;
        padding: 10px 20px;
        background:rgb(21, 102, 4);
        color: #fff;
        border: 1px solid #007bff;
        border-radius: 5px;
    }

    .custom-file-upload input {
        display: none;
    }

    #replaceButton {
        display: block;
        margin-top: 10px;
        padding: 5px 10px;
        background:rgba(165, 163, 163, 0.9);
        color: #fff;
        border: 1px solidrgb(27, 173, 7);
        border-radius: 5px;
        cursor: pointer;
    }

    #preview {
        max-width: 100%; /* Set maximum width to 100% of the container */
        max-height: 400px; /* Limit the maximum height to 400px */
    }
</style>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');
        const imagePreview = document.getElementById('imagePreview');

        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            preview.src = reader.result;
            imagePreview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function replaceImage(event) {
        const input = document.getElementById('photoInput');
        input.value = ''; // Reset input value to allow selecting the same file again
        document.getElementById('imagePreview').style.display = 'none'; // Hide the image preview
    }
</script>

{{-- BSCS Checklist --}}
    <div id="bscs-checklist" class="checklist">
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
                                            <select name="sy_taken" class="form-control">
                                                <option value="{{ $course->sy_taken }}">{{ $course->sy_taken }}</option>
                                                <option value="2020-2021">2020-2021</option>
                                                <option value="2021-2022">2021-2022</option>
                                                <option value="2022-2023">2022-2023</option>
                                                <!-- Add other years as needed -->
                                            </select>
                                        </td>
                                        <td>
                                            <select name="final_grade" class="form-control">
                                                <option value="{{ $course->final_grade }}">{{ $course->final_grade }}</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="F">F</option>
                                                <!-- Add other grades as needed -->
                                            </select>
                                        </td>
                                        <td>
                                            <select name="instructor" class="form-control">
                                                <option value="{{ $course->instructor }}">{{ $course->instructor }}</option>
                                                <option value="Dr. Smith">Dr. Smith</option>
                                                <option value="Prof. Johnson">Prof. Johnson</option>
                                                <option value="Dr. Lee">Dr. Lee</option>
                                                <!-- Add other instructors as needed -->
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
</div>
<div class="text-center my-4">
    <button type="submit" class="btn btn-primary btn-lg custom-button" style="width: 200px; background:rgb(21, 102, 4); border: none;">Save</button>
</div>
</div>

@endsection
