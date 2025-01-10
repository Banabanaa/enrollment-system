@extends('layouts.student')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Enrollment Status</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">View</li>
    </ol>

    <!-- Year and Semester and Section Designation -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Academic Year</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Year -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" id="year" class="form-control" value="{{ request()->input('year', 'Third Year') }}" readonly>
                    </div>
                </div>

                <!-- Semester -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester</label>
                        <input type="text" id="semester" class="form-control" value="{{ request()->input('semester', 'First Semester') }}" readonly>
                    </div>
                </div>

                <!-- Year & Section -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <input type="text" id="section" class="form-control" value="{{ request()->input('section', '2') }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Subjects Enrolled Table --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Subjects Enrolled
        </div>
        {{-- BSCS Checklist --}}
    <div id="bscs-checklist" class="checklist">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Third Year - First Semester (BSCS)
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
                                <td>MATH 3</td>
                                <td>Linear Algebra</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>MATH 2</td>
                                <td>2024/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>COSC 75</td>
                                <td>Software Engineering II</td>
                                <td>2</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>COSC 70</td>
                                <td>2024/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>COSC 80</td>
                                <td>Operating Systems</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>DCIT 25</td>
                                <td>2024/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>COSC 85</td>
                                <td>Networks and Communication</td>
                                <td>2</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>ITEC 50</td>
                                <td>2024/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>COSC 101</td>
                                <td>CS Elective 1(Computer Graphics and Visual Computing)</td>
                                <td>2</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>DCIT 23</td>
                                <td>2024/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>DCIT 26</td>
                                <td>Applications Dev't and Emerging Technologies</td>
                                <td>2</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>ITEC 50</td>
                                <td>2024/First</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>DCIT 65</td>
                                <td>Social and Professional Issues</td>
                                <td>3</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>None</td>
                                <td>2024/First</td>
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
