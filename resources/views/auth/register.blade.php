<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register Page</title>

  <!-- Font Awesome for icons -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #a1b28d;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background: #a1b28d;
      text-align: center;
      width: 320px;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 24px;
      margin-bottom: 10px;
      color: #ffffff; /* لون أبيض واضح */
      font-weight: bold;
    }

    h3 {
      font-size: 16px;
      margin-bottom: 20px;
      color: #ffffff; /* لون أبيض واضح */
      font-weight: 600;
    }

    .input-icon {
      position: relative;
      margin-bottom: 15px;
      text-align: left;
    }

    .input-icon i {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #555;
    }

    .input-icon input {
      width: 100%;
      padding: 10px 10px 10px 35px;
      border: none;
      border-radius: 3px;
      box-sizing: border-box;
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #8a9b78;
      color: white;
      border: none;
      border-radius: 5px;
      margin-bottom: 10px;
      cursor: pointer;
      font-weight: bold;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: rgb(98, 110, 85);
    }

    .links {
      margin-top: 10px;
      font-size: 14px;
      color: black;
    }

    .links a {
      color: black;
      text-decoration: none;
      font-weight: 600;
    }

    .links a:hover {
      text-decoration: underline;
    }

    .error-message {
      color: #ff6b6b;
      font-size: 12px;
      margin-top: 4px;
      text-align: left;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Online Course Platform</h1>
    <h3>Create your Account</h3>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="input-icon">
        <i class="fas fa-user"></i>
        <input
          type="text"
          name="name"
          placeholder="Name"
          value="{{ old('name') }}"
          required
          autofocus
        />
        @error('name')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </div>

      <div class="input-icon">
        <i class="fas fa-envelope"></i>
        <input
          type="email"
          name="email"
          placeholder="Email"
          value="{{ old('email') }}"
          required
        />
        @error('email')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </div>

      <div class="input-icon">
        <i class="fas fa-lock"></i>
        <input
          type="password"
          name="password"
          placeholder="Password"
          required
        />
        @error('password')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </div>

      <div class="input-icon">
        <i class="fas fa-lock"></i>
        <input
          type="password"
          name="password_confirmation"
          placeholder="Confirm Password"
          required
        />
      </div>

      <button type="submit">Sign Up</button>
    </form>

    <div class="links">
      Already have an account?
      <a href="{{ route('login') }}">Log In</a>
    </div>
  </div>

</body>
</html>
