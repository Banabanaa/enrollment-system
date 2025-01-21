@extends('layouts.department')

@section('title', 'Under Evaluation for Enrollment')
@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mt-6">Enrollment Module</h1>
    <nav class="text-sm mt-2 mb-4">
        <ol class="list-none p-0 inline-flex">
            <li><span class="text-gray-500">UNDER EVALUATION STUDENTS</span></li>
        </ol>
    </nav>

    {{-- Under Evaluation Students Table --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m0 0l-7 7m7-7l7 7" />
            </svg>
            Under Evaluation Students
        </h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-sm text-left border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Student Number</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Program</th>
                        <th class="border border-gray-300 px-4 py-2">Classification</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $student->student_number }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $student->program_id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ ucfirst($student->classification) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
