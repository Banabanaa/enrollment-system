@extends('layouts.student')
@php
    $title = 'CVSU - Student Dashboard';
@endphp
@section('content')


<!-- Student Count Per Status -->
<div class="flex flex-wrap gap-4 mb-5 p-2 bg-light-gray rounded-2xl mx-auto mt-1">

    <!-- Regular -->
    <div class="bg-primary shadow-small rounded-2xl p-6 flex-1 flex items-center justify-between relative">
        <div>
            <h3 class="text-lg font-semibold text-white">Status</h3>
            <p class="text-2xl text-white font-semibold capitalize">{{ $student->classification }}</p>
        </div>
        <div class="absolute top-3 right-4 w-4 h-4 rounded-full bg-white"></div>
    </div>

    <!-- Irregular -->
    <div class="bg-primary shadow-small rounded-2xl p-6 flex-1 flex items-center justify-between relative">
        <div>
            <h3 class="text-lg font-semibold text-white">Course</h3>
            <p class="text-sm text-white font-semibold">{{ $student->program_id }}</p>
        </div>
        <div class="absolute top-3 right-4 w-4 h-4 rounded-full bg-white"></div>
    </div>

    <!-- Transferee -->
    <div class="bg-primary shadow-small rounded-2xl p-6 flex-1 flex items-center justify-between relative">
        <div>
            <h3 class="text-lg font-semibold text-white">Section</h3>
            <p class="text-2xl text-white font-semibold">{{ $student->section }}</p>
        </div>
        <div class="absolute top-3 right-4 w-4 h-4 rounded-full bg-white"></div>
    </div>

    <!-- Returnee -->
    <div class="bg-primary shadow-small rounded-2xl p-6 flex-1 flex items-center justify-between relative">
        <div>
            <h3 class="text-lg font-semibold text-white">Year</h3>
            <p class="text-2xl text-white font-semibold">{{ $student->year }}</p>
        </div>
        <div class="absolute top-3 right-4 w-4 h-4 rounded-full bg-white"></div>
    </div>
</div>
<!-- Instructors Count Container -->
<div class="flex justify-between items-center bg-light text-primary p-6 rounded-2xl shadow-lg mt-4 mx-auto w-full h-60">
    <div class="w-3/4">
        <h2 class="text-2xl font-bold">Hello {{ $student->first_name}} {{ $student->last_name }}!</h2>
        <p class="text-sm mt-2">
            Your one-stop platform for accessing student information, grades, schedules,
            and campus updates. Stay informed and in control of your academic journey
            at CVSU Bacoor!
        </p>
       
        <div class="mt-4">
        </div>
    </div>
    <div class="w-1/4 flex justify-center">
        <img src="{{ asset('assets/illustration.svg') }}" alt="Student Icon" class="w-80 h-auto rounded-full object-contain">
    </div>
</div>

@endsection