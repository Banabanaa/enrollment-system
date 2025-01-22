@extends('layouts.department')
@php
    $title = 'CVSU - Pending Status';
@endphp

@section('title', 'Advising for Enrollment')
@section('content')
@include('department.modals.department.advis-modal')

<div class="container mx-auto px-4">
    <h1 class="text-2xl text-primary text-center font-semibold mt-6">Pending Students</h1>

    <!-- Table Container with limited width to the screen -->
    <div class="overflow-x-auto w-full">
        <table class="min-w-full bg-white shadow-sm rounded-lg">
            <thead>
                <tr class="bg-primary">
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Student Number</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">First Name</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Last Name</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Program</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Year</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Section</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="hover:bg-gray-100 border-b border-border-color">
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $student->student_number }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $student->first_name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $student->last_name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $student->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $student->program_id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $student->year }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $student->section }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">
                        <div class="flex justify-left space-x-4">
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-bs-toggle="modal" onclick="toggleModal('adviseModal')">
                                Advise
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }
</script>

@endsection
