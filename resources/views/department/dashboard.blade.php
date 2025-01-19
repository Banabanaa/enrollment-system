@extends('layouts.department')

@section('content')
<!-- Dashboard Stats Section -->
<div class="bg-light-gray rounded-lg mb-6 flex space-x-6">

  <!-- Instructors Count Card -->
  <div class="bg-light rounded-2xl shadow-small p-6 items-center flex flex-row justify-between w-full r">
    <!-- Left Part of Instructor Count -->
    <div class="w-1/2">
      <h2 class="font-header text-xl color-primary">Instructors Count</h2>
      <div class="flex items-center mt-4">
        <span class="text-4xl font-bold text-gray-800" id="instructors-total">0</span>
      </div>
      <!-- IT and CS Labels -->
      <div class="mt-6">
        <div class="flex items-center space-x-2">
          <div class="w-6 h-4 bg-lime-green rounded"></div>
          <span class="text-sm text-gray-600">Information Technology</span>
        </div>
        <div class="flex items-center space-x-2 mt-2">
          <div class="w-6 h-4 bg-moss-green rounded"></div>
          <span class="text-sm text-gray-600">Computer Science</span>
        </div>
      </div>
    </div>
    <!-- Right Part of Instructor Card - Pie Chart -->
    <div class="w-1/2 flex justify-center">
      <canvas id="instructorsChart" width="150" height="150"></canvas>
    </div>
  </div>


  <!-- Courses Count Card -->
  <div class="bg-white rounded-2xl shadow-small p-6 items-center flex flex-row justify-between w-full">
    <!-- Left Part of Courses Count Card -->
    <div class="w-1/2">
      <h2 class="font-header text-xl color-primary">Courses Count</h2>
      <div class="flex items-center mt-4">
        <span class="text-4xl font-bold text-gray-800" id="courses-total">0</span>
      </div>
      <!-- IT and CS Labels -->
      <div class="mt-6">
        <div class="flex items-center space-x-2">
          <div class="w-6 h-4 bg-lime-green rounded"></div>
          <span class="text-sm text-gray-600">Information Technology</span>
        </div>
        <div class="flex items-center space-x-2 mt-2">
          <div class="w-6 h-4 bg-moss-green rounded"></div>
          <span class="text-sm text-gray-600">Computer Science</span>
        </div>
      </div>
    </div>
    <!-- Right Part of Courses Count Card - Pie Chart -->
    <div class="w-1/2 flex justify-center">
      <canvas id="coursesChart" width="150" height="150"></canvas>
    </div>
  </div>
</div>



<!-- Recently Added Instructors Section -->
<div class="p-5 bg-light rounded-2xl shadow-small w-full mx-auto mb-2" style="margin-top: 10px;">

  <!-- Title and View All Button -->
  <div class="flex justify-between items-center mb-4">
    <h2 class="font-header text-xl">Recently Added Instructors</h2>
    <button
      class="text-sm text-light bg-primary font-semibold border px-4 py-2 rounded-lg hover:scale-105 transition-transform duration-200 ease-in-out">View
      All</button>
  </div>

  <!-- Table -->
  <div class="overflow-x-auto w-full">
    <table class="min-w-full bg-white shadow-sm rounded-lg">
      <thead>
        <tr class="bg-light-gray">
          <th class="px-6 py-3 text-left text-sm font-bold text-gray-600">Instructor Id</th>
          <th class="px-6 py-3 text-left text-sm font-bold text-gray-600">Name</th>
          <th class="px-6 py-3 text-left text-sm font-bold text-gray-600">Email</th>
          <th class="px-6 py-3 text-left text-sm font-bold text-gray-600">Department</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-gray-100 border-b border-border-color ">
          <td class="px-6 py-4 text-sm text-gray-600">01</td>
          <td class="px-6 py-4 text-sm text-gray-600">Edhan Belgica</td>
          <td class="px-6 py-4 text-sm text-gray-600">example@gmail.com</td>
          <td class="px-6 py-4 text-sm text-gray-600">Computer Science</td>
        </tr>
        <tr class="hover:bg-gray-100 border-b border-border-color ">
          <td class="px-6 py-4 text-sm text-gray-600">02</td>
          <td class="px-6 py-4 text-sm text-gray-600">Benedick Sarmiento</td>
          <td class="px-6 py-4 text-sm text-gray-600">example@gmail.com</td>
          <td class="px-6 py-4 text-sm text-gray-600">Computer Science</td>
        </tr>
        <tr class="hover:bg-gray-100 border-b border-border-color ">
          <td class="px-6 py-4 text-sm text-gray-600">03</td>
          <td class="px-6 py-4 text-sm text-gray-600">Clarissa Rostrollo</td>
          <td class="px-6 py-4 text-sm text-gray-600">example@gmail.com</td>
          <td class="px-6 py-4 text-sm text-gray-600">Information Technology</td>
        </tr>
        <tr class="hover:bg-gray-100 border-b border-border-color ">
          <td class="px-6 py-4 text-sm text-gray-600">04</td>
          <td class="px-6 py-4 text-sm text-gray-600">Aida Penson</td>
          <td class="px-6 py-4 text-sm text-gray-600">example@gmail.com</td>
          <td class="px-6 py-4 text-sm text-gray-600">Information Technology</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>






<script>
  // Sample data for Instructors Count
  const instructorsData = {
    IT: 30,
    CS: 30,
  };

  // Sample data for Courses Count
  const coursesData = {
    Online: 30,
    Offline: 30,
  };

  // Calculate totals
  const instructorsTotal = Object.values(instructorsData).reduce((sum, value) => sum + value, 0);
  const coursesTotal = Object.values(coursesData).reduce((sum, value) => sum + value, 0);

  // Update totals in the DOM
  document.getElementById("instructors-total").textContent = instructorsTotal;
  document.getElementById("courses-total").textContent = coursesTotal;

  // Draw Pie Charts
  function drawPieChart(canvasId, data, colors) {
    const canvas = document.getElementById(canvasId);
    const ctx = canvas.getContext("2d");

    const total = Object.values(data).reduce((sum, value) => sum + value, 0);
    let startAngle = 0;

    Object.entries(data).forEach(([key, value], index) => {
      const sliceAngle = (value / total) * 2 * Math.PI;

      // Draw slice
      ctx.beginPath();
      ctx.moveTo(canvas.width / 2, canvas.height / 2); // Center of the chart
      ctx.arc(
        canvas.width / 2,
        canvas.height / 2,
        canvas.width / 2 - 10, // Adjust for padding
        startAngle,
        startAngle + sliceAngle
      );
      ctx.closePath();
      ctx.fillStyle = colors[index];
      ctx.fill();

      startAngle += sliceAngle;
    });
  }

  // Colors for each chart
  const instructorsColors = ["#34d399", "#65a30d"];
  const coursesColors = ["#34d399", "#65a30d"];

  // Draw both charts
  drawPieChart("instructorsChart", instructorsData, instructorsColors);
  drawPieChart("coursesChart", coursesData, coursesColors);
</script>

@endsection
