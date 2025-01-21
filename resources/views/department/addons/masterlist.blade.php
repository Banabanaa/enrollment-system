@extends('layouts.department')

@section('title', 'Masterlist')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Student Masterlist</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">By Program/Course</li>
    </ol>

    <div class="mb-3">
        <!-- Buttons to toggle between sections -->
        <button id="showBSIT" class="btn btn-primary">BSIT</button>
        <button id="showBSCS" class="btn btn-secondary">BSCS</button>
    </div>

    <div class="mb-4">
        <!-- Search bar for sections -->
        <input id="searchSection" type="text" class="form-control" placeholder="Search for a section (e.g., '1A', '2B')">
    </div>

    <div id="bsitSection">
        <!-- Bachelor of Science in Information Technology -->
        <h3>Bachelor of Science in Information Technology (BSIT) Students</h3>
        @if($bsitStudents->isNotEmpty())
            @php
                // Group BSIT students by year and section
                $bsitYearSectionGroups = $bsitStudents->groupBy(function($student) {
                    return $student->year . ' - ' . $student->section;
                });
            @endphp

            @foreach ($bsitYearSectionGroups as $yearSection => $studentsInSection)
                <div class="card mb-4 section-table" data-section="{{ $yearSection }}">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        BSIT - {{ $yearSection }}
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Student Number</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Classification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentsInSection as $student)
                                    <tr>
                                        <td>{{ $student->student_number }}</td>
                                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->contact_number }}</td>
                                        <td>{{ ucfirst($student->classification) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @else
            <p>No students found for Bachelor of Science in Information Technology.</p>
        @endif
    </div>

    <div id="bscsSection" style="display: none;">
        <!-- Bachelor of Science in Computer Science -->
        <h3>Bachelor of Science in Computer Science (BSCS) Students</h3>
        @if($bscsStudents->isNotEmpty())
            @php
                // Group BSCS students by year and section
                $bscsYearSectionGroups = $bscsStudents->groupBy(function($student) {
                    return $student->year . ' - ' . $student->section;
                });
            @endphp

            @foreach ($bscsYearSectionGroups as $yearSection => $studentsInSection)
                <div class="card mb-4 section-table" data-section="{{ $yearSection }}">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        BSCS - {{ $yearSection }}
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Student Number</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Classification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentsInSection as $student)
                                    <tr>
                                        <td>{{ $student->student_number }}</td>
                                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->contact_number }}</td>
                                        <td>{{ ucfirst($student->classification) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @else
            <p>No students found for Bachelor of Science in Computer Science.</p>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Toggle between BSIT and BSCS sections
        document.getElementById('showBSIT').addEventListener('click', () => {
            document.getElementById('bsitSection').style.display = 'block';
            document.getElementById('bscsSection').style.display = 'none';
        });

        document.getElementById('showBSCS').addEventListener('click', () => {
            document.getElementById('bsitSection').style.display = 'none';
            document.getElementById('bscsSection').style.display = 'block';
        });

        // Filter tables by section
        const searchInput = document.getElementById('searchSection');
        searchInput.addEventListener('input', () => {
            const query = searchInput.value.toLowerCase();
            const tables = document.querySelectorAll('.section-table');

            tables.forEach((table) => {
                const section = table.getAttribute('data-section').toLowerCase();
                if (section.includes(query)) {
                    table.style.display = '';
                } else {
                    table.style.display = 'none';
                }
            });
        });
    });
</script>

@endsection


