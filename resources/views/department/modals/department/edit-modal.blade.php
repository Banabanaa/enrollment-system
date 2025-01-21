@foreach($departments as $department)
{{-- Edit Modal --}}
<div id="editDepartmentModal-{{ $department->id }}" class="modal-overlay hidden scrollbar-thin scrollbar-thumb-green-500 scrollbar-track-gray-100">
    <div class="modal-container">
        <!-- Modal Header -->
        <div class="modal-header border-b border-border-color mb-6 flex justify-between items-center">
            <h2 class="modal-title text-primary font-semibold text-lg">Edit Department</h2>
            <button type="button" class="modal-close text-gray-600 hover:text-gray-900" onclick="toggleModal('editDepartmentModal-{{ $department->id }}')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="max-h-96 overflow-y-auto">
            <form action="{{ route('department.manage.department.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-6 pr-5 pl-3">
                    <!-- DEPARTMENT INFORMATION -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="last_name" class="form-label text-sm text-dark">Last Name</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="last_name" value="{{ $department->last_name }}" required>
                        </div>
                        <div>
                            <label for="first_name" class="form-label text-sm text-dark">First Name</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="first_name" value="{{ $department->first_name }}" required>
                        </div>
                        <div>
                            <label for="middle_name" class="form-label text-sm text-dark">Middle Name</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="middle_name" value="{{ $department->middle_name }}">
                        </div>
                        <div>
                            <label for="middle_name" class="form-label text-sm text-dark">Department Name</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="department_name" value="{{ $department->department_name }}">
                        </div>
                        <div>
                            <label for="contact_number" class="form-label text-sm text-dark">Contact Number</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="contact_number" value="{{ $department->contact_number }}">
                        </div>
                        <div>
                            <label for="email" class="form-label text-sm text-dark">Email</label>
                            <input type="email" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="email" value="{{ $department->email }}" required>
                        </div>
                        <div>
                            <label for="password" class="form-label text-sm text-dark">Password</label>
                            <input type="password" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="password" placeholder="Leave blank to keep current password">
                        </div>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer mt-8 flex justify-end space-x-4 pr-5">
                    <button type="button" class="bg-red text-white px-10 h-8 rounded-lg hover:bg-lime-green" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="text-white px-10 h-8 rounded-lg bg-primary hover:bg-lime-green">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach