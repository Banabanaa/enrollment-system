@extends('layouts.registrar')

@section('content')
<div class="container mx-auto p-6 bg-light shadow-lg rounded-lg">
  <!-- Buttons at the top -->
  <div class="flex justify-end mb-4 gap-4">
  <button type="button" id="issueCorButton" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">ISSUE COR</button>
    <button id="downloadPdfBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Download PDF</button>
  </div>

  <div id="registrationForm" class="bg-white shadow-md rounded-lg p-6 max-w-4xl mx-auto">
    <!-- Registration Form Header -->
    <div class="flex items-center justify-between mb-6">
        <div class="text-center flex-1">
            <h1 class="text-2xl font-bold text-green-700">CAVITE STATE UNIVERSITY</h1>
            <p class="text-lg text-gray-600">Bacoor City Campus</p>
            <p class="text-lg font-bold text-green-700">REGISTRATION FORM</p>
        </div>
    </div>


      <div>
    <!-- Registration Form content here -->
    <div class="grid grid-cols-3 gap-4">
        <!-- Row 1 -->
        <div>
            <label for="studentNumber" class="block text-sm font-medium text-gray-700">Student Number</label>
            <input id="studentNumber" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
        </div>
        <div>
            <label for="studentName" class="block text-sm font-medium text-gray-700">Student Name</label>
            <input id="studentName" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
        </div>
        <div>
            <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
            <input id="semester" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
        </div>

        <!-- Row 2 -->
        <div>
            <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
            <input id="course" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
        </div>
        <div>
            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
            <input id="year" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
        </div>
        <div>
            <label for="schoolYear" class="block text-sm font-medium text-gray-700">School Year</label>
            <input id="schoolYear" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
        </div>

        <!-- Row 3 -->
        <div class="col-span-2">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input id="address" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
        </div>
        <div>
            <label for="section" class="block text-sm font-medium text-gray-700">Section</label>
            <input id="section" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
        </div>

        <!-- Row 4 -->
        <div>
            <label for="encoder" class="block text-sm font-medium text-gray-700">Encoder</label>
            <input id="encoder" type="text" class="w-full bg-gray-200 border border-gray-300 rounded-lg p-2 text-sm mt-1">
        </div>
    </div>
</div>
<!-- Add other fields as needed -->

<!-- Button to Issue COR -->



    <!-- Subjects Table -->
    <table class="table-auto w-full text-sm text-left border mt-10">
      <thead>
        <tr class="bg-green-500 text-white">
          <th class="px-4 py-2 border">Subject Code</th>
          <th class="px-4 py-2 border">Subject Description</th>
          <th class="px-4 py-2 border" colspan="2">Units</th>
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
            <td class="px-4 py-2 border text-center"></td>
            <td class="px-4 py-2 border"></td>
            <td class="px-4 py-2 border"></td>
            <td class="px-4 py-2 border"></td>
          </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>

    <div class="mb-6">
        <table class="table-auto w-full text-sm text-left border-collapse">
          <thead>
            <tr class="bg-green-500 text-white">
              <th class="px-4 py-2 border">Laboratory Fees</th>
              <th class="px-4 py-2 border">Other Fees</th>
              <th class="px-4 py-2 border">Assessment</th>
              <th class="px-4 py-2 border"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <!-- Laboratory Fees Column -->
              <td class="px-4 py-2 border-x align-top">
                <div class="flex justify-between">
                  <span>ComLab</span>
                  <span>₱800.00</span>
                </div>
              </td>

              <!-- Other Fees Column -->
              <td class="px-4 py-2 border-x align-top">
                <div class="flex justify-between">
                  <span>NSTP</span>
                  <span></span>
                </div>
                <div class="flex justify-between">
                  <span>Reg Fee</span>
                  <span>₱500.00</span>
                </div>
                <div class="flex justify-between">
                  <span>ID</span>
                  <span></span>
                </div>
                <div class="flex justify-between">
                  <span>Late Reg.</span>
                  <span></span>
                </div>
                <div class="flex justify-between">
                  <span>Insurance</span>
                  <span></span>
                </div>
              </td>

              <!-- Assessment Column -->
              <td class="px-4 py-2 border-x align-top">
                <div class="flex justify-between">
                  <span>Tuition Fee</span>
                  <span>₱4,000.00</span>
                </div>
                <div class="flex justify-between">
                  <span>SFDF</span>
                  <span>₱1,500.00</span>
                </div>
                <div class="flex justify-between">
                  <span>SRF</span>
                  <span>₱2,025.00</span>
                </div>
                <div class="flex justify-between">
                  <span>Misc</span>
                  <span>₱435.00</span>
                </div>
                <div class="flex justify-between">
                  <span>Athletics</span>
                  <span>₱100.00</span>
                </div>
                <div class="flex justify-between">
                  <span>SCUAA</span>
                  <span>₱100.00</span>
                </div>
                <div class="flex justify-between">
                  <span>Library Fee</span>
                  <span>₱50.00</span>
                </div>
                <div class="flex justify-between">
                  <span>Lab Fees</span>
                  <span>₱800.00</span>
                </div>
                <div class="flex justify-between">
                  <span>Other Fees</span>
                  <span>₱55.00</span>
                </div>
              </td>

              <!-- Total Column -->
              <td class="px-4 py-2 border-x font-bold align-top">
                <div class="flex justify-between">
                  <span>Total Units</span>
                  <span>23</span>
                </div>
                <div class="flex justify-between">
                  <span>Total Hours</span>
                  <span>29</span>
                </div>
                <div class="flex justify-between">
                  <span>Total Amount</span>
                  <span>₱9,065.00</span>
                </div>
                <div class="flex justify-between">
                  <span>Scholarship</span>
                  <span></span>
                </div>
                <div class="flex justify-between">
                  <span>CHED Free Tuition</span>
                  <span></span>
                </div>
                <div class="flex justify-between">
                  <span>Tuition</span>
                  <span>₱4,000.00</span>
                </div>
                <div class="flex justify-between">
                  <span>SFDF</span>
                  <span>₱1,500.00</span>
                </div>
                <div class="flex justify-between">
                  <span>SRF</span>
                  <span>₱2,025.00</span>
                </div>
                <div class="flex justify-between">
                  <span>First Payment</span>
                  <span>₱9,965.00</span>
                </div>
                <div class="flex justify-between">
                  <span>Second Payment</span>
                  <span>-</span>
                </div>
                <div class="flex justify-between">
                  <span>Third Payment</span>
                  <span>-</span>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>



    <p class="text-sm text-gray-600">NOTE: Your slots on the above subjects will be confirmed only upon payment.</p>

    <div class="mt-6 text-left space-y-3">
      <p class="text-sm">Old/New Student <span class="font-semibold">Old Student</span></p>
      <p class="text-sm">Registration Status: <span class="font-semibold">Regular</span></p>
      <p class="text-sm">Date of Birth: <span class="font-semibold">December 14, 2024</span></p>
      <p class="text-sm">Gender: <span class="font-semibold">Male</span></p>
      <p class="text-sm">Contact Number: <span class="font-semibold">09705201284</span></p>
      <p class="text-sm">Email Address: <span class="font-semibold">aurinlinus26@gmail.com</span></p>
      <p class="text-sm">Student's Signature: <span class="font-semibold">______________________</span></p>
    </div>
  </>
  </div>

</div>

@endsection
