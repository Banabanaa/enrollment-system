@extends('layouts.registrar')

@section('title', 'Under Evaluation for Enrollment')
@section('content')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Enrollment Module</h1>
    <nav class="mb-6">
        <ol class="list-reset flex">
            <li class="text-gray-600">Under Evaluation Students</li>
        </ol>
    </nav>

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

    <div class="bg-white shadow rounded mb-6">
        <div class="p-4 border-b">
            <h2 class="text-lg font-semibold flex items-center">
                <i class="fas fa-table mr-2"></i>
                Under Evaluation Students
            </h2>
        </div>
        <div class="overflow-x-auto p-4">
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">Student Number</th>
                        <th class="border p-2">Name</th>
                        <th class="border p-2">Program</th>
                        <th class="border p-2">Classification</th>
                        <th class="border p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr class="odd:bg-white even:bg-gray-50">
                            <td class="border p-2">{{ $student->student_number }}</td>
                            <td class="border p-2">{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td class="border p-2">{{ $student->program_id }}</td>
                            <td class="border p-2">{{ ucfirst($student->classification) }}</td>
                            <td class="border p-2">
                                <button type="button" class="bg-blue-500 text-white py-1 px-3 rounded text-sm" data-bs-toggle="modal" data-bs-target="#enrollModal{{ $student->id }}">
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
</div>

@endsection
