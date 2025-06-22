<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register - O.C.P</title>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #d6f5d6, #a8f0ac);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background: #ffffff;
      width: 380px;
      padding: 30px 25px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(64, 145, 108, 0.3);
      text-align: center;
    }

    h1 {
      font-size: 28px;
      margin-bottom: 10px;
      color: #3b6b45;
      font-weight: bold;
      letter-spacing: 1.5px;
    }

    h3 {
      font-size: 16px;
      margin-bottom: 20px;
      color: #4b6f52;
      font-weight: 600;
    }

    .input-icon {
      position: relative;
      margin-bottom: 18px;
      text-align: left;
    }

    .input-icon i {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #2f5236;
    }

    .input-icon input {
      width: 100%;
      padding: 10px 10px 10px 38px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      box-sizing: border-box;
    }

    .error-message {
      color: #ff6b6b;
      font-size: 13px;
      margin-top: 5px;
      padding-left: 5px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #40916c;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      margin-top: 10px;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #2d6a4f;
    }

    .links {
      margin-top: 20px;
      font-size: 14px;
      color: #2f5236;
    }

    .links a {
      color: #2f5236;
      text-decoration: none;
      font-weight: 600;
    }

    .links a:hover {
      text-decoration: underline;
    }
    .error-message {
  color: #d9534f; /* أحمر أنيق */
  font-size: 13px;
  margin-top: 6px;
  padding-left: 5px;
  display: flex;
  align-items: center;
  gap: 5px;
  background-color: #fbeaea;
  border-left: 4px solid #d9534f;
  padding: 6px 10px;
  border-radius: 6px;
}

  </style>
</head>
<body>

  <div class="container">
    <h1>O.C.P</h1>
    <h3>Create your account</h3>

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
           <div class="error-message">
    <i class="fas fa-exclamation-circle" style="margin-right: 5px; color: #d9534f;"></i>
    {{ $message }}
  </div>
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
