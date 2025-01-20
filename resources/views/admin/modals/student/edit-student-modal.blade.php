{{-- Edit Modal --}}
@foreach($students as $student)
<div id="editStudentModal-{{ $student->id }}" class="modal-overlay hidden scrollbar-thin scrollbar-thumb-green-500 scrollbar-track-gray-100">
    <div class="modal-container">
        <!-- Modal Header -->
        <div class="modal-header border-b border-border-color mb-6 flex justify-between items-center">
            <h2 class="modal-title text-primary font-semibold text-lg">Edit Student</h2>
            <button type="button" class="modal-close text-gray-600 hover:text-gray-900" onclick="toggleModal('editStudentModal-{{ $student->id }}')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="max-h-96 overflow-y-auto">
            <form action="{{ route('admin.manage.student.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-6 pr-5 pl-3">
                    <!-- STUDENT INFORMATION -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="student_number" class="form-label text-sm text-dark">Student Number</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="student_number" value="{{ $student->student_number }}" required>
                        </div>
                        <div>
                            <label for="last_name" class="form-label text-sm text-dark">Last Name</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="last_name" value="{{ $student->last_name }}" required>
                        </div>
                        <div>
                            <label for="first_name" class="form-label text-sm text-dark">First Name</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="first_name" value="{{ $student->first_name }}" required>
                        </div>
                        <div>
                            <label for="middle_name" class="form-label text-sm text-dark">Middle Name</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="middle_name" value="{{ $student->middle_name }}">
                        </div>
                        <div>
                            <label for="extension_name" class="form-label text-sm text-dark">Extension Name (Optional)</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="extension_name" value="{{ $student->extension_name }}">
                        </div>
                        <div>
                            <label for="contact_number" class="form-label text-sm text-dark">Contact Number</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="contact_number" value="{{ $student->contact_number }}">
                        </div>
                        <div>
                            <label for="email" class="form-label text-sm text-dark">Email</label>
                            <input type="email" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="email" value="{{ $student->email }}" required>
                        </div>
                        <div>
                            <label for="password" class="form-label text-sm text-dark">Password</label>
                            <input type="password" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="password" placeholder="Leave blank to keep current password">
                        </div>
                        <div>
                            <label for="birthday" class="form-label text-sm text-dark">Birthday</label>
                            <input type="date" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="birthday" value="{{ $student->birthday }}">
                        </div>
                        <div>
                            <label for="sex" class="form-label text-sm text-dark">Sex</label>
                            <select class="form-select w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="sex">
                                <option value="male" {{ $student->sex == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $student->sex == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ $student->sex == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="classification" class="form-label text-sm text-dark">Classification</label>
                            <select class="form-select w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="classification">
                                <option value="regular" {{ $student->classification == 'regular' ? 'selected' : '' }}>Regular</option>
                                <option value="irregular" {{ $student->classification == 'irregular' ? 'selected' : '' }}>Irregular</option>
                                <option value="transferee" {{ $student->classification == 'transferee' ? 'selected' : '' }}>Transferee</option>
                                <option value="returnee" {{ $student->classification == 'returnee' ? 'selected' : '' }}>Returnee</option>
                            </select>
                        </div>
                        <div>
                            <label for="program_id" class="form-label text-sm text-dark">Program</label>
                            <select class="form-select w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="program_id">
                                <option value="Bachelor of Science in Computer Science" {{ $student->program_id == 'Bachelor of Science in Computer Science' ? 'selected' : '' }}>
                                    Bachelor of Science in Computer Science
                                </option>
                                <option value="Bachelor of Information Technology" {{ $student->program_id == 'Bachelor of Information Technology' ? 'selected' : '' }}>
                                    Bachelor of Information Technology
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- ADDRESS -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="house_number" class="form-label text-sm text-dark">House Number</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="house_number" value="{{ $student->house_number }}">
                        </div>
                        <div>
                            <label for="street" class="form-label text-sm text-dark">Street</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="street" value="{{ $student->street }}">
                        </div>
                        <div>
                            <label for="barangay" class="form-label text-sm text-dark">Barangay</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="barangay" value="{{ $student->barangay }}">
                        </div>
                        <div>
                            <label for="city" class="form-label text-sm text-dark">City</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="city" value="{{ $student->city }}">
                        </div>
                        <div>
                            <label for="province" class="form-label text-sm text-dark">Province</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="province" value="{{ $student->province }}">
                        </div>
                        <div>
                            <label for="zip_code" class="form-label text-sm text-dark">Zip Code</label>
                            <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="zip_code" value="{{ $student->zip_code }}">
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
