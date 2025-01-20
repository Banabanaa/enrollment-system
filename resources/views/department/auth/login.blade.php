<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>CVSU - Department Login</title>
    <link rel="icon" href="{{ asset('assets/cvsu.svg') }}" type="image/svg+xml">
    @vite('resources/css/app.css')
</head>

<body class="bg-primary flex justify-center items-center h-screen">
    <div class="flex w-full max-w-3xl h-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Left Image Section -->
        <div class="hidden md:flex w-1/2 bg-gray-200 items-center justify-center">
            <img src="{{ asset('assets/A.png') }}" alt="Login Image" class="h-full object-cover">
        </div>

        <!-- Right Form Section -->
        <div class="flex-1 p-12 flex flex-col justify-center">
            <div class="mb-6">
                <div class="flex items-center justify-center">
                    <span class="text-primary font-bold">Cavite State University - Bacoor City Campus</span>
                </div>
                <h1 class="text-sm font-semibold mt-3">
                    <span class="font-bold">Welcome Department!</span><br>
                    <span class="text-xs text-gray-600 font-medium">Login to your account</span>
                </h1>
            </div>
            <form method="POST" action="{{ route('department.login') }}">
                @csrf

               <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email or Student ID')" />
                    <x-text-input id="email" class="block mt-1 w-full h-9" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4 relative">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full h-9 pr-10" type="password" name="password" required autocomplete="current-password" value="{{ old('password') }}" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <!-- Eye Icon to toggle visibility -->
                    <span id="toggle-password" class="absolute right-3 top-10 transform -translate-y-1/2 cursor-pointer text-gray-500">
                        <i class="fa fa-eye-slash text-sm"></i> <!-- Default state is slashed eye -->
                    </span>
                </div>


                <!-- Remember Me 
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> -->

                 <!-- I Agree to Privacy Policy -->
                 <div class="block mt-2">
                    <label for="agree-policy" class="inline-flex items-center">
                        <input id="agree-policy" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="agree_policy" required>
                        <span class="ms-2 text-xs text-gray-600">I agree to the <a href="#" id="privacy-policy-link" class="text-blue-500 hover:text-blue-700 text-xs">Privacy Policy</a></span>
                    </label>
                </div>


                <!-- Login Button -->
                <div class="mt-4">
                    <x-primary-button class="w-full flex justify-center items-center bg-primary">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

             <!-- Forgot Password and Terms & Conditions -->
            <div class="flex justify-between text-xs mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-xs text-blue-400 hover:text-blue-700" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <!-- Add the ID here -->
                <a href="#" id="terms-conditions-link" class="text-gray-500">{{ __('Terms & Conditions') }}</a>
            </div>
            </form>
        </div>
    </div>

    <!-- Privacy Policy Modal -->
