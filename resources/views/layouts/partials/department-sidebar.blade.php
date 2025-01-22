<div class="flex flex-col items-center w-full">
    <!-- Logo -->
    <div class="mb-12 text-center">
        <img src="{{ asset('assets/cvsu.svg') }}" alt="Bacoor Logo" class="h-logo w-logo mx-auto">
        <p class="text-md mt-2 font-semibold font-poppins">Cavite State University<br>Bacoor Campus</p>
    </div>
    <!-- Navbar Links -->
    <ul class="w-full">
        <!-- Dashboard -->
        <a href="{{ route('department.dashboard') }}">
            <li class="flex items-center w-full px-4 py-3 hover:bg-green-500 transition duration-200 ease-in-out">
                <img src="{{ asset('assets/dashboard.svg') }}" alt="Dashboard Icon" class="h-icon w-icon mr-4">
                <span class="text-sm font-semibold font-poppins">Dashboard</span>
            </li>
        </a>
            
        <!-- Dashboard -->
        <a href="{{ route('department.manage.student') }}">
                    <li class="flex items-center w-full px-4 py-3 hover:bg-green-500 transition duration-200 ease-in-out">
                        <img src="{{ asset('assets/users.svg') }}" alt="Dashboard Icon" class="h-icon w-icon mr-4">
                        <span class="text-sm font-semibold font-poppins">Students</span>
                    </li>
                </a>
       

        <!-- Students Section -->
        <li class="flex flex-col items-start w-full px-4 py-3">
            <div class="flex items-center w-full hover:bg-green-500 transition duration-200 ease-in-out" onclick="toggleLinks('students-links')">
                <img src="{{ asset('assets/user.svg') }}" alt="Accounts Icon" class="h-icon w-icon mr-4">
                <span class="text-sm font-semibold font-poppins">Advising</span>
            </div>
            <!-- Nested Links -->
            <ul id="students-links" class="ml-4 space-y-2 mt-2 hidden">
                <a href="{{ route('department.enrollment.pending') }}">
                    <li class="flex items-center w-full px-4 py-3 hover:bg-green-500 transition duration-200 ease-in-out">
                        <span class="text-sm font-semibold font-poppins">Pending Students</span>
                    </li>
                </a>
                <a href="{{ route('department.enrollment.undereval') }}">
                    <li class="flex items-center w-full px-4 py-3 hover:bg-green-500 transition duration-200 ease-in-out">
                        <span class="text-sm font-semibold font-poppins">Under Evaluation</span>
                    </li>
                </a>
            </ul>
        </li>

        <!-- Logout -->
        <li class="flex items-center w-full px-4 py-3 hover:bg-green-500 transition duration-200 ease-in-out" onclick="openLogoutModal(event)">
            <img src="{{ asset('assets/signout.svg') }}" alt="Signout Icon" class="h-icon w-icon mr-4">
            <span class="text-sm font-semibold font-poppins">Logout</span>
        </li>
    </ul>
</div>

<!-- Logout Modal -->
<div id="logoutModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 text-center">
        <p class="text-gray-800 font-semibold mb-4">Are you sure you want to logout?</p>
        <div class="flex justify-center space-x-4">
            <!-- Form for logout -->
            <form id="logoutForm" method="POST" action="{{ route('department.logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Yes</button>
            </form>
            <button onclick="closeModal()" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-gray-600">No</button>
        </div>
    </div>
</div>

<script>
    // Open logout modal
    function openLogoutModal(event) {
        event.preventDefault(); // Prevent immediate navigation
        document.getElementById('logoutModal').classList.remove('hidden');
    }

    // Close modal
    function closeModal() {
        document.getElementById('logoutModal').classList.add('hidden');
    }

    // Confirm logout action
    function confirmLogout() {
        // Trigger the logout form submission
        document.getElementById('logoutForm').submit();
    }

    // Toggle function for nested links
    function toggleLinks(section) {
        // Toggle the display of the specific section
        const links = document.getElementById(section);
        links.classList.toggle('hidden');
    }
</script>
</div>