@extends('layouts.registrar')
@php
    $title = 'CVSU -  Student Accounts';
@endphp
@section('title', 'Under Evaluation for Enrollment')
@section('content')

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="p-5 bg-light rounded-2xl shadow-big w-full mx-auto mb-8">
    <!-- Title and View All Button -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="font-table-header text-xl font-semibold text-primary">Under Evaluation Students</h2>
    </div>
    <!-- Table -->
    <div class="overflow-x-auto w-full">
        <table class="min-w-full bg-white shadow-sm rounded-lg">
            <thead>
                <tr class="bg-primary">
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Student Number</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Program</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr class="hover:bg-gray-100 border-b border-border-color">
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $student->student_number }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $student->program_id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ ucfirst($student->classification) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 text-center">
                            <button type="button" class="bg-primary text-white py-1 px-3 rounded text-sm" data-bs-toggle="modal" data-bs-target="#enrollModal{{ $student->id }}">
                                Enroll
                            </button>
                            @include('registrar.modals.enroll-student', ['student' => $student])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
