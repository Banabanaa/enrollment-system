@extends('layouts.department')
@php
    $title = 'CVSU - Department Dashboard';
@endphp
@section('content')
<!-- Dashboard Stats Section -->
<div class="flex gap-4 mb-5 p-2 bg-light-gray rounded-2xl mx-auto mt-1">

    <!-- Bachelor of Science in Computer Science -->
    <div class="w-1/2"> <!-- This ensures both cards take up equal width -->
      <div class="bg-primary shadow-small rounded-xl p-6 flex items-center justify-between relative w-full">
        <div>
          <h3 class="text-lg text-white font-semibold">BS - Computer Science </h3>
          <span class="total-value text-white text-2xl font-semibold">{{ $bscsCount }}</span>
        </div>
        <div class="absolute top-3 right-4 w-2 h-2 rounded-full bg-white"></div>
        <img src="{{ asset('assets/cslogo.jpg') }}" alt="Users Icon" class="h-20 w-20 rounded-full">
      </div>
    </div>

    <!-- Bachelor of Science in Information Technology -->
    <div class="w-1/2"> <!-- Same here for the second card -->
      <div class="bg-primary shadow-small rounded-xl p-6 flex items-center justify-between relative w-full">
        <div>
          <h3 class="text-lg text-white font-semibold">BS - Information Technology</h3>
          <span class="total-value text-white text-2xl font-semibold">{{ $bsitCount }}</span>
        </div>
        <div class="absolute top-3 right-4 w-2 h-2 rounded-full bg-white"></div>
        <img src="{{ asset('assets/itlogo.jpg') }}" alt="Users Icon" class="h-20 w-20 rounded-full">
      </div>
    </div>

  </div> <!-- End of Dashboard Stats Section -->

<!-- Table Section -->
<div class="p-5 bg-light rounded-2xl shadow-big w-full mx-auto mb-8">

    <!-- Title, Filter Dropdowns, and View All Button -->
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center space-x-4">
            <h2 class="font-table-header text-xl font-bold text-primary">Recently Added Students</h2>
        </div>
    </div>



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
                    </tr>
                @endforeach
            </tbody>
        </table>



@endsection