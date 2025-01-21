@extends('layouts.department')

@section('title', 'Advising for Enrollment')
@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mt-6">Enrollment Module</h1>
    <nav class="text-sm mt-2 mb-4">
        <ol class="list-none p-0 inline-flex">
            <li><span class="text-gray-500">ADVISING STUDENTS</span></li>
        </ol>
    </nav>

    {{-- Success/Error Messages --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Advising Students Table --}}
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m0 0l-7 7m7-7l7 7" />
            </svg>
            Advising Students
        </h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-sm text-left border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Student Number</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Program</th>
                        <th class="border border-gray-300 px-4 py-2">Classification</th>
                        <th class="border border-gray-300 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $student->student_number }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $student->program_id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ ucfirst($student->classification) }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button type="button" class="bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600" data-bs-toggle="modal" data-bs-target="#adviseModal{{ $student->id }}">
                                    Advise
                                </button>

                                <!-- Modal -->
                                <div id="adviseModal{{ $student->id }}" class="fixed inset-0 z-50 flex items-center justify-center hidden">
                                    <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-6 relative">
                                        <h3 class="text-lg font-semibold mb-4">Advise Student</h3>
                                        <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800" data-bs-dismiss="modal">✕</button>
                                        <form method="POST" action="{{ route('department.enrollment.advise.student', $student->id) }}">
                                            @csrf
                                            <div class="mb-4">
                                                <label for="studentNumber" class="block text-sm font-bold mb-1">Student Number</label>
                                                <input type="text" id="studentNumber" class="w-full p-2 border border-gray-300 rounded" value="{{ $student->student_number }}" readonly>
                                            </div>
                                            <div class="mb-4">
                                                <label for="program" class="block text-sm font-bold mb-1">Program</label>
                                                <input type="text" id="program" class="w-full p-2 border border-gray-300 rounded" value="{{ $student->program_id }}" readonly>
                                            </div>
                                            <div class="mb-4">
                                                <label for="courses" class="block text-sm font-bold mb-1">Select Courses</label>
                                                <select id="courses" name="courses[]" class="w-full border border-gray-300 rounded p-2" multiple>
                                                    @foreach ($courses as $course)
                                                        @if ($course->program_id == $student->program_id || $course->program_id == 3)
                                                            <option value="{{ $course->course_code }}">
                                                                {{ $course->year }} Year, {{ $course->semester }} Semester - 
                                                                {{ $course->course_code }} - {{ $course->course_title }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-4"> <label for="classification" class="block text-sm font-bold mb-1">Classification</label> <select id="classification" name="classification" class="w-full border border-gray-300 rounded p-2"> <option value="under evaluation" {{ old('classification', $student->classification) == 'under evaluation' ? 'selected' : '' }}>Under Evaluation</option> <option value="pending" {{ old('classification', $student->classification) == 'pending' ? 'selected' : '' }}>Pending</option> <option value="approved" {{ old('classification', $student->classification) == 'approved' ? 'selected' : '' }}>Approved</option> <option value="disapproved" {{ old('classification', $student->classification) == 'disapproved' ? 'selected' : '' }}>Disapproved</option> </select> </div>
                                            <div class="mb-4">
                                                <label for="advisingNotes" class="block text-sm font-bold mb-1">Advising Notes</label>
                                                <textarea id="advisingNotes" name="advising_notes" class="w-full border border-gray-300 rounded p-2">{{ old('advising_notes', $student->advising_notes) }}</textarea>
                                            </div>
                                            <div class="flex justify-end">
                                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mr-2">Save</button>
                                                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
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
