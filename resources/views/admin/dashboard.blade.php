@extends('layouts.admin')
@php
    $title = 'CVSU - Admin Dashboard';
@endphp
@section('content')
@include('admin.modals.admin.edit-profile')
<!-- Student Count Per Status -->
<div class="flex flex-wrap gap-4 mb-5 p-2 bg-light-gray rounded-2xl mx-auto mt-1">

    <!-- Regular -->
    <div class="bg-primary shadow-small rounded-xl p-6 flex-1 flex items-center justify-between relative">
        <div>
            <h3 class="text-lg text-white font-semibold">Admin</h3>
            <span class="total-value text-white text-2xl font-semibold">{{ $adminCount }}</span>
        </div>
        <div class="absolute top-3 right-4 w-2 h-2 rounded-full bg-white"></div>
        <img src="{{ asset('assets/users.svg') }}" alt="Users Icon" class="h-9 w-9">
    </div>

    <!-- Irregular -->
    <div class="bg-primary shadow-small rounded-xl p-6 flex-1 flex items-center justify-between relative">
        <div>
            <h3 class="text-lg text-white font-semibold">Student</h3>
            <span class="total-value text-white text-2xl font-semibold">{{ $studentCount }}</span>
        </div>
        <div class="absolute top-3 right-4 w-2 h-2 rounded-full bg-white"></div>
        <img src="{{ asset('assets/users.svg') }}" alt="Users Icon" class="h-9 w-9">
    </div>

    <!-- Transferee -->
    <div class="bg-primary shadow-small rounded-xl p-6 flex-1 flex items-center justify-between relative">
        <div>
            <h3 class="text-lg text-white font-semibold">Department</h3>
            <span class="total-value text-white text-2xl font-semibold">{{ $departmentCount }}</span>
        </div>
        <div class="absolute top-3 right-4 w-2 h-2 rounded-full bg-white"></div>
        <img src="{{ asset('assets/users.svg') }}" alt="Users Icon" class="h-9 w-9">
    </div>

    <!-- Returnee -->
    <div class="bg-primary shadow-small rounded-xl p-6 flex-1 flex items-center justify-between relative">
        <div>
            <h3 class="text-lg text-white font-semibold">Registrar</h3>
            <span class="total-value text-white text-2xl font-semibold">{{ $registrarCount }}</span>
        </div>
        <div class="absolute top-3 right-4 w-2 h-2 rounded-full bg-white"></div>
        <img src="{{ asset('assets/users.svg') }}" alt="Users Icon" class="h-9 w-9">
    </div>
</div>



<!-- Table Section -->
<div class="p-5 bg-light rounded-xl shadow-big w-full mx-auto mb-8">

    <!-- Title and View All Button -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="font-header text-xl">Recently Added Users</h2>

    </div>

    <!-- Table Container with limited width to the screen -->
    <div class="overflow-x-auto w-full">
        <table class="min-w-full bg-white shadow-sm rounded-lg">
            <thead>
                <tr class="bg-primary">
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr class="hover:bg-gray-100 border-b border-border-color">
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $admin->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $admin->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $admin->created_at }}</td> <!-- Assuming user_type is a column in your users table -->
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize Simple-Datatables for each table
        const table1 = document.getElementById('datatablesSimple1');
        const table2 = document.getElementById('datatablesSimple2');
        const table3 = document.getElementById('datatablesSimple3');
        const table4 = document.getElementById('datatablesSimple4');

        if (table1) new simpleDatatables.DataTable(table1);
        if (table2) new simpleDatatables.DataTable(table2);
        if (table3) new simpleDatatables.DataTable(table3);
        if (table4) new simpleDatatables.DataTable(table4);
    });

</script>
@endsection