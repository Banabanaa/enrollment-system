<div class="ml-[14rem] flex-1 bg-light-gray">
    <!-- Header Part -->
    <header class="bg-light-gray shadow-big p-4 flex items-center justify-between">
        <!-- Greeting -->
        <h1 class="text-lg font-semibold text-primary ">
            Good day, <span id="username">{{ auth()->user()->name }}</span>!
        </h1>

        <!-- Dropdown Menu -->
        <div class="relative inline-block">
            <!-- Dropdown Trigger -->
            <button
                id="dropdownButton"
                class="flex items-center bg-light-gray text-black border-2 border-black px-2 py-1 rounded-xl text-sm hover:bg-gray-300">
                <span class="mr-1 text-black font-medium text-sm">
                    {{ auth()->user()->name }}
                </span>
            </button>

            <!-- Dropdown Content -->
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48" style="z-index: 50; background: white; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border-radius: 0.5rem;">
                <a href="#" class="block px-4 py-2 hover:bg-gray-200">
                    Edit Profile
                </a>
                
                <!-- Logout Form -->
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                   <!-- Logout -->
                <li class="flex items-center w-full px-4 py-3 hover:bg-green-500 transition duration-200 ease-in-out" onclick="openLogoutModal(event)">
                    <img src="{{ asset('assets/signout.svg') }}" alt="Signout Icon" class="h-icon w-icon mr-4">
                    <span class="text-sm font-semibold font-poppins">Logout</span>
                </li>
                </form>
            </div>
        </div>
    </header>
        <!-- Logout Modal -->
        <div id="logoutModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 text-center">
            <p class="text-gray-800 font-semibold mb-4">Are you sure you want to logout?</p>
            <div class="flex justify-center space-x-4">
                <!-- Form for logout -->
                <form id="logoutForm" method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Yes</button>
                </form>
                <button onclick="closeModal()" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-gray-600">No</button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="p-6 h-screen">
        @yield('content')
    </main>
</div>

<!-- Inline Script -->
<script>
    // Dropdown toggle functionality
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
</script>
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