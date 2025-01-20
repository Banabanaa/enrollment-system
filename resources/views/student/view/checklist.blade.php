@extends('layouts.student')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Student Grades</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">COG</li>
    </ol>

    <div class="upload-container">
        <div class="text-center">
            <form method="post" action="{{ route('upload.photo') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                
                <label for="photoInput" class="custom-file-upload">
                    <input type="file" name="photo" id="photoInput" accept="image/*" required onchange="previewImage(event)">
                    Browse Files
                </label>
                <button type="submit" class="btn-upload">Upload Photo</button>
            </form>
        </div>
        
        <div id="imagePreview" class="my-4 text-center" style="display: none;">
            <img id="preview" src="#" alt="Selected Image">
        </div>
    
        <div class="student-photo-container">
            <img src="{{ $student->photo_url }}" alt="No Uploads Yet" class="student-photo" onclick="openModal();">
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
    </div>
    
    <style>
        .upload-container {
            border: 2px solid #218838; /* Green border */
            border-radius: 10px; /* Rounded corners */
            padding: 20px; /* Inner padding */
            margin: 20px; /* Outer margin for spacing */
            background-color: #f9f9f9; /* Light background color for contrast */
            box-sizing: border-box; /* Ensures padding does not affect element size */
        }
    
        .text-center {
            text-align: center;
        }
    
        .custom-file-upload {
            cursor: pointer;
            display: inline-block;
            padding: 10px 20px;
            background-color: #218838;
            color: white;
            border: 1px solid #218838;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
    
        .custom-file-upload:hover {
            background-color: #145a32;
            border-color: #145a32;
        }
    
        .custom-file-upload input {
            display: none;
        }
    
        .btn-upload {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #ac0330;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    
        .btn-upload:hover {
            background-color: #6b0303;
        }
    
        #imagePreview {
            margin-top: 20px;
        }
    
        #preview {
            max-width: 100%;
            max-height: 400px;
            object-fit: cover;
        }
    
        /* Styles for Centered and Smaller Student Photo */
        .student-photo-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        .student-photo {
            width: 350px; /* Image size for larger screens */
            height: 450px;
            border-radius: 5%; 
            object-fit: cover;
            cursor: pointer; /* Make it clickable */
            transition: transform 0.3s ease;
        }
    
        .student-photo:hover {
            transform: scale(1.05); /* Slight zoom effect on hover */
        }
    
        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.8); /* Black background with opacity */
            display: flex;
            margin-top: 5px;
            justify-content: center;
            align-items: center;
        }
    
        .zoom-wrapper {
            position: relative;
            width: 100%;
            height: 90%;
            overflow: hidden; /* Hide the overflowing part of the zoomed image */
            cursor: zoom-in; /* Cursor style to indicate zoom-in action */
        }
        
        .zoom-image {
            transition: transform 0.2s ease; /* Smooth zoom transition */
            width: 100%; /* Make sure the image scales well */
            height: auto; 
            object-fit: cover;
        }

        .modal-content {
            position: relative;
            width: 80%;  /* Adjust size based on your requirement */
            max-width: 500px; /* Maximum width */
            background-color: #fff;
            margin-top: 40px;
        }
        
    
        /* The Close Button (X) */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            font-size: 36px;
            font-weight: bold;
            cursor: pointer;
        }
    
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
    
        /* Media Queries for Mobile Responsiveness */
        @media (max-width: 768px) {
            .student-photo {
                width: 250px; /* Smaller student photo for mobile */
                height: 250px;
            }
    
            .modal-content {
                width: 80%; /* Increase modal width on smaller screens */
                max-width: 300px; /* Max width for modal */
            }
    
            .btn-upload {
                width:50%; /* Make the upload button full width */
                padding: 10px; /* Larger padding for touch devices */
            }
    
            .upload-container {
                padding: 10px; /* Adjust inner padding for small screens */
                margin: 10px;  /* Adjust margin for small screens */
            }
    
            .student-photo-container {
                margin-top: 15px; /* Adjust spacing between elements for smaller screens */
            }
        }
    
        @media (max-width: 480px) {
            .student-photo {
                width: 200px; /* Even smaller student photo */
                height: 200px;
            }
    
            .btn-upload {
                padding: 8px 0px; /* Adjust upload button padding on very small screens */
            }
    
            .modal-content {
                width: 90%; /* Even larger modal on very small screens */
                max-width: 250px;
            }
    
            #imagePreview {
                margin-top: 15px; /* Adjust margin for smaller viewports */
            }
    
            .custom-file-upload {
                padding: 8px 15px; /* Smaller file upload button */
                font-size: 14px; /* Smaller font size */
            }
        }
    </style>
    
    <script>
        // Function to open modal
        function openModal() {
            var modal = document.getElementById('photoModal');
            modal.style.display = "flex"; // Use flexbox for centering modal
            var modalImage = document.getElementById('modalImage');
            modalImage.src = "{{ $student->photo_url }}"; // Set image source in modal
        }

        // Function to close modal
        function closeModal() {
            var modal = document.getElementById('photoModal');
            modal.style.display = "none"; // Hide the modal
        }

        // Close modal when clicking anywhere outside of the modal content
        window.onclick = function(event) {
            var modal = document.getElementById('photoModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Function to preview selected image before upload
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

        // Zoom Functionality
        function zoomImage(event) {
            const img = document.getElementById('modalImage');
            const zoomWrapper = document.querySelector('.zoom-wrapper');
            
            const rect = zoomWrapper.getBoundingClientRect();
            
            const x = event.clientX - rect.left;  // X position within the wrapper
            const y = event.clientY - rect.top;   // Y position within the wrapper
            const zoomFactor = 2;  // Factor by which the image zooms
            
            // Change background position to zoom into the right place
            const backgroundX = (x / rect.width) * 100;
            const backgroundY = (y / rect.height) * 100;
            
            img.style.transform = `scale(${zoomFactor})`; // Zoom in on the image
            img.style.transformOrigin = `${backgroundX}% ${backgroundY}%`; // Set where to zoom (focus point)
        }
        
        // Reset zoom when leaving the image area
        function resetZoom() {
            const img = document.getElementById('modalImage');
            img.style.transform = "scale(1)";  // Reset zoom
            img.style.transformOrigin = "center";  // Center the image
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
    <input type="text" name="sy_taken" class="form-control" value="{{ $course->sy_taken }}" placeholder="Enter SY Taken" />
</td>
                                       <!-- Add this in your Blade view (resources/views/student/grades.blade.php) -->

                                        <!-- Below this, you can still use $instructors as needed if it's correctly passed -->
                                        

                                        <td>
                                            <select name="final_grade" class="form-control">
                                                <option value="">Select Grade</option>
                                                <option value="{{ $course->final_grade }}">{{ $course->final_grade }}</option>
                                                <option value="A">1.00</option>
                                                <option value="B">1.25</option>
                                                <option value="C">1.50</option>
                                                <option value="D">1.75</option>
                                                <option value="F">2.00</option>
                                                <option value="A">2.25</option>
                                                <option value="B">2.50</option>
                                                <option value="C">2.75</option>
                                                <option value="D">3</option>
                                                <option value="F">4</option>
                                                <option value="F">5</option>
                                                <option value="F">INC</option>
                                                <option value="F">S</option>
                                            </select>
                                        </td>

                                        <td>
                                            <select name="instructor_id" class="form-control">
                                                <option value="">Select Instructor</option>
                                                @foreach ($instructors as $instructor)
                                                <option value="{{ $instructor->id }}" 
                                                    @if(optional($course->instructor)->id == $instructor->id) selected @endif>
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
</div>
<div class="text-center my-4">
    <button type="submit" class="btn btn-primary btn-lg custom-button" style="width: 200px; background:rgb(21, 102, 4); border: none;">Save</button>
</div>
</div>


@endsection
