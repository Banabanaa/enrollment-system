@extends('layouts.registrar')

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
    <!-- Button with arrow icon -->
    <button class="absolute bottom-5 right-4 bg-primary text-white p-1 shadow-md hover:bg-gray-100 transition">
        <i class="fas fa-arrow-right"></i>
    </button>
</div>


    <!-- Irregular -->
    <div class="bg-primary shadow-small rounded-xl p-6 flex-1 flex items-center justify-between relative">
        <div>
            <h3 class="text-lg text-white font-semibold">Irregular</h3>
            <p class="text-2xl text-white font-bold">{{ $irregularCount }}</p>
        </div>
        <div class="absolute top-3 right-4 w-4 h-4 rounded-full bg-white"></div>
    <!-- Button with arrow icon -->
    <button class="absolute bottom-5 right-4 bg-primary text-white p-1 shadow-md hover:bg-gray-100 transition">
        <i class="fas fa-arrow-right"></i>
    </button>
</div>


    <!-- Transferee -->
    <div class="bg-primary shadow-small rounded-xl p-6 flex-1 flex items-center justify-between relative">
        <div>
            <h3 class="text-lg text-white font-semibold">Transferee</h3>
            <p class="text-2xl text-white font-bold">{{ $transfereeCount }}</p>
        </div>
        <div class="absolute top-3 right-4 w-4 h-4 rounded-full bg-white"></div>
     <!-- Button with arrow icon -->
     <button class="absolute bottom-5 right-4 bg-primary text-white p-1 shadow-md hover:bg-gray-100 transition">
        <i class="fas fa-arrow-right"></i>
    </button>
</div>


    <!-- Returnee -->
    <div class="bg-primary shadow-small rounded-xl p-6 flex-1 flex items-center justify-between relative">
        <div>
            <h3 class="text-lg text-white font-semibold">Returnee</h3>
            <p class="text-2xl text-white font-bold">{{ $returneeCount }}</p>

        </div>
        <div class="absolute top-3 right-4 w-4 h-4 rounded-full bg-white"></div>
 <!-- Button with arrow icon -->
 <button class="absolute bottom-5 right-4 bg-primary text-white p-1 shadow-md hover:bg-gray-100 transition">
        <i class="fas fa-arrow-right"></i>
    </button>
</div>


<!-- Student Count, Table, and Pie Chart Section -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <!-- Left Part - Student Count and Sections Table -->
    <div class="space-y-6">
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
                        <span class="text-lg font-bold">{{$studentCount}}</span>
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
                        <span class="text-lg font-bold">{{$bscsCount}}</span>
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
                        <span class="text-lg font-bold">{{$bsitCount}}</span>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Sections Table -->
        <div class="bg-white p-6 rounded-xl shadow-small">
            <h3 class="text-lg font-bold mb-4">Sections</h3>
            <div class="flex justify-start space-x-3 mb-4">
                <button class="px-3 py-2 text-sm text-white bg-primary rounded-lg hover:bg-primary">
                    BSCS
                </button>
                <button class="px-3 py-2 text-sm text-white bg-primary rounded-lg hover:bg-primary">
                    BSIT
                </button>
            </div>

            <table class="min-w-full bg-white shadow-sm rounded-lg">
                <thead>
                    <tr class="bg-light-gray">
                        <th class="px-6 py-3 text-left text-sm font-bold text-white bg-primary ">Year</th>
                        <th class="px-6 py-3 text-left text-sm font-bold text-white bg-primary">Section</th>
                        <th class="px-6 py-3 text-left text-sm font-bold text-white bg-primary">Number of Students</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100 border-b border-border-color">
                        <td class="px-6 py-4 text-sm text-gray-600">1st Year</td>
                        <td class="px-6 py-4 text-sm text-gray-600">5 Sections</td>
                        <td class="px-6 py-4 text-sm text-gray-600">230 Students</td>
                    </tr>
                    <tr class="hover:bg-gray-100 border-b border-border-color">
                        <td class="px-6 py-4 text-sm text-gray-600">2nd Year</td>
                        <td class="px-6 py-4 text-sm text-gray-600">4 Sections</td>
                        <td class="px-6 py-4 text-sm text-gray-600">200 Students</td>
                    </tr>
                    <tr class="hover:bg-gray-100 border-b border-border-color">
                        <td class="px-6 py-4 text-sm text-gray-600">3rd Year</td>
                        <td class="px-6 py-4 text-sm text-gray-600">6 Sections</td>
                        <td class="px-6 py-4 text-sm text-gray-600">280 Students</td>
                    </tr>
                    <tr class="hover:bg-gray-100 border-b border-border-color">
                        <td class="px-6 py-4 text-sm text-gray-600">4th Year</td>
                        <td class="px-6 py-4 text-sm text-gray-600">3 Sections</td>
                        <td class="px-6 py-4 text-sm text-gray-600">150 Students</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

  <!-- Pie Chart -->
<div class="bg-white p-6 rounded-xl shadow-small">
    <h3 class="text-lg font-bold text-primary mb-4">Student Distribution</h3>
    <div class="flex justify-center items-center h-80">
        <canvas id="studentDistributionChart" class="w-full h-full object-contain rounded-lg"></canvas>
    </div>
    <!-- Legends -->
    <div class="flex justify-center mt-4 space-x-6" id="customLegend">
        <!-- Dynamic labels will be added here -->
    </div>
</div>

@endsection
