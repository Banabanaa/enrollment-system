@extends('layouts.registrar')

@section('title', 'Registrar Account Management')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Registrar Accounts Management</h1>
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

    {{-- Registrar CRUD Table --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <span><i class="fas fa-table me-1"></i> Registrars Table</span>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addRegistrarModal">Add Registrar</button>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registrars as $registrar)
                        <tr>
                            <td>{{ $registrar->last_name }}</td>
                            <td>{{ $registrar->first_name }}</td>
                            <td>{{ $registrar->email }}</td>
                            <td>{{ $registrar->created_at->format('Y-m-d') }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editRegistrarModal-{{ $registrar->id }}">Edit</button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRegistrarModal-{{ $registrar->id }}">Delete</button>
                            </td>
                        </tr>

                        {{-- Edit Modal --}}
                        <div class="modal fade" id="editRegistrarModal-{{ $registrar->id }}" tabindex="-1" aria-labelledby="editRegistrarModalLabel-{{ $registrar->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('registrar.manage.registrar.update', $registrar->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editRegistrarModalLabel-{{ $registrar->id }}">Edit Registrar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="last_name" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" name="last_name" value="{{ $registrar->last_name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="first_name" class="form-label">First Name</label>
                                                <input type="text" class="form-control" name="first_name" value="{{ $registrar->first_name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="middle_name" class="form-label">Middle Name (Optional)</label>
                                                <input type="text" class="form-control" name="middle_name" value="{{ $registrar->middle_name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" value="{{ $registrar->email }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact_number" class="form-label">Contact Number</label>
                                                <input type="text" class="form-control" name="contact_number" value="{{ $registrar->contact_number }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Leave blank to keep current password">
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
                        <div class="modal fade" id="deleteRegistrarModal-{{ $registrar->id }}" tabindex="-1" aria-labelledby="deleteRegistrarModalLabel-{{ $registrar->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('registrar.manage.registrar.destroy', $registrar->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteRegistrarModalLabel-{{ $registrar->id }}">Delete Registrar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this registrar?
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

{{-- Add Modal --}}
<div class="modal fade" id="addRegistrarModal" tabindex="-1" aria-labelledby="addRegistrarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('registrar.manage.registrar.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addRegistrarModalLabel">Add Registrar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="middle_name" class="form-label">Middle Name (Optional)</label>
                        <input type="text" class="form-control" name="middle_name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" name="contact_number">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
