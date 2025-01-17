@extends('layouts.department')

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
                                <button 
                                    class="btn btn-primary btn-sm adviseBtn" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#adviseModal"
                                    data-student-number="{{ $student->student_number }}"
                                    data-student-name="{{ $student->first_name }} {{ $student->last_name }}"
                                    data-program="{{ $student->program_id }}"
                                    data-courses="{{ $courses->toJson() }}">
                                    Advise
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for advising -->
<!-- Modal for advising -->
<div class="modal fade" id="adviseModal" tabindex="-1" aria-labelledby="adviseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Added 'modal-lg' class for a larger modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adviseModalLabel">Advise Irregular Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="adviseForm">
                    <div class="mb-3">
                        <label for="studentNumber" class="form-label">Student Number</label>
                        <input type="text" class="form-control" id="studentNumber" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="studentName" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="program" class="form-label">Program</label>
                        <input type="text" class="form-control" id="program" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="courses" class="form-label">Available Courses</label>
                        <div class="d-flex">
                            <select class="form-control me-2" id="availableCoursesDropdown">
                                <!-- Options will be populated dynamically -->
                            </select>
                            <button type="button" class="btn btn-success" id="addCourseBtn">Add Course</button>
                        </div>
                    </div>
                    <ul class="list-group mb-3" id="addedCourses">
                        <!-- Added courses will appear here -->
                    </ul>
                    <div class="mb-3">
                        <label for="advisingNotes" class="form-label">Advising Notes</label>
                        <textarea class="form-control" id="advisingNotes" rows="3"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" id="saveAdvise">Mark As Pending</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
<script>
document.addEventListener('DOMContentLoaded', () => {
    const adviseModal = document.getElementById('adviseModal');
    let availableCourses = [];
    let addedCourses = []; // Array to keep track of added courses by their unique IDs

    adviseModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const studentNumber = button.getAttribute('data-student-number');
        const studentName = button.getAttribute('data-student-name');
        const program = button.getAttribute('data-program');
        const courses = JSON.parse(button.getAttribute('data-courses')); // Parse courses data

        // Populate modal fields
        document.getElementById('studentNumber').value = studentNumber;
        document.getElementById('studentName').value = studentName;
        document.getElementById('program').value = program;

        // Filter courses based on program_id
        availableCourses = courses.filter(course => course.program_id == program);

        // Populate dropdown for available courses
        const dropdown = document.getElementById('availableCoursesDropdown');
        dropdown.innerHTML = ''; // Clear existing options

        availableCourses.forEach(course => {
            const option = document.createElement('option');
            option.value = course.id; // Use unique ID
            option.textContent = `${course.course_code} - ${course.course_title}`;
            dropdown.appendChild(option);
        });

        // Clear the added courses list
        addedCourses = []; // Reset addedCourses array
        const addedCoursesList = document.getElementById('addedCourses');
        addedCoursesList.innerHTML = '';
    });

    document.getElementById('addCourseBtn').addEventListener('click', function () {
        const dropdown = document.getElementById('availableCoursesDropdown');
        const selectedOption = dropdown.options[dropdown.selectedIndex];

        if (selectedOption) {
            const courseId = selectedOption.value; // Unique course ID
            const courseTitle = selectedOption.textContent;
            const addedCoursesList = document.getElementById('addedCourses');

            console.log('Attempting to add Course ID:', courseId);
            console.log('Currently Added Courses:', addedCourses);

            // Check if the course is already added using its unique ID
            if (addedCourses.includes(courseId)) {
                alert('This course is already added.');
            } else {
                // Add course to the addedCourses array
                addedCourses.push(courseId);

                // Create a new list item for the selected course
                const listItem = document.createElement('li');
                listItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
                listItem.setAttribute('data-course-id', courseId);
                listItem.textContent = courseTitle;

                // Add a remove button
                const removeBtn = document.createElement('button');
                removeBtn.classList.add('btn', 'btn-danger', 'btn-sm');
                removeBtn.textContent = 'Remove';
                removeBtn.addEventListener('click', function () {
                    // Remove course from addedCourses array
                    addedCourses = addedCourses.filter(id => id !== courseId);
                    listItem.remove();
                    console.log('Removed Course ID:', courseId);
                    console.log('Updated Added Courses:', addedCourses);
                });

                listItem.appendChild(removeBtn);
                addedCoursesList.appendChild(listItem);

                console.log('Added Courses after addition:', addedCourses);
            }
        } else {
            alert('Please select a course to add.');
        }
    });

    document.getElementById('saveAdvise').addEventListener('click', function () {
        const studentNumber = document.getElementById('studentNumber').value;
        const coursesList = Array.from(document.querySelectorAll('#addedCourses li'));
        const advisingNotes = document.getElementById('advisingNotes').value;

        const courses = coursesList.map(course => course.getAttribute('data-course-id'));

        console.log('Saving advising data for:', studentNumber);
        console.log('Selected courses:', courses);
        console.log('Advising Notes:', advisingNotes);

        // Prepare data to send in the request
        const data = {
            student_number: studentNumber,
            courses: courses,
            advising_notes: advisingNotes
        };

        // Send AJAX request to backend
        fetch('/enrollment/advise-student', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify(data)
})
    .then(response => {
        if (!response.ok) {
            return response.text().then(html => {
                console.error('Non-JSON response received:', html);
                throw new Error(`Server returned an error: ${response.status}`);
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert('Student advised successfully!');
            const modal = new bootstrap.Modal(document.getElementById('adviseModal'));
            modal.hide();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert(`An error occurred: ${error.message}`);
    });

    });
});
</script>
