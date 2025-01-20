<div class="ml-[14rem] flex-1 bg-light-gray">
    <!-- Header Part -->
    <header class="bg-light-gray shadow-big p-4 flex items-center justify-between">
    <!-- Greeting -->
    <h1 class="text-lg font-semibold text-primary ">Good day,  <span id="username">Student</span>!</h1>

    <!-- Dropdown Menu -->
    <div class="relative inline-block">
        <!-- Dropdown Trigger -->
        <button
    id="dropdownButton"
    class="flex items-center bg-light-gray text-black border-2 border-black px-2 py-1 rounded-xl text-sm hover:bg-gray-300">
    <span class="mr-1 text-black font-medium text-sm">Linus Aurin</span>
    <i class="material-icons text-black text-base">arrow_drop_down</i>
</button>


        <!-- Dropdown Content -->
        <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48" style="z-index: 50; background: white; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border-radius: 0.5rem;">
    <a href="" class="block px-4 py-2 hover:bg-gray-200">
        Edit User
    </a>
</div>

    </div>
</header>

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
