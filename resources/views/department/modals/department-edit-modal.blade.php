@foreach($departments as $department)
<div class="modal-overlay hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 overflow-auto"
    id="editDepartmentModal-{{ $department->id }}" tabindex="-1" aria-labelledby="editDepartmentModalLabel-{{ $department->id }}"
    aria-hidden="true">
    <div class="modal-container bg-white p-10 rounded-lg max-w-lg w-full max-h-[80vh] overflow-y-auto">
        <form action="{{ route('department.manage.department.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Modal Header -->
            <div class="modal-header flex justify-between items-center mb-6">
                <h2 class="modal-title text-xl font-semibold text-green-700">Edit Information</h2>
                <button type="button" class="modal-close text-gray-600 hover:text-gray-900" onclick="toggleModal('editDepartmentModal-{{ $department->id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body space-y-6">
                <!-- Department Name -->
                <div class="mb-4">
                    <label for="department_name" class="form-label block text-sm font-medium text-gray-700">Department Name</label>
                    <input type="text" class="form-input" name="department_name" value="{{ $department->department_name }}" required>
                </div>

                <!-- Last Name -->
                <div class="mb-4">
                    <label for="last_name" class="form-label block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" class="form-input" name="last_name" value="{{ $department->last_name }}" required>
                </div>

                <!-- First Name -->
                <div class="mb-4">
                    <label for="first_name" class="form-label block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" class="form-input" name="first_name" value="{{ $department->first_name }}" required>
                </div>

                <!-- Middle Name (Optional) -->
                <div class="mb-4">
                    <label for="middle_name" class="form-label block text-sm font-medium text-gray-700">Middle Name (Optional)</label>
                    <input type="text" class="form-input" name="middle_name" value="{{ $department->middle_name }}">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" class="form-input" name="email" value="{{ $department->email }}" required>
                </div>

                <!-- Contact Number -->
                <div class="mb-4">
                    <label for="contact_number" class="form-label block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="text" class="form-input" name="contact_number" value="{{ $department->contact_number }}">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="form-label block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" class="form-input" name="password" placeholder="Leave blank to keep current password">
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer flex justify-between items-center space-x-4">
                <button type="button" class="btn btn-secondary px-6 py-2 text-sm font-semibold text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg" onclick="toggleModal('editDepartmentModal-{{ $department->id }}')">Close</button>
                <button type="submit" class="btn btn-primary px-6 py-2 text-sm font-semibold text-white bg-green-700 hover:bg-green-600 rounded-lg">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endforeach
