    @extends('layouts.registrar')
@php
    $title = 'CVSU - Registrar Dashboard';
@endphp
    @section('content')

    <!-- Student Count Per Status -->
    <div class="flex flex-wrap gap-4 mb-5 p-2 bg-light-gray rounded-2xl mx-auto mt-1">
            <!-- Regular -->
        <div class="bg-primary shadow-small rounded-xl p-6 flex-1 flex items-center justify-between relative">
            <div>
                <h3 class="text-lg text-white font-semibold">Regular</h3>
                <p class="text-2xl text-white font-bold">{{ $regularCount }}</p>
            </div>
            <div class="absolute top-3 right-4 w-4 h-4 rounded-full bg-white"></div>
            <!-- Replace button with the admin SVG -->
            <img src="{{ asset('assets/users.svg') }}" alt="Users Icon" class="h-9 w-9 absolute bottom-5 right-4">
        </div>

        <!-- Irregular -->
        <div class="bg-primary shadow-small rounded-xl p-6 flex-1 flex items-center justify-between relative">
            <div>
                <h3 class="text-lg text-white font-semibold">Irregular</h3>
                <p class="text-2xl text-white font-bold">{{ $irregularCount }}</p>
            </div>
            <div class="absolute top-3 right-4 w-4 h-4 rounded-full bg-white"></div>
            <!-- Replace button with the admin SVG -->
            <img src="{{ asset('assets/users.svg') }}" alt="Users Icon" class="h-9 w-9 absolute bottom-5 right-4">
        </div>

        <!-- Transferee -->
        <div class="bg-primary shadow-small rounded-xl p-6 flex-1 flex items-center justify-between relative">
            <div>
                <h3 class="text-lg text-white font-semibold">Transferee</h3>
                <p class="text-2xl text-white font-bold">{{ $transfereeCount }}</p>
            </div>
            <div class="absolute top-3 right-4 w-4 h-4 rounded-full bg-white"></div>
            <!-- Replace button with the admin SVG -->
            <img src="{{ asset('assets/users.svg') }}" alt="Users Icon" class="h-9 w-9 absolute bottom-5 right-4">
        </div>

        <!-- Returnee -->
        <div class="bg-primary shadow-small rounded-xl p-6 flex-1 flex items-center justify-between relative">
            <div>
                <h3 class="text-lg text-white font-semibold">Returnee</h3>
                <p class="text-2xl text-white font-bold">{{ $returneeCount }}</p>
            </div>
            <div class="absolute top-3 right-4 w-4 h-4 rounded-full bg-white"></div>
            <!-- Replace button with the admin SVG -->
            <img src="{{ asset('assets/users.svg') }}" alt="Users Icon" class="h-9 w-9 absolute bottom-5 right-4">
        </div>
        </div>


    
        <!-- Left Part - Student Count and Sections Table -->
        <div class="space-y-6 w-full">
            <!-- Total Students per Course Container -->
            <div class="bg-white p-6 rounded-xl shadow-small">
                <ul class="space-y-4">
                    <!-- Total Students -->
                    <li class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L1 7l11 5 9-4.09V17a3.99 3.99 0 0 1 2 3.44V9.91L12 2z"/>
                                    <path d="M4 14.4v3.44a4 4 0 0 0 8 0V14.4l-4 2-4-2z"/>
                                </svg>
                            </div>
                            <span class="text-gray-600 font-semibold">Total Students</span>
                        </div>
                        <div class="flex items-center">
                            <div class="h-6 w-px bg-gray-300 mr-4"></div>
                            <span class="text-2xl font-bold">{{$studentCount}}</span>
                        </div>
                    </li>
                    <!-- BS Computer Science -->
                    <li class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L1 7l11 5 9-4.09V17a3.99 3.99 0 0 1 2 3.44V9.91L12 2z"/>
                                    <path d="M4 14.4v3.44a4 4 0 0 0 8 0V14.4l-4 2-4-2z"/>
                                </svg>
                            </div>
                            <span class="text-gray-600 font-semibold">BS Computer Science</span>
                        </div>
                        <div class="flex items-center">
                            <div class="h-6 w-px bg-gray-300 mr-4"></div>
                            <span class="text-2xl font-bold">{{$bscsCount}}</span>
                        </div>
                    </li>
                    <!-- BS Information Technology -->
                    <li class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L1 7l11 5 9-4.09V17a3.99 3.99 0 0 1 2 3.44V9.91L12 2z"/>
                                    <path d="M4 14.4v3.44a4 4 0 0 0 8 0V14.4l-4 2-4-2z"/>
                                </svg>
                            </div>
                            <span class="text-gray-600 font-semibold">BS Information Technology</span>
                        </div>
                        <div class="flex items-center">
                            <div class="h-6 w-px bg-gray-300 mr-4"></div>
                            <span class="text-2xl font-bold">{{$bsitCount}}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @endsection
