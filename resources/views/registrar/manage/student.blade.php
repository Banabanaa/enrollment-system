@extends('layouts.registrar')

@section('title', 'Student Account Management')
@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mt-4">Student Accounts Management</h1>
    <nav class="bg-gray-100 p-4 rounded my-4">
        <ol class="list-disc flex space-x-2">
            <li class="text-gray-700">Account Management</li>
        </ol>
    </nav>

    {{-- Success/Error Messages --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Student CRUD Table --}}
    <div class="bg-white shadow-md rounded overflow-hidden">
        <div class="bg-gray-200 p-4 flex justify-between items-center">
            <span class="font-semibold text-gray-800"><i class="fas fa-table"></i> Students Table</span>
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Student</button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 text-sm uppercase">
                        <th class="py-3 px-6 text-left">Student Number</th>
                        <th class="py-3 px-6 text-left">Last Name</th>
                        <th class="py-3 px-6 text-left">First Name</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Classification</th>
                        <th class="py-3 px-6 text-left">Program</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-6">{{ $student->student_number }}</td>
                            <td class="py-3 px-6">{{ $student->last_name }}</td>
                            <td class="py-3 px-6">{{ $student->first_name }}</td>
                            <td class="py-3 px-6">{{ $student->email }}</td>
                            <td class="py-3 px-6">{{ $student->classification }}</td>
                            <td class="py-3 px-6">{{ $student->program_id }}</td>
                            <td class="py-3 px-6">
                                <button class="bg-primary hover:bg-primary text-white py-1 px-3 rounded text-sm" data-bs-toggle="modal" data-bs-target="#editStudentModal-{{ $student->id }}">Edit</button>
                                <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm" data-bs-toggle="modal" data-bs-target="#deleteStudentModal-{{ $student->id }}">Delete</button>
                            </td>
                        </tr>

                        {{-- Edit Modal --}}
                        <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="editStudentModal-{{ $student->id }}">
                            <div class="flex items-center justify-center min-h-screen">
                                <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                    <form action="{{ route('registrar.manage.student.update', $student->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="p-6 border-b  border-gray-200">
                                            <h5 class="text-lg font-bold ">Edit Student</h5>
                                            <button type="button" class=" hover:text-gray-700 float-right">&times;</button>
                                        </div>
                                        <div class="p-6">
                                            <label for="student_number" class="block text-sm font-medium text-gray-700">Student Number</label>
                                            <input type="text" name="student_number" value="{{ old('student_number', $student->student_number) }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <!-- Add other form fields similarly with Tailwind -->
                                            <label for="classification" class="block text-sm font-medium text-gray-700 mt-4">Classification</label>
                                            <select name="classification" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                <option value="under evaluation" {{ old('classification', $student->classification) == 'under evaluation' ? 'selected' : '' }}>Under Evaluation</option>
                                                <option value="pending" {{ old('classification', $student->classification) == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="regular" {{ old('classification', $student->classification) === 'regular' ? 'selected' : '' }}>Regular</option>
                                                <option value="irregular" {{ old('classification', $student->classification) === 'irregular' ? 'selected' : '' }}>Irregular</option>
                                                <option value="transferee" {{ old('classification', $student->classification) === 'transferee' ? 'selected' : '' }}>Transferee</option>
                                                <option value="returnee" {{ old('classification', $student->classification) === 'returnee' ? 'selected' : '' }}>Returnee</option>
                                            </select>
                                        </div>
                                        <div class="p-6 border-t border-gray-200 text-right">
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Save Changes</button>
                                            <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Delete Modal --}}
                        <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="deleteStudentModal-{{ $student->id }}">
                            <div class="flex items-center justify-center min-h-screen">
                                <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
                                    <div class="p-6 border-b border-gray-200">
                                        <h5 class="text-lg font-bold">Delete Student</h5>
                                        <button type="button" class="text-gray-500 hover:text-gray-700 float-right">&times;</button>
                                    </div>
                                    <div class="p-6">
                                        <p>Are you sure you want to delete this student?</p>
                                    </div>
                                    <div class="p-6 border-t border-gray-200 text-right">
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
