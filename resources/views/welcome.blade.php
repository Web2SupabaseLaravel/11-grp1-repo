<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Course</title>
    <style>
        body {
            background-color: #cfe3c1;
            font-family: Arial, sans-serif;
            padding: 40px;
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

        .tags {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .tag {
            background-color: #f0f0f0;
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 14px;
            border: 1px solid #aaa;
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
  background-color:rgb(168, 240, 172); /* لون أخضر (tailwind's green-600) */
  color: black;
  height: 100vh; /* يملأ طول الشاشة */
  width: 250px; /* عرض ثابت */
  padding: 1rem; /* نفس padding القديم */
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  position: fixed; /* يثبت الناف على الجانب */
  top: 0;
  left: 0;
  overflow-y: auto; /* يسمح بالتمرير عند وجود محتوى طويل */
}

/* المحتوى داخل الناف */
nav .container {
  display: flex;
  flex-direction: column; /* ترتيب عمودي بدل أفقي */
  height: 100%;
}

/* العنوان */
nav .text-xl {
  font-weight: 600;
  font-size: 1.25rem;
  margin-bottom: 2rem;
}

/* قائمة الروابط */
nav ul {
  list-style: none;
  padding: 0;
  margin: 0;
  flex-grow: 1;
}

/* روابط الناف */
nav ul li {
  margin-bottom: 1rem;
  position: relative;
}

/* أزرار القائمة (Courses) */
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
  border-radius: 0.375rem; /* rounded-md */
  transition: background-color 0.3s;
}

/* تأثير hover على الروابط */
nav ul li > button:hover,
nav ul li > a:hover {
  background-color: rgba(255 255 255 / 0.2);
  color: rgb(162, 243, 182); 
}

/* القوائم المنسدلة */
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

/* عرض القائمة المنسدلة عند hover على العنصر الأب */
nav ul li:hover > ul {
  display: block;
}

/* عناصر القائمة المنسدلة */
nav ul li ul li {
  margin: 0;
}


nav ul li ul li a:hover {
  background-color:rgb(162, 243, 182); 
}
</style>

</head>
<body>
<aside>
<!-- Navbar -->
<nav class="bg-green-600 text-white p-4 shadow-md">
  <div class="container mx-auto flex justify-between items-center">
    <div class="text-xl font-semibold">O.C.P</div>
    <ul class="flex space-x-8">
      <!-- Dropdown: الكورسات -->
      <li class="relative group">
        <button class="hover:text-gray-200">Courses▾</button>
        <ul class="absolute hidden group-hover:block bg-white text-black rounded shadow-md mt-2 w-40">
          <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Create </a></li>
          <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Upsdate </a></li>
          <li><a href="{{ route('delete.blade.php') }}" class="block px-4 py-2 hover:bg-gray-100">Delete </a></li>
        </ul>
      </li>
      <li><a href="#" class="hover:text-gray-200">Lessons</a></li>

      <li><a href="#" class="hover:text-gray-200">Quizies</a></li>
      <li><a href="#" class="hover:text-gray-200">Reports</a></li>
    </ul>
  </div>
</nav>
    </aside>
    
    <div class="container">
        <h1>New Course</h1>

        <form method="POST" action="/courses">
            @csrf

            <label for="title">Course Title</label>
            <input type="text" id="title" name="title" placeholder="Enter Course title">

            <label for="notes">Additional Notes:</label>
            <textarea id="notes" name="notes" placeholder="Write any additional information here..."></textarea>

            <label for="teacher_id">ID Teacher</label>
            <input type="text" id="teacher_id" name="teacher_id" placeholder="Enter ID teacher">

            <label>Interactive Lesson</label>

            <div class="time-group">
                <label>Start</label>
                <input type="datetime-local" name="start_time">
            </div>

            <div class="time-group">
                <label>End</label>
                <input type="datetime-local" name="end_time">
            </div>

            <button type="submit">Create Lesson</button>
        </form>
    </div>

</body>
</html>
