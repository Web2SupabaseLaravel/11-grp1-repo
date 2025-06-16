<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Home Page - O.C.P</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4fdf7;
            color: #111;
            min-height: 100vh;
        }

        nav {
            background-color: #a8f0ac; /* نفس الخلفية */
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
            font-size: 1.75rem;
            margin-bottom: 2rem;
            color: #3b6b45; /* لون فستقي داكن */
            text-align: center;
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
            color: #2f5236; /* نص أخضر فستقي */
            font-size: 1.1rem;
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
            font-weight: 600;
        }

        nav ul li > button:hover,
        nav ul li > a:hover {
            background-color: #40916c;
            color: white;
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
            color: #2f5236; /* نص أخضر فستقي */
            font-weight: 500;
        }

        nav ul li ul li a:hover {
            background-color: #3b6b45;
            color: white;
        }

        main {
            margin-left: 270px;
            padding: 3rem 2rem;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        main::before {
            content: "";
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 400px;
            height: 400px;
            background: url('https://cdn-icons-png.flaticon.com/512/919/919832.png') no-repeat center center/contain;
            opacity: 0.1;
            z-index: -1;
            filter: drop-shadow(0 0 5px #4caf50);
        }

        main h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #3b6b45; /* نفس اللون الفستقي الداكن */
            text-align: center;
            letter-spacing: 3px;
            text-shadow: 1px 1px 3px #a7c7a3;
        }

        main p {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            color: #4b6f52;
            text-align: center;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        main .buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        main .buttons a {
            text-decoration: none;
            background-color: #52b788;
            color: white;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(82, 183, 136, 0.4);
            transition: background-color 0.3s, box-shadow 0.3s;
            font-weight: 700;
            letter-spacing: 1.2px;
        }

        main .buttons a:hover {
            background-color: #40916c;
            box-shadow: 0 6px 12px rgba(64, 145, 108, 0.7);
        }

        @media (max-width: 768px) {
            nav {
                position: relative;
                height: auto;
                width: 100%;
            }
            main {
                margin-left: 0;
                padding: 2rem 1rem;
            }
            main::before {
                width: 200px;
                height: 200px;
                top: 5%;
            }
        }
    </style>
</head>
<body>
    <aside>
        <nav>
            <div class="container">
                <div class="text-xl">O.C.P</div>
                <ul>
                    <li>
                        <button>Courses ▾</button>
                        <ul>
                            <li><a href="{{ route('courses.createe') }}">Create Courses</a></li>
                             <li><a href="/courses">List</a></li>
                            <li><a href="#">Edit Courses</a></li>
                            <li><a href="#">Delete Courses</a></li>
                        </ul>
                    </li>
                    <li><a href="/lessons">Lessons</a></li>
                    <li><a href="/quizzes">Quizzes</a></li>
                    <li><a href="/reports">Reports</a></li>
                </ul>
            </div>
        </nav>
    </aside>

    <main>
        <h1>Welcome to O.C.P Learning Platform</h1>
        <p>Discover courses, lessons, quizzes, and reports all in one place. Use the menu on the left to navigate through your learning dashboard with ease and efficiency.</p>

        <div class="buttons">
            <a href="{{ route('courses.createe') }}">Create New Course</a>
            <a href="/courses">View Courses</a>
            <a href="/lessons">View Lessons</a>
            <a href="/quizzes">Take a Quiz</a>
            <a href="/reports">View Reports</a>
        </div>
    </main>
</body>
</html>
