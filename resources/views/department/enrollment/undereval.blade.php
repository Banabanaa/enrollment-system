@extends('layouts.department')
@php
    $title = 'CVSU - In Progress';
@endphp
@section('title', 'Under Evaluation for Enrollment')
@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-2xl text-primary text-center font-semibold mt-6 ">Advising - In Progress</h1>

        <!-- Table Container with limited width to the screen -->
        <div class="overflow-x-auto w-full">
            <table class="min-w-full bg-white shadow-sm rounded-lg">
                <thead>
                    <tr class="bg-primary">
                        <th class="px-6 py-3 text-left text-sm font-bold text-white">Student Number</th>
                        <th class="px-6 py-3 text-left text-sm font-bold text-white">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-bold text-white">Program</th>
                        <th class="px-6 py-3 text-left text-sm font-bold text-white">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr class="hover:bg-gray-100 border-b border-border-color">
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $student->student_number }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $student->program_id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ ucfirst($student->classification) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
