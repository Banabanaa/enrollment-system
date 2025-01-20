@extends('layouts.department')

@section('title', 'Terms and Conditions')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="mt-4 text-justify">Terms and Conditions</h1>
    <ol class="breadcrumb mb-4 text-justify">
        <li class="breadcrumb-item active">
            Terms and Conditions for Staff Use of the Enrollment System for Computer Science and Information Technology Courses at CvSU-Bacoor City Campus
        </li>
    </ol>

    <h2 class="text-xl font-semibold mt-6 mb-2">1. Acceptance of Terms</h2>
    <p class="text-justify">By accessing and using the Cavite State University - Bacoor Campus Enrollment System for Computer Science and Information Technology Courses at CvSU-Bacoor City Campus (hereinafter referred to as “the System”), you, a staff member (“you” or “Staff”), agree to be bound by these Terms and Conditions (hereinafter referred to as “Terms”). If you do not agree to these Terms, you are not authorized to use the System. Your continued use of the System constitutes your acceptance of these Terms, as they may be amended from time to time.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">2. Purpose of the System</h2>
    <p class="text-justify">The System is provided by Cavite State University - Bacoor Campus (hereinafter referred to as “the Institution”) to facilitate:</p>
    <ul class="list-disc ml-6 text-justify">
        <li>Student registration for courses and programs.</li>
        <li>Access to and management of course schedules.</li>
        <li>Management of student personal and academic information.</li>
        <li>Viewing and processing of student grades, and academic progress.</li>
        <li>Other functions related to student enrollment as determined by the Institution.</li>
    </ul>

    <h2 class="text-xl font-semibold mt-6 mb-2">3. User Accounts</h2>
    <p class="text-justify"><strong>Account Creation:</strong> You will be provided with a unique username and password for accessing the System. Your account is assigned to you as a staff member and is not transferable.</p>
    <p class="text-justify"><strong>Account Security:</strong> You are responsible for maintaining the confidentiality of your login credentials and for any activity that occurs under your account. You agree to notify the Institution immediately of any unauthorized or loss of access to or use of your account.</p>
    <p class="text-justify"><strong>Account Usage:</strong> You may only use your account for your official duties related to facilitating student enrollment at the Institution. You are not permitted to share your account information or access another staff member's account without authorization.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">4. Use of the System</h2>
    <ul class="list-disc ml-6 text-justify">
        <li><strong>Official Use Only:</strong> You agree to use the System solely for official purposes related to your role as a staff member at the Institution.</li>
        <li><strong>Data Integrity:</strong> You agree to enter, update, and maintain student data accurately and completely.</li>
        <li><strong>Lawful Use:</strong> You agree to use the System in compliance with all applicable laws, regulations, and the Institution’s policies, including but not limited to the Data Privacy Act of 2012 (RA 10173) and its Implementing Rules and Regulations.</li>
        <li><strong>Appropriate Conduct:</strong> You agree not to use the System to engage in any conduct that is illegal, unethical, offensive, disruptive, or that infringes upon the rights of students, colleagues, or other individuals. This includes, but is not limited to:</li>
        <ul class="list-inside ml-6">
            <li>Hacking or attempting to gain unauthorized access to any part of the System.</li>
            <li>Uploading malicious software or viruses.</li>
            <li>Harassing, defaming, or impersonating students or other users.</li>
            <li>Sharing inappropriate content.</li>
            <li>Misusing or altering student records.</li>
        </ul>
    </ul>

    <h2 class="text-xl font-semibold mt-6 mb-2">5. Data Privacy and Security</h2>
    <p class="text-justify"><strong>Data Handling:</strong> You are responsible for handling student data in accordance with the Institution’s Privacy Policy for Staff Use and all applicable data protection laws.</p>
    <p class="text-justify"><strong>Data Access:</strong> You agree to access only the student information necessary for your job functions.</p>
    <p class="text-justify"><strong>Data Protection:</strong> You agree to take all reasonable measures to protect student data from unauthorized access, use, or disclosure.</p>
    <p class="text-justify"><strong>No Sharing:</strong> You agree not to share student data with unauthorized individuals or external parties, including through unauthorized copying or transmission.</p>
    <p class="text-justify"><strong>Reporting Breaches:</strong> You are obligated to immediately report any suspected data security breaches or unauthorized access to the System or student information to the Institution’s Data Protection Officer (DPO).</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">6. Academic Information and Accuracy</h2>
    <p class="text-justify"><strong>Accuracy of Information:</strong> You are responsible for ensuring the accuracy of the information you enter or manage within the System.</p>
    <p class="text-justify"><strong>Grade Management:</strong> You must follow established institutional policies and procedures regarding grade management and recording.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">8. System Availability and Maintenance</h2>
    <p class="text-justify"><strong>Service Uptime:</strong> The Institution will make reasonable efforts to ensure the System is available for your use.</p>
    <p class="text-justify"><strong>Maintenance:</strong> The Institution may perform scheduled or unscheduled maintenance on the System, which may result in temporary interruptions of service.</p>
    <p class="text-justify"><strong>No Guarantee:</strong> The Institution does not guarantee uninterrupted or error-free access to the System.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">9. Changes to the Terms</h2>
    <p class="text-justify"><strong>Updates:</strong> The Institution reserves the right to modify these Terms at any time.</p>
    <p class="text-justify"><strong>Notification:</strong> The Institution will notify you of any material changes to these Terms, either through the System or by other means.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">10. Intellectual Property</h2>
    <p class="text-justify"><strong>Ownership:</strong> The System and all its content are the intellectual property of the Institution or its licensors and are protected by copyright and other intellectual property laws.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">11. Disclaimer of Warranties</h2>
    <p class="text-justify">The System is provided “as is” and “as available,” without any warranties of any kind, either express or implied. The Institution disclaims all warranties, including but not limited to, warranties of merchantability, fitness for a particular purpose, and non-infringement.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">12. Limitation of Liability</h2>
    <p class="text-justify">The Institution shall not be liable for any direct, indirect, incidental, special, consequential, or punitive damages, including, without limitation, damages for loss of profits, data, or use, arising from or in connection with your use of the System, except in cases of gross negligence or willful misconduct by the Institution.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">13. Indemnification</h2>
    <p class="text-justify">You agree to indemnify and hold harmless the Institution, its officers, directors, employees, and agents from any and all claims, damages, losses, liabilities, costs, and expenses (including attorney's fees) arising from or in connection with your use of the System or any violation of these Terms.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">14. Governing Law</h2>
    <p class="text-justify">These Terms shall be governed by and construed in accordance with the laws of the Philippines, without regard to its conflict of law provisions.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">15. Termination of Access</h2>
    <p class="text-justify">The Institution reserves the right to terminate your access to the System at any time for any reason, including, but not limited to, violation of these Terms, violation of the Institutional Policy and Code of Ethics, violation of applicable laws and regulations, or termination of your employment at the Institution.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">16. Contact Information</h2>
    <p class="text-justify">If you have any questions about these Terms, please contact:</p>
    <p class="text-justify">
        Cavite State University - Bacoor Campus<br>
        cvsubacoor@cvsu.edu.ph<br>
        (046) 476-5029
    </p>

    <h2 class="text-xl font-semibold mt-6 mb-2">17. Entire Agreement</h2>
    <p class="text-justify">These Terms constitute the entire agreement between you and the Institution regarding your use of the System and supersede all prior or contemporaneous communications and proposals, whether oral or written.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">18. Severability</h2>
    <p class="text-justify">If any provision of these Terms is held to be invalid or unenforceable, the remaining provisions shall remain in full force and effect.</p>

    <p class="text-justify">By using this Enrollment System, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions.</p>
</div>

@endsection
