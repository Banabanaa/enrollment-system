<div class="flex">
    <!-- Navbar -->
    <div class="w-[14rem] h-screen bg-primary text-white fixed flex flex-col items-center justify-between py-6">
        <!-- Upper Part of Navbar -->
        <div class="flex flex-col items-center w-full">
            <!-- Logo -->
            <div class="mb-12 text-center">
                <img src="{{ asset('assets/cvsu.svg') }}" alt="Bacoor Logo" class="h-logo w-logo mx-auto">
                <p class="text-md mt-2 font-semibold font-poppins">Cavite State University<br>Bacoor Campus</p>
            </div>

            <!-- Navbar Links -->
            <ul class="w-full">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}">
                    <li class="flex items-center w-full px-4 py-3 hover:bg-green-500 transition duration-200 ease-in-out">
                        <img src="{{ asset('assets/dashboard.svg') }}" alt="Dashboard Icon" class="h-icon w-icon mr-4">
                        <span class="text-sm font-semibold font-poppins">Dashboard</span>
                    </li>
                </a>

                <li class="flex flex-col items-start w-full px-4 py-3">
                    <div class="flex items-center w-full hover:bg-green-500 transition duration-200 ease-in-out" onclick="toggleAccounts()">
                        <img src="{{ asset('assets/user.svg') }}" alt="Accounts Icon" class="h-icon w-icon mr-4"> <!-- Add icon here -->
                        <span class="text-sm font-semibold font-poppins">Accounts</span>
                    </div>
                    <!-- Nested Links -->
                    <ul id="accounts-links" class="ml-4 space-y-2 mt-2 hidden">
                        <a href="{{ route('admin.manage.admin') }}">
                            <li class="flex items-center w-full px-4 py-3 hover:bg-green-500 transition duration-200 ease-in-out">
                                <span class="text-sm font-semibold font-poppins">Admin Accounts</span>
                            </li>
                        </a>
                        <a href="{{ route('admin.manage.student') }}">
                            <li class="flex items-center w-full px-4 py-3 hover:bg-green-500 transition duration-200 ease-in-out">
                                <span class="text-sm font-semibold font-poppins">Student Accounts</span>
                            </li>
                        </a>
                        <a href="{{ route('admin.manage.registrar') }}">
                            <li class="flex items-center w-full px-4 py-3 hover:bg-green-500 transition duration-200 ease-in-out">
                                <span class="text-sm font-semibold font-poppins">Registrar Accounts</span>
                            </li>
                        </a>
                        <a href="{{ route('admin.manage.department') }}">
                            <li class="flex items-center w-full px-4 py-3 hover:bg-green-500 transition duration-200 ease-in-out">
                                <span class="text-sm font-semibold font-poppins">Department Accounts</span>
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
    </div>

    <!-- Logout Modal -->
    <div id="logoutModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 text-center">
            <p class="text-gray-800 font-semibold mb-4">Are you sure you want to logout?</p>
            <div class="flex justify-center space-x-4">
                <!-- Form for logout -->
                <form id="logoutForm" method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-red-600">Yes</button>
                <button onclick="closeModal()" class="bg-red text-white px-4 py-2 rounded-lg hover:bg-gray-400">No</button>

                </form>

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

        function toggleAccounts() {
            const accountsLinks = document.getElementById('accounts-links');
            accountsLinks.classList.toggle('hidden');
        }
    </script>
</div>
