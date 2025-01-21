@extends('layouts.department')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Student Accounts Management</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Account Management</li>
    </ol>

    {{-- Success/Error Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Student CRUD Table --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <span><i class="fas fa-table me-1"></i> Students Table</span>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Student</button>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Classification</th>
                        <th>Program</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->student_number }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ ucfirst($student->classification) }}</td>
                            <td>{{ $student->program_id }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editStudentModal-{{ $student->id }}">Edit</button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteStudentModal-{{ $student->id }}">Delete</button>
                            </td>
                        </tr>

                        {{-- Edit Modal --}}
                        <div class="modal fade" id="editStudentModal-{{ $student->id }}" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="{{ route('department.manage.student.update', $student->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                {{-- STUDENT INFORMATION --}}
                                                <h5 class="col-12 mb-3 text-center">-------- Student Information --------</h5>
                                                <div class="col-md-6 mb-3">
                                                    <label for="student_number" class="form-label">Student Number</label>
                                                    <input type="text" class="form-control" name="student_number" value="{{ old('student_number', $student->student_number) }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $student->last_name) }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $student->first_name) }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="middle_name" class="form-label">Middle Name</label>
                                                    <input type="text" class="form-control" name="middle_name" value="{{ old('middle_name', $student->middle_name) }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="extension_name" class="form-label">Extension Name (Optional)</label>
                                                    <input type="text" class="form-control" name="extension_name" value="{{ old('extension_name', $student->extension_name) }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="contact_number" class="form-label">Contact Number</label>
                                                    <input type="text" class="form-control" name="contact_number" value="{{ old('contact_number', $student->contact_number) }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" value="{{ old('email', $student->email) }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="birthday" class="form-label">Birthday</label>
                                                    <input type="date" class="form-control" name="birthday" value="{{ old('birthday', $student->birthday) }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="sex" class="form-label">Sex</label>
                                                    <select class="form-select" name="sex">
                                                        <option value="male" {{ old('sex', $student->sex) === 'male' ? 'selected' : '' }}>Male</option>
                                                        <option value="female" {{ old('sex', $student->sex) === 'female' ? 'selected' : '' }}>Female</option>
                                                        <option value="other" {{ old('sex', $student->sex) === 'other' ? 'selected' : '' }}>Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="classification" class="form-label">Classification</label>
                                                    <select class="form-select" name="classification">
                                                        <option value="incomplete" {{ old('classification', $student->classification) == 'incomplete' ? 'selected' : '' }}>Incomplete</option>
                                                        <option value="under evaluation" {{ old('classification', $student->classification) == 'under evaluation' ? 'selected' : '' }}>Under Evaluation</option>
                                                        <option value="pending" {{ old('classification', $student->classification) == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="regular" {{ old('classification', $student->classification) === 'regular' ? 'selected' : '' }}>Regular</option>
                                                        <option value="irregular" {{ old('classification', $student->classification) === 'irregular' ? 'selected' : '' }}>Irregular</option>
                                                        <option value="transferee" {{ old('classification', $student->classification) === 'transferee' ? 'selected' : '' }}>Transferee</option>
                                                        <option value="returnee" {{ old('classification', $student->classification) === 'returnee' ? 'selected' : '' }}>Returnee</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="program_id" class="form-label">Program</label>
                                                    <select class="form-select" name="program_id">
                                                        <option value="Bachelor of Science in Computer Science" {{ old('program_id', $student->program_id) === 'Bachelor of Science in Computer Science' ? 'selected' : '' }}>
                                                            Bachelor of Science in Computer Science
                                                        </option>
                                                        <option value="Bachelor of Science in Information Technology" {{ old('program_id', $student->program_id) === 'Bachelor of Science in Information Technology' ? 'selected' : '' }}>
                                                            Bachelor of Science in Information Technology
                                                        </option>
                                                    </select>
                                                </div>

                                                {{-- Year and Section --}}
                                                <h5 class="col-12 mb-3 text-center">-------- Year & Section --------</h5>
                                                <div class="col-md-6 mb-3">
                                                    <label for="year" class="form-label">Year</label>
                                                    <select class="form-select" name="year">
                                                        <option value="1st Year" {{ old('year', $student->year) === '1st Year' ? 'selected' : '' }}>1st Year</option>
                                                        <option value="2nd Year" {{ old('year', $student->year) === '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                                                        <option value="3rd Year" {{ old('year', $student->year) === '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                                        <option value="4th Year" {{ old('year', $student->year) === '4th Year' ? 'selected' : '' }}>4th Year</option>
                                                        <option value="5th Year" {{ old('year', $student->year) === '5th Year' ? 'selected' : '' }}>5th Year</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="section" class="form-label">Section</label>
                                                    <input type="text" class="form-control" name="section" value="{{ old('section', $student->section) }}">
                                                </div>

                                                {{-- ADDRESS --}}
                                                <h5 class="col-12 mb-3 text-center">-------- Address --------</h5>
                                                <div class="col-md-6 mb-3">
                                                    <label for="house_number" class="form-label">House Number</label>
                                                    <input type="text" class="form-control" name="house_number" value="{{ old('house_number', $student->house_number) }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="street" class="form-label">Street</label>
                                                    <input type="text" class="form-control" name="street" value="{{ old('street', $student->street) }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="barangay" class="form-label">Barangay</label>
                                                    <input type="text" class="form-control" name="barangay" value="{{ old('barangay', $student->barangay) }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" class="form-control" name="city" value="{{ old('city', $student->city) }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="province" class="form-label">Province</label>
                                                    <input type="text" class="form-control" name="province" value="{{ old('province', $student->province) }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="zip_code" class="form-label">Zip Code</label>
                                                    <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code', $student->zip_code) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        

                        {{-- Delete Modal --}}
                        <div class="modal fade" id="deleteStudentModal-{{ $student->id }}" tabindex="-1" aria-labelledby="deleteStudentModalLabel-{{ $student->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('department.manage.student.destroy', $student->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteStudentModalLabel-{{ $student->id }}">Delete Student</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this student?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Add Student Modal --}}
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('department.manage.student.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{-- STUDENT INFORMATION --}}
                        <h5 class="col-12 mb-3 text-center">-------- Student Information --------</h5>
                        <div class="col-md-6 mb-3">
                            <label for="student_number" class="form-label">Student Number</label>
                            <input type="text" class="form-control" name="student_number" value="{{ old('student_number') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="extension_name" class="form-label">Extension Name (Optional)</label>
                            <input type="text" class="form-control" name="extension_name" value="{{ old('extension_name') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" value="{{ old('contact_number') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sex" class="form-label">Sex</label>
                            <select class="form-select" name="sex">
                                <option value="male" {{ old('sex') === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('sex') === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('sex') === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="classification" class="form-label">Classification</label>
                            <select class="form-select" name="classification">
                                <option value="under evaluation" {{ old('classification', $student->classification) == 'under evaluation' ? 'selected' : '' }}>Under Evaluation</option>
                                <option value="pending" {{ old('classification', $student->classification) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="regular" {{ old('classification') === 'regular' ? 'selected' : '' }}>Regular</option>
                                <option value="irregular" {{ old('classification') === 'irregular' ? 'selected' : '' }}>Irregular</option>
                                <option value="transferee" {{ old('classification') === 'transferee' ? 'selected' : '' }}>Transferee</option>
                                <option value="returnee" {{ old('classification') === 'returnee' ? 'selected' : '' }}>Returnee</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="program_id" class="form-label">Program</label>
                            <select class="form-select" name="program_id">
                                <option value="Bachelor of Science in Computer Science" {{ old('program_id') === 'Bachelor of Science in Computer Science' ? 'selected' : '' }}>
                                    Bachelor of Science in Computer Science
                                </option>
                                <option value="Bachelor of Science in Information Technology" {{ old('program_id') === 'Bachelor of Science in Information Technology' ? 'selected' : '' }}>
                                    Bachelor of Science in Information Technology
                                </option>
                            </select>
                        </div>

                        {{-- Year and Section --}}
                        <h5 class="col-12 mb-3 text-center">-------- Year & Section --------</h5>
                        <div class="col-md-6 mb-3">
                            <label for="year" class="form-label">Year</label>
                            <select class="form-select" name="year">
                                <option value="1st Year" {{ old('year') === '1st Year' ? 'selected' : '' }}>1st Year</option>
                                <option value="2nd Year" {{ old('year') === '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                                <option value="3rd Year" {{ old('year') === '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                <option value="4th Year" {{ old('year') === '4th Year' ? 'selected' : '' }}>4th Year</option>
                                <option value="5th Year" {{ old('year') === '5th Year' ? 'selected' : '' }}>5th Year</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="section" class="form-label">Section</label>
                            <input type="text" class="form-control" name="section" value="{{ old('section') }}">
                        </div>

                        {{-- ADDRESS --}}
                        <h5 class="col-12 mb-3 text-center">-------- Address --------</h5>
                        <div class="col-md-6 mb-3">
                            <label for="house_number" class="form-label">House Number</label>
                            <input type="text" class="form-control" name="house_number" value="{{ old('house_number') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" class="form-control" name="street" value="{{ old('street') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="barangay" class="form-label">Barangay</label>
                            <input type="text" class="form-control" name="barangay" value="{{ old('barangay') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" class="form-control" name="province" value="{{ old('province') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="zip_code" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
