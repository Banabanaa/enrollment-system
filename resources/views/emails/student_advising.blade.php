<!DOCTYPE html>
<html>
<head>
    <title>Advising Details</title>
</head>
<body>
    <h3>Dear {{ $studentName }},</h3>
    <p>Here are the details for your advising session:</p>

    <h4>Courses Added:</h4>
    <ul>
        @foreach($courses as $course)
            <li>{{ $course }}</li>
        @endforeach
    </ul>

    <h4>Advising Notes:</h4>
    <p>{{ $advisingNotes }}</p>

    <p>Thank you for using the advising system.</p>
</body>
</html>
