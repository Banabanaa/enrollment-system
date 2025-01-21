<!-- Modal for Adding a Student -->
<div id="addStudentModal" class="modal-overlay hidden scrollbar-thin scrollbar-thumb-green-500 scrollbar-track-gray-100">
    <div class="modal-container">
        <!-- Modal Header -->
        <div class="modal-header border-b border-border-color mb-6 flex justify-between items-center">
            <h2 class="modal-title text-primary font-semibold text-lg">Add Student</h2>
            <button type="button" class="modal-close text-gray-600 hover:text-gray-900" onclick="toggleModal('addStudentModal')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="max-h-96 overflow-y-auto ">
            <form action="{{ route('department.manage.student.store') }}" method="POST">
                @csrf
                <div class="space-y-6 pr-5 pl-3" >
                   <!-- STUDENT INFORMATION -->
<div class="grid grid-cols-2 gap-6">
    <div>
        <label for="student_number" class="form-label text-sm text-dark">Student Number</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="student_number" placeholder="Enter Student Number" required>
    </div>
    <div>
        <label for="last_name" class="form-label text-sm text-dark">Last Name</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="last_name" placeholder="Enter Last Name" required>
    </div>
    <div>
        <label for="first_name" class="form-label text-sm text-dark">First Name</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="first_name" placeholder="Enter First Name" required>
    </div>
    <div>
        <label for="middle_name" class="form-label text-sm text-dark">Middle Name</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="middle_name" placeholder="Enter Middle Name">
    </div>
    <div>
        <label for="extension_name" class="form-label text-sm text-dark">Extension Name (Optional)</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="extension_name" placeholder="Enter Extension Name">
    </div>
    <div>
        <label for="contact_number" class="form-label text-sm text-dark">Contact Number</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="contact_number" placeholder="Enter Contact Number">
    </div>
    <div>
        <label for="email" class="form-label text-sm text-dark">Email</label>
        <input type="email" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="email" placeholder="Enter Email Address" required>
    </div>
    <div>
        <label for="password" class="form-label text-sm text-dark">Password</label>
        <input type="password" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="password" placeholder="Enter Password" required>
    </div>
    <div>
        <label for="birthday" class="form-label text-sm text-dark">Birthday</label>
        <input type="date" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="birthday">
    </div>
    <div>
        <label for="sex" class="form-label text-sm text-dark">Sex</label>
        <select class="form-select w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="sex">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    <div>
        <label for="year" class="form-label text-sm text-dark">Year</label>
        <select class="form-select w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="year">
            <option value="1st">1</option>
            <option value="2nd">2</option>
            <option value="3rd">3</option>
            <option value="4th">4</option>
        </select>
    </div>
    <div>
        <label for="section" class="form-label text-sm text-dark">Section</label>
        <select class="form-select w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="section">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </div>
    <div>
        <label for="classification" class="form-label text-sm text-dark">Classification</label>
        <select class="form-select w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="classification">
            <option value="regular">Regular</option>
            <option value="irregular">Irregular</option>
            <option value="transferee">Transferee</option>
            <option value="returnee">Returnee</option>
        </select>
    </div>
    <div>
        <label for="program_id" class="form-label text-sm text-dark">Program</label>
        <select class="form-select w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="program_id">
            <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
            <option value="Bachelor of Information Technology">Bachelor of Information Technology</option>
        </select>
    </div>
</div>

<!-- ADDRESS -->
<div class="grid grid-cols-2 gap-6">
    <div>
        <label for="house_number" class="form-label text-sm text-dark">House Number</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="house_number" placeholder="Enter House Number">
    </div>
    <div>
        <label for="street" class="form-label text-sm text-dark">Street</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="street" placeholder="Enter Street">
    </div>
    <div>
        <label for="barangay" class="form-label text-sm text-dark">Barangay</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="barangay" placeholder="Enter Barangay">
    </div>
    <div>
        <label for="city" class="form-label text-sm text-dark">City</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="city" placeholder="Enter City">
    </div>
    <div>
        <label for="province" class="form-label text-sm text-dark">Province</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="province" placeholder="Enter Province">
    </div>
    <div>
        <label for="zip_code" class="form-label text-sm text-dark">Zip Code</label>
        <input type="text" class="form-control w-full px-3 py-2 bg-input rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary" name="zip_code" placeholder="Enter Zip Code">
    </div>
</div>
</div>

                <!-- Modal Footer -->
                <div class="modal-footer mt-8 flex justify-end space-x-4 pr-5">
                    <button type="button" onclick="clearAllInputs()" class="bg-red text-white px-10 h-8 rounded-lg hover:bg-lime-green" data-bs-dismiss="modal">Clear All</button>
                    <button type="submit" class="text-white px-10 h-8 rounded-lg bg-primary hover:bg-lime-green" data-bs-dismiss="modal">Add Student</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function clearAllInputs() {
        // Select the form element
        const form = document.querySelector("form");

        // Clear all input, select, and textarea elements within the form
        form.querySelectorAll("input, select, textarea").forEach((element) => {
            if (element.type === "checkbox" || element.type === "radio") {
                // Uncheck checkboxes and radio buttons
                element.checked = false;
            } else if (element.type === "file") {
                // Clear file inputs
                element.value = "";
            } else {
                // Clear text, number, email, etc.
                element.value = "";
            }
        });
    }
</script>