<div id="privacy-policy-modal" class="fixed inset-0 z-10 hidden bg-black bg-opacity-50 flex flex-col justify-center items-center">
    <div class="bg-white mx-auto p-5 rounded-lg w-4/5 max-w-lg max-h-[80vh] overflow-y-auto">
        <span id="close-modal" class="text-gray-500 float-right text-xl font-bold cursor-pointer hover:text-black">&times;</span>
        <h2 class="text-lg font-bold">Privacy Policy</h2>
        <p class="mt-2 text-sm text-gray-700">Data Privacy Notice and Consent Form for Students</p>
        <!-- Add the entire privacy policy content here -->
        <div class="mt-4 max-h-[60vh]">
            <p class="text-sm text-gray-700 text-justify">Cavite State University (CvSU) is required by law to process your personal information and sensitive personal information in order to safeguard academic freedom, uphold your right to quality education, and protect your right to data privacy in conformity with Republic Act No. 10173, otherwise known as the Data Privacy Act of 2012, and its implementing rules and regulations.</p>
            <p class="mt-4 text-sm text-gray-700">The said law can be viewed via <a href="https://www.officialgazette.gov.ph/2012/08/15/republic-act-no-10173/" class="text-blue-500 hover:text-blue-700" target="_blank">https://www.officialgazette.gov.ph/2012/08/15/republic-act-no-10173/</a></p>
            <h3 class="mt-4 font-semibold text-sm">Personal Information Collected and Stored</h3>
            <p class="text-sm text-gray-700 text-justify">The University collects, uses, and keeps your personal information, which includes but are not limited to the following:</p>
            <ul class="list-disc pl-5 text-sm text-gray-700">
                <li>Name, age, date of birth</li>
                <li>Address and contact details</li>
                <li>Educational records</li>
                <li>Learner reference number (if any)</li>
                <li>Photograph or image</li>
                <li>Signature</li>
                <li>Family data (names of parents, their citizenship, civil status, etc.)</li>
                <li>Medical history and records</li>
                <li>Choice of campus and degree programs</li>
                <li>Socio-economic and geographic information about your household</li>
            </ul>

            <p class="mt-4 text-sm text-gray-700 text-justify">The following information is collected directly from you, your parents, legal guardians, and/or other authorized representatives during your application for admission and in the course of your residency in the University. We use this information to verify your identity, determine your eligibility to enroll in CvSU, to document consent for the processing of personal data in the course of determining your eligibility to enroll in CvSU as well as for other education-related purposes such as but not limited to:</p>
            <ul class="list-disc pl-5 text-sm text-gray-700">
                <li>Availment of scholarship grants and financial assistance whenever applicable</li>
                <li>Provision of psychological and emotional assessment as needed</li>
                <li>Availment of various student services within the university (i.e., guidance services, infirmary services, etc.)</li>
            </ul>

            <h3 class="mt-4 font-semibold text-sm">Sensitive Personal Information Collected and Stored</h3>
            <p class="text-sm text-gray-700 text-justify">The University also processes sensitive personal information under the DPA. These include, but are not limited to: race, ethnicity, civil status, health information, government-issued ID, and relevant financial information.</p>

            <h3 class="mt-4 font-semibold text-sm">Access to the Data</h3>
            <p class="text-sm text-gray-700 text-justify">Access to the data is restricted and given only to predetermined authorized personnel in relation to their specific function which requires them to access or process student or employee information.</p>

            <h3 class="mt-4 font-semibold text-sm">Disclosure</h3>
            <p class="text-sm text-gray-700 text-justify">To comply with its legal and regulatory duties, the University submits required information to relevant government agencies such as the Commission on Higher Education (CHED). As a rule, CvSU will only disclose your personal data to third parties with your consent. The University will disclose or share such information only when required or allowed by applicable laws.</p>

            <h3 class="mt-4 font-semibold text-sm">Security</h3>
            <p class="text-sm text-gray-700 text-justify">Your personal data is stored in physical repositories and secured databases managed by the University’s Registrar, ICT Office, and/or their counterparts in the CvSU Campuses. The University has appropriate physical, technical and organizational security measures which ensure the confidentiality of your information. These measures will be reviewed over time and upgraded in line with technological developments and regulatory requirements.</p>

            <p class="mt-4 text-sm text-gray-700 text-justify">The University’s General Data Privacy Notice can be viewed in the official Cavite State University website which may be updated from time to time, the updates effective from the date of posting. If you have questions about the DPA, you may email the University’s Data Protection Officer at <a href="mailto:dpo@cvsu.edu.ph" class="text-blue-500 hover:text-blue-700">dpo@cvsu.edu.ph</a>. You may personally check and update your data by contacting the University Registrar.</p>

            <p class="mt-4 text-sm text-gray-700 text-justify">I have read the CvSU Privacy Notice and Consent Form, understood its contents and consent to the processing of my personal data. I understand that for the CvSU to carry out its functions as a state university pursuant to its charter, exercise its right to academic freedom under the 1987 Constitution, pursue its legitimate interests as allowed by the Data Privacy Act of 2012, and comply with legal obligations, lawful issuances or orders of other public authorities, as well as contractual obligations to me, CvSU must necessarily process my personal and sensitive personal information. I grant my consent to and recognize the authority of the CvSU to process my personal and sensitive personal information pursuant to the abovementioned privacy notice and applicable laws.</p>
        </div>
    </div>
</div>

            <!-- Terms and Conditions Modal -->
