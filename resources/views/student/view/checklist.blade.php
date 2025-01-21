@extends('layouts.student')

@section('content')

<div class="container-fluid px-6 py-6 ">
  <h3 class="font-bold text-primary text-4xl">Student Grades</h3>
    <ol class="breadcrumb mb-4">
        <li class="text-lg ">Fill-Up Checklist</li>
    </ol>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

{{-- Student Checklist --}}
<div id="bscs-checklist" class="checklist ">
    <form method="POST" action="{{ route('student.manage.student-course-checklist.store') }}">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">
        @foreach ($studentCourseChecklist as $semester => $courses)
            <div class="card mb-4">
                <div class=" text-primary text-2xl font-semibold text-center mx-auto">
                    {{ $semester }}
                </div>
                <div class="card-body">
    <div class="table-responsive">
        <table class="min-w-full bg-white shadow-sm rounded-lg">
            <thead>
                <tr class="bg-primary">
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Course Code</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Title</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Pre-Requisite</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">SY-Taken</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Final Grade</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Instructor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="hover:bg-gray-100 border-b border-border-color ">
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $course->course_code }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $course->course_title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $course->pre_requisite }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <input type="text" name="courses[{{ $course->course_code }}][sy_taken]" class="form-control rounded-lg" value="{{ $course->sy_taken }}" placeholder="Enter SY Taken" />
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 rounded-lg">
                            <select name="courses[{{ $course->course_code }}][final_grade]" class="form-control rounded-lg">
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
                        <td class="px-6 py-4 text-sm text-gray-600 ">
                            <select name="courses[{{ $course->course_code }}][instructor_id]" class="form-control rounded-lg">
                                <option value="">Select Instructor</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}" @if($course->instructor_id == $instructor->id) selected @endif>
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
@endsection