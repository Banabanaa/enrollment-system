@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4" id="checklist-title">Checklist: Computer Science</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Template</li>
        <li class="breadcrumb-item active">Available Courses</li>
    </ol>

    {{-- Toggle Buttons --}}
    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-success me-2" id="bscs-button">BSCS Checklist</button>
        <button class="btn btn-secondary" id="bsit-button">BSIT Checklist</button>
    </div>

    {{-- BSCS Checklist --}}
    <div id="bscs-checklist" class="checklist">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                First Year - First Semester (BSCS)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-success text-white" style="font-size: 0.9rem;">
                            <tr>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Credit Units Lecture</th>
                                <th>Credit Units Laboratory</th>
                                <th>Contact Hours Lecture</th>
                                <th>Contact Hours Laboratory</th>
                                <th>Pre-requisites</th>
                                <th>SY/Semester Taken</th>
                                <th>Final Grade</th>
                                <th>Instructor</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 0.8rem;">
                            <tr>
                                <td>GNED 02</td>
                                <td>Ethics</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>GNED 05</td>
                                <td>Purposive Communication</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>GNED 11</td>
                                <td>Kontektwaliasadong Komunikasyon sa Filipino</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>COSC 50</td>
                                <td>Discrete Structures I</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>DCIT 21</td>
                                <td>Introduction to Computing</td>
                                <td>2</td>
                                <td>1</td>
                                <td>2</td>
                                <td>6</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>DCIT 22</td>
                                <td>Computer Programming I</td>
                                <td>1</td>
                                <td>2</td>
                                <td>1</td>
                                <td>3</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>FITT 1</td>
                                <td>Movement Enhancement</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>NSTP 1</td>
                                <td>National Service Training Program 1</td>
                                <td>2</td>
                                <td>0</td>
                                <td>2</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>CvSU 101</td>
                                <td>Institutional Orientation</td>
                                <td>(1)</td>
                                <td>0</td>
                                <td>-</td>
                                <td>-</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                First Year - Second Semester (BSCS)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-success text-white" style="font-size: 0.9rem;">
                            <tr>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Credit Units Lecture</th>
                                <th>Credit Units Laboratory</th>
                                <th>Contact Hours Lecture</th>
                                <th>Contact Hours Laboratory</th>
                                <th>Pre-requisites</th>
                                <th>SY/Semester Taken</th>
                                <th>Final Grade</th>
                                <th>Instructor</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 0.8rem;">
                            <tr>
                                <td>GNED 01</td>
                                <td>Art Appreciation</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>GNED 03</td>
                                <td>Mathematics in the Modern World</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>GNED 06</td>
                                <td>Science, Technology and Society</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>GNED 12</td>
                                <td>Dalumat Ng/Sa Filipino</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>GNED 11</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>DCIT 23</td>
                                <td>Computer Programming II</td>
                                <td>1</td>
                                <td>2</td>
                                <td>1</td>
                                <td>6</td>
                                <td>DCIT 22</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>ITEC 50</td>
                                <td>Web Systems and Technologies</td>
                                <td>2</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>DCIT 21</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>FITT 2</td>
                                <td>Fitness Exercises</td>
                                <td>2</td>
                                <td>0</td>
                                <td>2</td>
                                <td>0</td>
                                <td>FITT 1</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>NSTP 2</td>
                                <td>National Service Training Program 2</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>NSTP 1</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

    {{-- BSIT Checklist --}}
    <div id="bsit-checklist" class="checklist d-none">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                First Year - First Semester (BSIT)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-success text-white" style="font-size: 0.9rem;">
                            <tr>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Credit Units Lecture</th>
                                <th>Credit Units Laboratory</th>
                                <th>Contact Hours Lecture</th>
                                <th>Contact Hours Laboratory</th>
                                <th>Pre-requisites</th>
                                <th>SY/Semester Taken</th>
                                <th>Final Grade</th>
                                <th>Instructor</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 0.8rem;">
                            <!-- First Semester Courses -->
                            <tr>
                                <td>GNED 02</td>
                                <td>Ethics</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>GNED 05</td>
                                <td>Purposive Communication</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>GNED 11</td>
                                <td>Konteskwalasadong Komunikasyon sa Filipino</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>COSC 50</td>
                                <td>Discrete Structures I</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>DCIT 21</td>
                                <td>Introduction to Computing</td>
                                <td>2</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>DCIT 22</td>
                                <td>Computer Programming 1</td>
                                <td>1</td>
                                <td>2</td>
                                <td>1</td>
                                <td>3</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>FITT 1</td>
                                <td>Movement Enhancement</td>
                                <td>2</td>
                                <td>0</td>
                                <td>2</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>NSTP 1</td>
                                <td>National Service Training Program 1</td>
                                <td>2</td>
                                <td>0</td>
                                <td>2</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>ORNT 1</td>
                                <td>Institutional Orientation</td>
                                <td>0</td>
                                <td>1</td>
                                <td>0</td>
                                <td>1</td>
                                <td>None</td>
                                <td>2023/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                First Year - Second Semester (BSIT)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-success text-white" style="font-size: 0.9rem;">
                            <tr>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Credit Units Lecture</th>
                                <th>Credit Units Laboratory</th>
                                <th>Contact Hours Lecture</th>
                                <th>Contact Hours Laboratory</th>
                                <th>Pre-requisites</th>
                                <th>SY/Semester Taken</th>
                                <th>Final Grade</th>
                                <th>Instructor</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 0.8rem;">
                            <!-- Second Semester Courses -->
                            <tr>
                                <td>GNED 01</td>
                                <td>Art Appreciation</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>GNED 03</td>
                                <td>Mathematics in the Modern World</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>GNED 06</td>
                                <td>Science, Technology and Society</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>GNED 12</td>
                                <td>Dalumat Ng/Sa Filipino</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>DCIT 23</td>
                                <td>Computer Programming 2</td>
                                <td>1</td>
                                <td>2</td>
                                <td>1</td>
                                <td>3</td>
                                <td>None</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>ITEC 50</td>
                                <td>Web System and Technologies 1</td>
                                <td>2</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>None</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>FITT 2</td>
                                <td>Fitness Exercise</td>
                                <td>2</td>
                                <td>0</td>
                                <td>2</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>NSTP 2</td>
                                <td>National Service Training Program 2</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2023/Second</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bscsButton = document.getElementById('bscs-button');
        const bsitButton = document.getElementById('bsit-button');

        const bscsChecklist = document.getElementById('bscs-checklist');
        const bsitChecklist = document.getElementById('bsit-checklist');

        const checklistTitle = document.getElementById('checklist-title');

        bscsButton.addEventListener('click', function () {
            bscsChecklist.classList.remove('d-none');
            bsitChecklist.classList.add('d-none');
            checklistTitle.textContent = "Checklist: Computer Science";
        });

        bsitButton.addEventListener('click', function () {
            bsitChecklist.classList.remove('d-none');
            bscsChecklist.classList.add('d-none');
            checklistTitle.textContent = "Checklist: Information Technology";
        });
    });
</script>
