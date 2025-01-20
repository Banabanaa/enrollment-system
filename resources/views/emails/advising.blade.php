<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advised Subjects</title>
</head>
<body>
    <h1>Advising Notification</h1>
    <p>Dear {{ $student->first_name }} {{ $student->last_name }},</p>

    <p>Here are the details of your advised subjects:</p>

    <h3>Advising Notes:</h3>
    <p>{{ $advisingNotes }}</p>

    <h3>Advised Subjects:</h3>
    <ul>
        @forelse ($advisedCourses as $course)
            @if (isset($course['course_code']) && isset($course['course_title']))
                <li>{{ $course['course_code'] }} - {{ $course['course_title'] }}</li>
            @else
                <li>Invalid course data</li>
            @endif
        @empty
            <li>No advised courses available.</li>
        @endforelse
    </ul>
</body>
</html>
