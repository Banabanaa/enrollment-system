@extends('layouts.admin')

@section('content')
<!-- Filter Buttons and Search Bar -->
<div class="flex justify-end items-center mb-4 pt-4">
    <!-- Search Bar Section -->
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
            <img src="{{ asset('assets/search-icon.svg') }}" alt="Search Icon"
                class="h-6 w-6 group-hover:scale-110 transition-transform duration-200 ease-in-out">
            <span
                class="ml-2 text-xs text-gray-600 font-semibold font-poppins group-hover:scale-125 transition-all duration-200 ease-in-out"></span>
        </div>
        <input type="text"
            class="text-sm border-hidden px-4 py-2 rounded-lg focus:outline-none focus:ring-0 focus:ring-light focus:border-transparent pl-12 shadow-lg"
            placeholder="Search users..." />
    </div>

</div>


<!-- Table Section -->
<div class="p-5 bg-light rounded-2xl shadow-big w-full mx-auto mb-8">

    <!-- Title and View All Button -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="font-table-header text-xl text-primary">Department Accounts</h2>
        <div class="flex space-x-2">
            <button
                class="text-sm text-light bg-primary  font-semibold px-4 py-2 rounded-lg hover:bg-primary hover:text-white">Export
                as Excel</button>
                <button onclick="openModal()" class="bg-primary text-white px-4 py-2 rounded-lg">
                <img src="{{ asset('assets/plus.svg') }}" alt="Plus Icon" class="h-5 w-5 inline-block mr-2">
                Add New Account</button>

        </div>
    </div>
    <!-- Table -->
    <div class="overflow-x-auto w-full">
        <table class="min-w-full bg-white shadow-sm rounded-lg">
            <thead>
                <tr class="bg-light-gray">
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600">Admin Id</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600">User Type</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-100 border-b border-border-color ">
                    <td class="px-6 py-4 text-sm text-gray-600">202401</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Joana Garcia</td>
                    <td class="px-6 py-4 text-sm text-gray-600">joana272@example.com</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Admin</td>
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- View Icon -->
                            <a href="#" class="text-lime-green  hover:text-blue-500">
                                <span class="material-icons text-lg">visibility</span>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#" class="text-lime-green hover:text-green-500">
                                <span class="material-icons text-lg">edit</span>
                            </a>
                            <!-- Delete Icon -->
                            <a href="#" class="text-lime-green hover:text-red-500">
                                <span class="material-icons text-lg">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-border-color ">
                    <td class="px-6 py-4 text-sm text-gray-600">202401</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Joana Garcia</td>
                    <td class="px-6 py-4 text-sm text-gray-600">joana272@example.com</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Admin</td>
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- View Icon -->
                            <a href="#" class="text-lime-green  hover:text-blue-500">
                                <span class="material-icons text-lg">visibility</span>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#" class="text-lime-green hover:text-green-500">
                                <span class="material-icons text-lg">edit</span>
                            </a>
                            <!-- Delete Icon -->
                            <a href="#" class="text-lime-green hover:text-red-500">
                                <span class="material-icons text-lg">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-border-color ">
                    <td class="px-6 py-4 text-sm text-gray-600">202401</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Joana Garcia</td>
                    <td class="px-6 py-4 text-sm text-gray-600">joana272@example.com</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Admin</td>
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- View Icon -->
                            <a href="#" class="text-lime-green  hover:text-blue-500">
                                <span class="material-icons text-lg">visibility</span>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#" class="text-lime-green hover:text-green-500">
                                <span class="material-icons text-lg">edit</span>
                            </a>
                            <!-- Delete Icon -->
                            <a href="#" class="text-lime-green hover:text-red-500">
                                <span class="material-icons text-lg">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-border-color ">
                    <td class="px-6 py-4 text-sm text-gray-600">202401</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Joana Garcia</td>
                    <td class="px-6 py-4 text-sm text-gray-600">joana272@example.com</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Admin</td>
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- View Icon -->
                            <a href="#" class="text-lime-green  hover:text-blue-500">
                                <span class="material-icons text-lg">visibility</span>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#" class="text-lime-green hover:text-green-500">
                                <span class="material-icons text-lg">edit</span>
                            </a>
                            <!-- Delete Icon -->
                            <a href="#" class="text-lime-green hover:text-red-500">
                                <span class="material-icons text-lg">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-border-color ">
                    <td class="px-6 py-4 text-sm text-gray-600">202401</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Joana Garcia</td>
                    <td class="px-6 py-4 text-sm text-gray-600">joana272@example.com</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Admin</td>
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- View Icon -->
                            <a href="#" class="text-lime-green  hover:text-blue-500">
                                <span class="material-icons text-lg">visibility</span>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#" class="text-lime-green hover:text-green-500">
                                <span class="material-icons text-lg">edit</span>
                            </a>
                            <!-- Delete Icon -->
                            <a href="#" class="text-lime-green hover:text-red-500">
                                <span class="material-icons text-lg">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-border-color ">
                    <td class="px-6 py-4 text-sm text-gray-600">202401</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Joana Garcia</td>
                    <td class="px-6 py-4 text-sm text-gray-600">joana272@example.com</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Admin</td>
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- View Icon -->
                            <a href="#" class="text-lime-green  hover:text-blue-500">
                                <span class="material-icons text-lg">visibility</span>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#" class="text-lime-green hover:text-green-500">
                                <span class="material-icons text-lg">edit</span>
                            </a>
                            <!-- Delete Icon -->
                            <a href="#" class="text-lime-green hover:text-red-500">
                                <span class="material-icons text-lg">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-border-color ">
                    <td class="px-6 py-4 text-sm text-gray-600">202401</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Joana Garcia</td>
                    <td class="px-6 py-4 text-sm text-gray-600">joana272@example.com</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Admin</td>
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- View Icon -->
                            <a href="#" class="text-lime-green  hover:text-blue-500">
                                <span class="material-icons text-lg">visibility</span>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#" class="text-lime-green hover:text-green-500">
                                <span class="material-icons text-lg">edit</span>
                            </a>
                            <!-- Delete Icon -->
                            <a href="#" class="text-lime-green hover:text-red-500">
                                <span class="material-icons text-lg">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-border-color ">
                    <td class="px-6 py-4 text-sm text-gray-600">202401</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Joana Garcia</td>
                    <td class="px-6 py-4 text-sm text-gray-600">joana272@example.com</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Admin</td>
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- View Icon -->
                            <a href="#" class="text-lime-green  hover:text-blue-500">
                                <span class="material-icons text-lg">visibility</span>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#" class="text-lime-green hover:text-green-500">
                                <span class="material-icons text-lg">edit</span>
                            </a>
                            <!-- Delete Icon -->
                            <a href="#" class="text-lime-green hover:text-red-500">
                                <span class="material-icons text-lg">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-border-color ">
                    <td class="px-6 py-4 text-sm text-gray-600">202401</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Joana Garcia</td>
                    <td class="px-6 py-4 text-sm text-gray-600">joana272@example.com</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Admin</td>
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- View Icon -->
                            <a href="#" class="text-lime-green  hover:text-blue-500">
                                <span class="material-icons text-lg">visibility</span>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#" class="text-lime-green hover:text-green-500">
                                <span class="material-icons text-lg">edit</span>
                            </a>
                            <!-- Delete Icon -->
                            <a href="#" class="text-lime-green hover:text-red-500">
                                <span class="material-icons text-lg">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-border-color ">
                    <td class="px-6 py-4 text-sm text-gray-600">202401</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Joana Garcia</td>
                    <td class="px-6 py-4 text-sm text-gray-600">joana272@example.com</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Admin</td>
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- View Icon -->
                            <a href="#" class="text-lime-green  hover:text-blue-500">
                                <span class="material-icons text-lg">visibility</span>
                            </a>
                            <!-- Edit Icon -->
                            <a href="#" class="text-lime-green hover:text-green-500">
                                <span class="material-icons text-lg">edit</span>
                            </a>
                            <!-- Delete Icon -->
                            <a href="#" class="text-lime-green hover:text-red-500">
                                <span class="material-icons text-lg">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination Section -->
        <div class="flex items-center justify-center space-x-6 mt-4">
            <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-primary hover:text-white">Previous</button>
            <span class="text-gray-600 hover:bg-primary hover:text-white hover:rounded-full p-2 cursor-pointer">1</span>
            <span class="text-gray-600 hover:bg-primary hover:text-white hover:rounded-full p-2 cursor-pointer">2</span>
            <span class="text-gray-600 hover:bg-primary hover:text-white hover:rounded-full p-2 cursor-pointer">3</span>
            <span class="text-gray-600 hover:bg-primary hover:text-white hover:rounded-full p-2 cursor-pointer">4</span>
            <span class="text-gray-600 hover:bg-primary hover:text-white hover:rounded-full p-2 cursor-pointer">5</span>
            <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-primary hover:text-light">Next</button>
        </div>
    </div>
            <!-- Modal Section -->
            <div id="addUserModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white p-10 rounded-lg shadow-lg w-1/2">
                      <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-semibold text-primary text-left">Add New User</h2>
                <button type="button" onclick="closeModal()" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>


                    <!-- Form -->
                    <form>
                        <!-- Grid Layout -->
                        <div class="grid grid-cols-2 gap-6">
                            <!-- User ID -->
                            <div>
                                <label for="userID" class="block text-sm font-medium text-dark mb-2">User ID</label>
                                <input id="userID" type="text" placeholder="Enter User ID"
                                    class="w-full px-3 py-2 bg-gray-200 rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-dark mb-2">Name</label>
                                <input id="name" type="text" placeholder="Enter Name"
                                    class="w-full px-3 py-2 bg-gray-200  rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <!-- Email -->
                            <div class="col-span-2">
                                <label for="email" class="block text-sm font-medium text-dark mb-2">Email</label>
                                <input id="email" type="email" placeholder="Enter Email"
                                    class="w-full px-3 py-2 bg-gray-200  rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                           <!-- Password -->
                            <div class="relative">
                                <label for="password" class="block text-sm font-medium text-dark mb-2">Password</label>
                                <input id="password" type="password" placeholder="Enter Password"
                                    class="w-full px-3 py-2 bg-gray-200 rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary pr-10">
                                <!-- Eye Icon -->
                                <button type="button" onclick="togglePassword()"
                                    class="absolute right-3 top-9 text-gray-600 hover:text-gray-800">
                                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path id="eyeOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3l18 18M10.185 10.185A3 3 0 016.1 6.1m11.8 11.8a3 3 0 01-4.085-4.085m-1.419 1.419a7 7 0 01-7-7m14 14a7 7 0 01-7-7" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Mobile Number -->
                            <div>
                                <label for="mobile" class="block text-sm font-medium text-dark mb-2">Mobile Number</label>
                                <input id="mobile" type="text" placeholder="Enter Mobile Number"
                                    class="w-full px-3 py-2 bg-gray-200  rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <!-- User Type -->
                            <div class="col-span-2">
                                <label for="userType" class="block text-sm font-medium text-dark mb-2">User Type</label>
                                <select id="userType"
                                    class="w-full px-3 py-2 bg-gray-200 rounded-lg text-sm border-0 focus:outline-none focus:ring-2 focus:ring-primary">
                                    <option value="">Select User Type</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Registrar">Registrar</option>
                                    <option value="Department">Department</option>
                                </select>
                            </div>
                        </div>

                        <div id="successModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 text-center">
                    <p class="text-gray-800 font-semibold mb-4">Account Successfully Created</p>
                    <button onclick="closeModal()" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-600">OK</button>
                </div>
            </div>


                        <div class="flex justify-end space-x-4 mt-8">
                        <button type="button" onclick="clearAllInputs()"
                    class="bg-red text-white px-10 h-8 rounded-lg hover:bg-red-600">Clear All</button>
                    <button type="submit" onclick="showModal()" class="bg-primary text-white px-10 h-8 rounded-lg hover:bg-blue-600">Create</button>
                    </div>
                </form>
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

             // Function to show the modal
    function showModal() {
        const modal = document.getElementById("successModal");
        modal.classList.remove("hidden");
    }

    // Function to hide the modal
    function closeModal() {
        const modal = document.getElementById("successModal");
        modal.classList.add("hidden");
    }

            function openModal() {
                document.getElementById('addUserModal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('addUserModal').classList.add('hidden');
            }

            function togglePassword() {
        const passwordInput = document.getElementById("password");
        const eyeOpen = document.getElementById("eyeOpen");
        const eyeClosed = document.getElementById("eyeClosed");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeOpen.classList.add("hidden");
            eyeClosed.classList.remove("hidden");
        } else {
            passwordInput.type = "password";
            eyeOpen.classList.remove("hidden");
            eyeClosed.classList.add("hidden");
        }
    }
        </script>

@endsection
