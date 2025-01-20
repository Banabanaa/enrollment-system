@extends('layouts.admin')

@section('content')
@include('admin.modals.add-registrar-modal')
@include('admin.modals.edit-registrar-modal')
@include('admin.modals.delete-registrar-modal')

<!-- Filter Buttons and Search Bar -->
<div class="flex justify-between items-center mb-4 pt-4">
    <!-- Search Bar Section -->
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
            <img src="{{ asset('assets/search-icon.svg') }}" alt="Search Icon"
                class="h-6 w-6 group-hover:scale-110 transition-transform duration-200 ease-in-out">
            <span
                class="ml-2 text-xs text-gray-600 font-semibold font-poppins group-hover:scale-125 transition-all duration-200 ease-in-out"></span>
        </div>
        <input type="text"
            class="text-sm border-hidden px-4 py-2 rounded-lg focus:outline-none focus:ring-0 focus:ring-light focus:border-transparent pl-12 shadow-lg"
            placeholder="Search users..." />
    </div>

</div>

<!-- Table Section -->
<div class="p-5 bg-light rounded-2xl shadow-big w-full mx-auto mb-8">

    <!-- Title, Filter Dropdowns, and View All Button -->
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center space-x-4">
            <h2 class="font-table-header text-xl font-bold text-primary">Students Table</h2>
        </div>
        <div class="flex space-x-2">
            <button
                class="text-sm text-light bg-primary font-semibold px-4 py-2 rounded-lg hover:bg-primary hover:text-white">Export
                as Excel</button>
                <button class="text-sm text-light bg-primary font-semibold px-4 py-2 rounded-lg hover:bg-primary hover:text-white"
                onclick="toggleModal('addRegistrarModal')">
                <img src="{{ asset('assets/plus.svg') }}" alt="Plus Icon" class="h-5 w-5 inline-block mr-2">
                Add Registrar
            </button>

        </div>
    </div>



    <!-- Table Container with limited width to the screen -->
    <div class="overflow-x-auto w-full">
        <table class="min-w-full bg-white shadow-sm rounded-lg">
            <thead>
                <tr class="bg-primary">
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">First Name</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Last Name</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-white">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registrars as $registrar)
                    <tr class="hover:bg-gray-100 border-b border-border-color">
                        
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $registrar->first_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $registrar->last_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $registrar->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 text-center">
                            <div class="flex justify-left space-x-4">
                                <a href="#" class="text-lime-green hover:text-green-500">
                                    <span class="material-icons text-xl" onclick="toggleModal('editRegistrarModal-{{ $registrar->id }}')">edit</span>
                                </a>
                                <a href="#" class="text-lime-green hover:text-red-500">
                                    <span class="material-icons text-xl" onclick="toggleModal('deleteRegistrarModal-{{ $registrar->id }}')">delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Section -->
        <div class="flex items-center justify-center space-x-6 mt-4">
            <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-primary hover:text-white">Previous</button>
            <span class="text-gray-600 hover:bg-primary hover:text-white hover:rounded-full p-2 cursor-pointer">1</span>
            <span class="text-gray-600 hover:bg-primary hover:text-white hover:rounded-full p-2 cursor-pointer">2</span>
            <span class="text-gray-600 hover:bg-primary hover:text-white hover:rounded-full p-2 cursor-pointer">3</span>
            <span class="text-gray-600 hover:bg-primary hover:text-white hover:rounded-full p-2 cursor-pointer">4</span>
            <span class="text-gray-600 hover:bg-primary hover:text-white hover:rounded-full p-2 cursor-pointer">5</span>
            <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-primary hover:text-light">Next</button>
        </div>
    </div>


@endsection


<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }
</script>
