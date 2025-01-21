@extends('layouts.student')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Enrollment Status</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">View Subjects</li>
    </ol>

    @if(in_array($student->classification, ['pending', 'under evaluation', 'incomplete']))
    <div class="alert alert-warning">
        You are not enrolled. Kindly submit your requirements and finish the Enrollment Process.
    </div>
    @elseif(in_array($student->classification, ['regular', 'irregular']))
    <!-- Student Information -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Student Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="studentNumber" class="form-label">Student Number</label>
                        <input type="text" id="studentNumber" class="form-control" value="{{ $student->student_number }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" id="name" class="form-control" value="{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} {{ $student->extension_name }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="text" id="birthday" class="form-control" value="{{ $student->birthday }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" id="contact" class="form-control" value="{{ $student->contact_number }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enrollment Information -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Enrollment Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="program" class="form-label">Program</label>
                        <input type="text" id="program" class="form-control" value="{{ $student->program_id }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="classification" class="form-label">Classification</label>
                        <input type="text" id="classification" class="form-control" value="{{ ucfirst($student->classification) }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" id="year" class="form-control" value="{{ $student->year }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <input type="text" id="section" class="form-control" value="{{ $student->section }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester</label>
                        <input type="text" id="semester" class="form-control" value="{{ request()->input('semester', 'Second Semester') }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subjects Enrolled -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Subjects Enrolled
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-success text-white" style="font-size: 0.9rem;">
                        <tr>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Credit Units (Lecture)</th>
                            <th>Credit Units (Laboratory)</th>
                            <th>Pre-requisites</th>
                            <th>Instructor</th>
                            <th>Schedule</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 0.8rem;">
                        @foreach(json_decode($student->courses) as $course)
                        <tr>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->course_title }}</td>
                            <td>{{ $course->credit_unit_lecture }}</td>
                            <td>{{ $course->credit_unit_laboratory }}</td>
                            <td>{{ $course->pre_requisite }}</td>
                            <td>{{ $course->instructor ?? 'TBA' }}</td>
                            <td>{{ $course->schedule ?? 'TBA' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Download Button -->
    <button id="downloadCor" class="btn btn-primary mb-4">
        Download COR (Certificate of Registration)
    </button>
    @endif
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
    document.getElementById('downloadCor').addEventListener('click', async function () {
        const { jsPDF } = window.jspdf;

        // Create a new PDF instance with a portrait orientation
        const pdf = new jsPDF({
            orientation: 'portrait',
            unit: 'px',
            format: 'a4'
        });

        // Temporarily hide the button
        const downloadButton = document.getElementById('downloadCor');
        downloadButton.style.display = 'none';

        // Select the content to export (excluding the download button)
        const content = document.querySelector('.container-fluid');

        try {
            // Convert the content into a canvas for rendering as an image
            const canvas = await html2canvas(content, { scale: 2 });

            // Generate an image from the canvas
            const imgData = canvas.toDataURL('image/png');

            // Add the image data to the PDF (using coordinates, setting a small margin)
            pdf.addImage(imgData, 'PNG', 10, 10, pdf.internal.pageSize.getWidth() - 20, 0);

            // Save the PDF (without the download button)
            pdf.save('Certificate_of_Registration.pdf');

        } catch (error) {
            console.error('Error generating PDF:', error);
        } finally {
            // Re-display the button after generating the PDF
            downloadButton.style.display = 'block';
        }
    });
</script>


@endsection