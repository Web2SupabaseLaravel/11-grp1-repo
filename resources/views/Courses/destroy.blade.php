<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Course</title>
    <style>
        /* استخدمت نفس الـ CSS الخاص بك بدون تعديل كبير */
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

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
        }

        button {
            margin-top: 25px;
            padding: 12px 20px;
            background-color: #e53935;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Delete Course</h1>
<form action="{{ route('courses.destroy', $course->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>


</div>

</body>
</html>
