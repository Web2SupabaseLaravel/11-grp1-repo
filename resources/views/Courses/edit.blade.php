<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Course</title>
    <style>
        body {
            background-color: #cfe3c1;
            font-family: Arial, sans-serif;
            padding: 40px;
            margin-left: 250px; /* لتفادي الناف */
        }

        .container {
            background-color: #e0efd3;
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="url"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
        }

        .time-group {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        textarea {
            height: 100px;
            resize: none;
        }

        button {
            margin-top: 25px;
            padding: 12px 20px;
            background-color: #4caf50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        nav {
            background-color: rgb(168, 240, 172);
            color: black;
            height: 100vh;
            width: 250px;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }

        nav .container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        nav .text-xl {
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
        }

        nav ul li {
            margin-bottom: 1rem;
            position: relative;
        }

        nav ul li > button,
        nav ul li > a {
            color: black;
            font-size: 1rem;
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
            width: 100%;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s;
        }

        nav ul li > button:hover,
        nav ul li > a:hover {
            background-color: rgba(255 255 255 / 0.2);
            color: rgb(162, 243, 182);
        }

        nav ul li ul {
            display: none;
            background-color: white;
            color: black;
            border-radius: 0.375rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            margin-top: 0.5rem;
            padding: 0.5rem 0;
            position: relative;
            left: 0;
            width: 100%;
            z-index: 10;
        }

        nav ul li:hover > ul {
            display: block;
        }

        nav ul li ul li {
            margin: 0;
        }

        nav ul li ul li a:hover {
            background-color: rgb(162, 243, 182);
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside>
    <nav>
        <div class="container">
            <div class="text-xl">O.C.P</div>
            <ul>
                <li>
                    <button>Courses ▾</button>
                    <ul>
                        <li><a href="#">Create</a></li>
                        <li><a href="#">Update</a></li>
                        <li><a href="#">Delete</a></li>
                    </ul>
                </li>
                <li><a href="#">Lessons</a></li>
                <li><a href="#">Quizzes</a></li>
                <li><a href="#">Reports</a></li>
            </ul>
        </div>
    </nav>
</aside>

<!-- Update Course Form -->
<div class="container">
    <h1>Update Course</h1>

    <form method="POST" action="{{ route('course.update', $course->id) }}">
        @csrf
        @method('PUT')

        <label for="title">Course Title</label>
        <input type="text" id="title" name="title" value="{{ $course->title }}" placeholder="Enter Course title">

        <label for="notes">Additional Notes:</label>
        <textarea id="notes" name="notes" placeholder="Write any additional information here...">{{ $course->notes }}</textarea>

        <label for="teacher_id">ID Teacher</label>
        <input type="text" id="teacher_id" name="teacher_id" value="{{ $course->teacher_id }}" placeholder="Enter ID teacher">

        <label>Interactive Lesson</label>

        <div class="time-group">
            <label>Start</label>
            <input type="datetime-local" name="start_time" value="{{ \Carbon\Carbon::parse($course->start_time)->format('Y-m-d\TH:i') }}">
        </div>

        <div class="time-group">
            <label>End</label>
            <input type="datetime-local" name="end_time" value="{{ \Carbon\Carbon::parse($course->end_time)->format('Y-m-d\TH:i') }}">
        </div>

        <button type="submit">Update Course</button>
    </form>
</div>

</body>
</html>
