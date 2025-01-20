<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advising Details</title>
</head>
<body>
    <h1>Hello {{ $studentName }},</h1>
    <p>Your advising details are as follows:</p>

    <h3>Advised Courses:</h3>
    <ul>
        @foreach($courses as $course)
            <li>{{ $course }}</li>
        @endforeach
    </ul>

    <h3>Advising Notes:</h3>
    <p>{{ $advisingNotes }}</p>

    <p>Best regards,<br>
    {{ $departmentName }}<br>
    Department</p>
</body>
</html>
