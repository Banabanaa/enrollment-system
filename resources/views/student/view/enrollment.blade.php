@extends('layouts.student')

@php
    $title = 'CVSU - View Status';
@endphp

@section('content')
<div class="container mx-auto p-6 bg-light shadow-lg rounded-lg">
    <!-- Buttons at the top -->
    <div class="flex justify-end mb-4 gap-4">
        <button id="downloadPdfBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Download PDF</button>
    </div>

    <div class="cor-content bg-light shadow-lg rounded-lg">
        <div id="registrationForm" class="bg-white shadow-md rounded-lg p-6 max-w-4xl mx-auto">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-green-700">CAVITE STATE UNIVERSITY</h1>
                <p class="text-lg text-gray-600">Bacoor City Campus</p>
                <p class="text-lg font-bold text-green-700">REGISTRATION FORM</p>
            </div>

            <!-- Registration Form content -->
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="studentNumber" class="block text-sm font-medium text-gray-700">Student Number</label>
                    <input id="studentNumber" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1" value="{{Auth::user()->student_number}}">
                </div>
                <div>
                    <label for="studentName" class="block text-sm font-medium text-gray-700">Student Name</label>
                    <input id="studentName" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1" value="{{Auth::user()->first_name}} {{Auth::user()->middle_name}} {{Auth::user()->last_name}}">
                </div>
                <div>
                    <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                    <input id="semester" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1" value="{{Auth::user()->semester}}">
                </div>
                <div>
                    <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                    <input id="course" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1" value="{{Auth::user()->course}}">
                </div>
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                    <input id="year" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1" {{Auth::user()->year}}>
                </div>
                <div>
                    <label for="schoolYear" class="block text-sm font-medium text-gray-700">School Year</label>
                    <input id="schoolYear" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
                </div>
                <div class="col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input id="address" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
                </div>
                <div>
                    <label for="section" class="block text-sm font-medium text-gray-700">Section</label>
                    <input id="section" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
                </div>
                <div>
                    <label for="encoder" class="block text-sm font-medium text-gray-700">Encoder</label>
                    <input id="encoder" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
                </div>
            </div>

            <!-- Subjects Table -->
            <table class="table-auto w-full text-sm text-left border mt-10">
                <thead>
                    <tr class="bg-green-500 text-white">
                        <th class="px-4 py-2 border">Subject Code</th>
                        <th class="px-4 py-2 border">Subject Description</th>
                        <th class="px-4 py-2 border text-center">Units</th>
                        <th class="px-4 py-2 border">Day</th>
                        <th class="px-4 py-2 border">Time</th>
                        <th class="px-4 py-2 border">Room</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border"></td>
                        <td class="px-4 py-2 border"></td>
                        <td class="px-4 py-2 border text-center"></td>
                        <td class="px-4 py-2 border"></td>
                        <td class="px-4 py-2 border"></td>
                        <td class="px-4 py-2 border"></td>
                    </tr>
                </tbody>
            </table>

            <!-- Fees and Assessment -->
            <div class="mb-6 mt-10">
                <table class="table-auto w-full text-sm text-left border-collapse">
                    <thead>
                        <tr class="bg-green-500 text-white">
                            <th class="px-4 py-2 border">Laboratory Fees</th>
                            <th class="px-4 py-2 border">Other Fees</th>
                            <th class="px-4 py-2 border">Assessment</th>
                            <th class="px-4 py-2 border">Summary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border-x align-top">
                                <div class="flex justify-between">
                                    <span>ComLab</span>
                                    <span>₱800.00</span>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-x align-top">
                                <div class="flex justify-between">
                                    <span>Reg Fee</span>
                                    <span>₱500.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>ID</span>
                                    <span>₱50.00</span>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-x align-top">
                                <div class="flex justify-between">
                                    <span>Tuition Fee</span>
                                    <span>₱4,000.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Misc</span>
                                    <span>₱435.00</span>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-x font-bold align-top">
                                <div class="flex justify-between">
                                    <span>Total Amount</span>
                                    <span>₱9,065.00</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="text-sm text-gray-600">NOTE: Your slots on the above subjects will be confirmed only upon payment.</p>

            <div class="mt-6 space-y-3">
                <p class="text-sm">Old/New Student: <span class="font-semibold">Old Student</span></p>
                <p class="text-sm">Registration Status: <span class="font-semibold">Regular</span></p>
                <p class="text-sm">Date of Birth: <span class="font-semibold">December 14, 2024</span></p>
                <p class="text-sm">Gender: <span class="font-semibold">Male</span></p>
                <p class="text-sm">Contact Number: <span class="font-semibold">09705201284</span></p>
                <p class="text-sm">Email Address: <span class="font-semibold">aurinlinus26@gmail.com</span></p>
                <p class="text-sm">Student's Signature: <span class="font-semibold">______________________</span></p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#issueCorButton').on('click', function () {
        const studentDetails = {
            studentNumber: $('#studentNumber').val(),
            studentName: $('#studentName').val(),
            semester: $('#semester').val(),
            course: $('#course').val(),
            year: $('#year').val(),
            schoolYear: $('#schoolYear').val(),
            encoder: $('#encoder').val(),
            address: $('#address').val(),
            section: $('#section').val()
        };

        $.ajax({
            url: '#',
            method: 'POST',
            data: studentDetails,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                alert(response.message || 'Student details updated successfully!');
                location.reload();
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('An error occurred while updating the student details.');
            }
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
    document.getElementById('downloadPdfBtn').addEventListener('click', async function () {
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: 'portrait', unit: 'px', format: 'a4' });
        const content = document.querySelector('.container');
        try {
            const canvas = await html2canvas(content, { scale: 2 });
            const imgData = canvas.toDataURL('image/png');
            pdf.addImage(imgData, 'PNG', 10, 10, pdf.internal.pageSize.getWidth() - 20, 0);
            pdf.save('Certificate_of_Registration.pdf');
        } catch (error) {
            console.error('Error generating PDF:', error);
        }
    });
</script>
@endsection
