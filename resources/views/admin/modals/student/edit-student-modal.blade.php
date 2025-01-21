@foreach($students as $student)
<div class="modal-overlay hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 overflow-auto"
    id="editStudentModal-{{ $student->id }}" tabindex="-1" aria-labelledby="editstudentModalLabel-{{ $student->id }}"
    aria-hidden="true">
    <div class="modal-container bg-white p-10 rounded-lg max-w-lg w-full max-h-[80vh] overflow-y-auto">
        <form action="{{ route('admin.manage.student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Modal Header -->
            <div class="modal-header flex justify-between items-center mb-6">
                <h2 class="modal-title text-xl font-semibold text-green-700">Edit Information</h2>
                <button type="button" class="modal-close text-gray-600 hover:text-gray-900" onclick="toggleModal('editStudentModal-{{ $student->id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body grid grid-cols-2 gap-6">
                <!-- student Name -->
                <div class="col-span-2 sm:col-span-1">
                    <label for="student_number" class="form-label text-sm text-dark">Student Number</label>
                    <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="student_number" value="{{ $student->student_number }}" required>
                </div>

                <!-- Last Name -->
                <div class="col-span-2 sm:col-span-1">
                    <label for="last_name" class="form-label text-sm text-dark">Last Name</label>
                    <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="last_name" value="{{ $student->last_name }}" required>
                </div>

                <!-- First Name -->
                <div class="col-span-2 sm:col-span-1">
                    <label for="first_name" class="form-label text-sm text-dark">First Name</label>
                    <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="first_name" value="{{ $student->first_name }}" required>
                </div>

                <!-- Middle Name (Optional) -->
                <div class="col-span-2 sm:col-span-1">
                    <label for="middle_name" class="form-label text-sm text-dark">Middle Name (Optional)</label>
                    <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="middle_name" value="{{ $student->middle_name }}">
                </div>

                <!-- Email -->
                <div class="col-span-2 sm:col-span-1">
                    <label for="email" class="form-label text-sm text-dark">Email</label>
                    <input type="email" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="email" value="{{ $student->email }}" required>
                </div>

                <!-- Contact Number -->
                <div class="col-span-2 sm:col-span-1">
                    <label for="contact_number" class="form-label text-sm text-dark">Contact Number</label>
                    <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="contact_number" value="{{ $student->contact_number }}">
                </div>

                <!-- Password -->
                <div class="col-span-2">
                    <label for="password" class="form-label text-sm text-dark">Password</label>
                    <input type="password" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="password" placeholder="Leave blank to keep current password">
                </div>
                 <!-- Classification Dropdown -->
                 <div class="col-span-2 sm:col-span-1">
                    <label for="classification" class="form-label text-sm text-dark">Classification</label>
                    <select name="classification" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" required>
                        <option value="regular" {{ $student->classification == 'regular' ? 'selected' : '' }}>Regular</option>
                        <option value="irregular" {{ $student->classification == 'irregular' ? 'selected' : '' }}>Irregular</option>
                        <option value="transferee" {{ $student->classification == 'transferee' ? 'selected' : '' }}>Transferee</option>
                        <option value="returnee" {{ $student->classification == 'returnee' ? 'selected' : '' }}>Returnee</option>
                    </select>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer flex justify-between items-center space-x-4 mt-6">
                <button type="button" class="btn btn-secondary px-6 py-2 text-sm font-semibold text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg" onclick="toggleModal('editStudentModal-{{ $student->id }}')">Close</button>
                <button type="submit" class="btn btn-primary px-6 py-2 text-sm font-semibold text-white bg-green-700 hover:bg-green-600 rounded-lg">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endforeach
