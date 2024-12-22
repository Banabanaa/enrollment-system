@extends('layouts.student')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Welcome, {{ Auth::user()->first_name }}!</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Student Dashboard</li>
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

    <!-- Student Information Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Student Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="student_number" class="form-label">Student Number</label>
                        <input type="text" id="student_number" class="form-control" value="{{ $student->student_number }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" class="form-control" value="{{ $student->first_name }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" class="form-control" value="{{ $student->last_name }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" id="middle_name" class="form-control" value="{{ $student->middle_name }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" id="contact_number" class="form-control" value="{{ $student->contact_number }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="text" id="birthday" class="form-control" value="{{ $student->birthday }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sex" class="form-label">Sex</label>
                        <input type="text" id="sex" class="form-control" value="{{ $student->sex }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Address Information Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Address Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="house_number" class="form-label">House Number</label>
                        <input type="text" id="house_number" class="form-control" value="{{ $student->house_number }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="street" class="form-label">Street</label>
                        <input type="text" id="street" class="form-control" value="{{ $student->street }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="barangay" class="form-label">Barangay</label>
                        <input type="text" id="barangay" class="form-control" value="{{ $student->barangay }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" id="city" class="form-control" value="{{ $student->city }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="province" class="form-label">Province</label>
                        <input type="text" id="province" class="form-control" value="{{ $student->province }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="zip_code" class="form-label">Zip Code</label>
                        <input type="text" id="zip_code" class="form-control" value="{{ $student->zip_code }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Information Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Account Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" value="{{ $student->email }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" value="******" readonly>
                        <button type="button" class="btn btn-warning mt-2" id="editPasswordBtn" onclick="togglePasswordEdit()">Edit Password</button>
                    </div>
                </div>

                <!-- Password Editing Form -->
                <div id="editPasswordForm" class="col-md-6 mt-3" style="display: none;">
                    <form action="{{ route('student.updatePassword') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" id="new_password" class="form-control" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="new_password_confirmation" class="form-control" name="new_password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                        <button type="button" class="btn btn-secondary" onclick="togglePasswordEdit()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to toggle the password editing form
    function togglePasswordEdit() {
        const editPasswordForm = document.getElementById('editPasswordForm');
        const editPasswordBtn = document.getElementById('editPasswordBtn');
        
        if (editPasswordForm.style.display === 'none') {
            editPasswordForm.style.display = 'block';
            editPasswordBtn.style.display = 'none';
        } else {
            editPasswordForm.style.display = 'none';
            editPasswordBtn.style.display = 'inline-block';
        }
    }
</script>
@endsection
