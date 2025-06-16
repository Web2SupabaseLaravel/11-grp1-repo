<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>New Course</title>
    <style>
         /* Reset box sizing */
        *, *::before, *::after {
            box-sizing: border-box;
        }

        body {
            background-color: #cfe3c1;
            font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            color: #2f5236;
            line-height: 1.5;
        }

        /* Sidebar Styles */
        nav {
            background-color: #a8f0ac;
            color: black;
            height: 100vh;
            width: 250px;
            padding: 1.5rem 2rem;
            box-shadow: 2px 0 8px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            font-weight: 600;
            user-select: none;
            z-index: 100;
        }

        nav .logo {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 3rem;
            text-align: center;
            color: #3b6b45;
            letter-spacing: 2px;
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
            color: #2f5236;
            font-size: 1.15rem;
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
            width: 100%;
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
        }

        nav ul li > button:hover,
        nav ul li > a:hover {
            background-color: #40916c;
            color: white;
            text-decoration: none;
        }

        nav ul li ul {
            display: none;
            background-color: white;
            color: black;
            border-radius: 8px;
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

        nav ul li ul li a {
            display: block;
            padding: 0.5rem 1rem;
            color: #2f5236;
            font-weight: 500;
        }

        nav ul li ul li a:hover {
            background-color: #3b6b45;
            color: white;
            text-decoration: none;
        }

        /* Main content */
        main {
            margin-left: 250px; /* Width of sidebar */
            padding: 40px 60px;
            flex-grow: 1;
            min-height: 100vh;
            background-color: #e0efd3;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .form-container {
            background-color: white;
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 600px;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #3b6b45;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        /* Validation errors */
        .errors {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1.5px solid #f5c6cb;
        }

        .errors ul {
            margin: 0;
            padding-left: 20px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-top: 20px;
            color: #2f5236;
            font-size: 1rem;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="datetime-local"] {
            width: 100%;
            padding: 14px 16px;
            margin-top: 6px;
            border: 1.5px solid #a4c595;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 500;
            transition: border-color 0.3s;
            font-family: inherit;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        input[type="datetime-local"]:focus {
            border-color: #40916c;
            outline: none;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .time-group {
            margin-top: 18px;
        }

        button {
            margin-top: 30px;
            padding: 14px 28px;
            background-color: #4caf50;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 700;
            letter-spacing: 1.1px;
            box-shadow: 0 6px 12px rgba(76, 175, 80, 0.4);
            transition: background-color 0.3s, box-shadow 0.3s;
            display: block;
            width: 100%;
        }

        button:hover {
            background-color: #40916c;
            box-shadow: 0 8px 16px rgba(64, 145, 108, 0.6);
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            nav {
                position: relative;
                width: 100%;
                height: auto;
                box-shadow: none;
                padding: 1rem 1rem;
            }

            main {
                margin-left: 0;
                padding: 30px 20px;
                min-height: auto;
            }

            .form-container {
                padding: 30px 25px;
                box-shadow: 0 0 15px rgba(0,0,0,0.05);
            }
        }
    </style>
</head>
<body>

<nav>
    <div class="text-xl">O.C.P</div>
    <ul>
        <li>
            <button>Courses ▾</button>
            <ul>
                <li><a href="{{ route('courses.createe') }}">Create Courses</a></li>
                             <li><a href="/courses">List</a></li>
                <li><a href="/courses/edit">Edit Courses</a></li>
                <li><a href="/courses/delete">Delete Courses</a></li>
            </ul>
        </li>
        <li><a href="/lessons">Lessons</a></li>
        <li><a href="/quizzes">Quizzes</a></li>
        <li><a href="/reports">Reports</a></li>
    </ul>
</nav>

<main>
    <div class="form-container">
        <h1>New Course</h1>

        <form method="POST" action="{{ route('courses.store') }}">
            @csrf

            <label for="title">Course Title</label>
            <input type="text" id="title" name="title" placeholder="Enter Course title" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Enter course description..." required></textarea>

            <label for="teacher_id">Teacher ID</label>
            <input type="text" id="teacher_id" name="teacher_id" placeholder="Enter ID of the teacher" required>

            <div class="time-group">
                <label for="start_time">Start Time</label>
                <input type="datetime-local" id="start_time" name="start_time" required>
            </div>

            <div class="time-group">
                <label for="end_time">End Time</label>
                <input type="datetime-local" id="end_time" name="end_time" required>
            </div>

            <button type="submit">Create Course</button>
        </form>
    </div>
</main>

</body>
</html>
