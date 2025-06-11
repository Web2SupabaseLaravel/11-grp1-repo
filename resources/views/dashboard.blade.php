<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #eef0e5;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #8a9b78;
      padding: 15px;
      color: white;
      text-align: center;
      font-size: 20px;
    }

    .content {
      padding: 40px;
      text-align: center;
    }

    .content h2 {
      color: #333;
    }

    .logout-btn {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #c44536;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
    }

    .logout-btn:hover {
      background-color: #a13228;
    }
  </style>
</head>
<body>

  <div class="navbar">
    Welcome to Your Dashboard
  </div>

  <div class="content">
    <h2>You're now logged in 🎉</h2>
    <p>This is your dashboard page. You can customize it as needed.</p>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </div>

</body>
</html>