<div id="terms-conditions-modal" class="fixed inset-0 z-10 hidden bg-black bg-opacity-50 flex flex-col justify-center items-center">
    <div class="bg-white mx-auto p-5 rounded-lg w-4/5 max-w-lg max-h-[80vh] overflow-y-auto">
        <span id="close" class="text-gray-500 float-right text-xl font-bold cursor-pointer hover:text-black">&times;</span>
        <h2 class="text-lg font-bold">Terms and Conditions</h2>
        <p class="mt-2 text-sm text-gray-700">Terms and Conditions for Enrollment</p>
        <!-- Add the entire terms and conditions content here -->
        <div class="mt-4 max-h-[60vh]">
            <p class="text-sm text-gray-700 text-justify">By using the Cavite State University (CvSU) Bacoor City Campus Enrollment System, you agree to the following terms and conditions:</p>
            <h3 class="mt-4 font-semibold text-sm">1. Eligibility</h3>
            <p class="text-sm text-gray-700 text-justify">The enrollment system is accessible to all students who meet the academic and administrative requirements for enrollment at CvSU Bacoor City Campus.</p>

            <h3 class="mt-4 font-semibold text-sm">2. Accuracy of Information</h3>
            <p class="text-sm text-gray-700 text-justify">You are responsible for providing accurate and complete personal information during the enrollment process. Inaccuracies may result in enrollment cancellation.</p>

            <h3 class="mt-4 font-semibold text-sm">3. Data Privacy</h3>
            <p class="text-sm text-gray-700 text-justify">Personal information submitted during enrollment will be processed according to the Data Privacy Act of 2012. For more information, refer to the <a href="#privacy-policy-modal" class="text-blue-500 hover:text-blue-700 cursor-pointer">Privacy Policy</a>.</p>

            <h3 class="mt-4 font-semibold text-sm">4. Payment</h3>
            <p class="text-sm text-gray-700 text-justify">Enrollment is considered complete only after the payment for tuition and fees has been processed. Failure to pay by the specified deadline may result in delay or cancellation of enrollment.</p>

            <h3 class="mt-4 font-semibold text-sm">5. Course Registration</h3>
            <p class="text-sm text-gray-700 text-justify">You are required to complete course registration during the designated period. Late registration may incur additional fees or be subject to course availability.</p>

            <h3 class="mt-4 font-semibold text-sm">6. Changes and Modifications</h3>
            <p class="text-sm text-gray-700 text-justify">The university reserves the right to make necessary changes to schedules, fees, and programs. You will be informed of any changes in a timely manner.</p>

            <h3 class="mt-4 font-semibold text-sm">7. Student Responsibilities</h3>
            <p class="text-sm text-gray-700 text-justify">As a student, you are expected to adhere to university policies, regulations, and codes of conduct. Violations may result in administrative actions.</p>

            <h3 class="mt-4 font-semibold text-sm">8. Access and Security</h3>
            <p class="text-sm text-gray-700 text-justify">The university will take all reasonable measures to protect your personal data, ensuring it is stored securely and is only accessible to authorized personnel for legitimate purposes.</p>

            <h3 class="mt-4 font-semibold text-sm">9. Dispute Resolution</h3>
            <p class="text-sm text-gray-700 text-justify">Any dispute arising from the use of the enrollment system will be resolved in accordance with the applicable policies and regulations of Cavite State University.</p>

            <h3 class="mt-4 font-semibold text-sm">10. Agreement Acceptance</h3>
            <p class="text-sm text-gray-700 text-justify">By using the enrollment system, you acknowledge that you have read, understood, and agreed to these terms and conditions. If you do not agree, please refrain from using the system.</p>
        </div>
    </div>
</div>


    <script>
                
            document.addEventListener("DOMContentLoaded", function () {
            // Get modal element
            const modal = document.getElementById("privacy-policy-modal");
            const closeModal = document.getElementById("close-modal");
            const privacyPolicyLink = document.getElementById("privacy-policy-link");

            // Ensure modal is hidden on page load
            modal.style.display = "none";

            // Open the modal when the privacy policy link is clicked
            privacyPolicyLink.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent the default link behavior
                modal.style.display = "flex"; // Use flex to center the modal
            });

            // Close the modal when the close button is clicked
            closeModal.addEventListener("click", function () {
                modal.style.display = "none"; // Hide the modal
            });

            // Close the modal if the user clicks outside the modal content
            window.addEventListener("click", function (event) {
                if (event.target == modal) {
                    modal.style.display = "none"; // Hide the modal
                }
            });
        });


            document.addEventListener("DOMContentLoaded", function () {
        // Get modal element
            const modal = document.getElementById("terms-conditions-modal");
            const closeModal = document.getElementById("close");
            const termsConditionsLink = document.getElementById("terms-conditions-link");

            // Ensure modal is hidden on page load
            modal.style.display = "none";

            // Open the modal when the terms and conditions link is clicked
            termsConditionsLink.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent the default link behavior
                modal.style.display = "flex"; // Use flex to center the modal
            });

            // Close the modal when the close button is clicked
            closeModal.addEventListener("click", function () {
                modal.style.display = "none"; // Hide the modal
            });

            // Close the modal if the user clicks outside the modal content
            window.addEventListener("click", function (event) {
                if (event.target == modal) {
                    modal.style.display = "none"; // Hide the modal
                }
            });
        });



        document.getElementById('toggle-password').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const eyeIcon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text'; // Show password
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye'); // Change icon to eye
        } else {
            passwordInput.type = 'password'; // Hide password
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash'); // Change icon back to slashed eye
        }
    });

          // Form submission validation for Privacy Policy checkbox
          document.getElementById("login-button").addEventListener("click", function (event) {
            const agreePolicyCheckbox = document.getElementById("agree-policy");
            const errorMessage = document.getElementById("error-message");

            if (!agreePolicyCheckbox.checked) {
                errorMessage.style.display = "block";
                event.preventDefault();
            } else {
                errorMessage.style.display = "none";
            }
        });

    </script>
</body>

</html>
