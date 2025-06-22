<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login - O.C.P</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

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
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #40916c;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #2d6a4f;
    }

    a {
      font-size: 14px;
      color: #2f5236;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    .message {
      font-size: 14px;
      margin-bottom: 10px;
    }

    .message.error {
      color: red;
    }

    .message.success {
      color: green;
    }

    .social-buttons {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 15px;
    }

    .social-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 10px;
      border-radius: 8px;
      color: white;
      text-decoration: none;
      font-weight: 600;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    .social-btn i {
      font-size: 18px;
    }

    .social-btn.google {
      background-color: #4285f4;
    }

    .social-btn.google:hover {
      background-color: #3367d6;
    }

    .social-btn.facebook {
      background-color: #3b5998;
    }

    .social-btn.facebook:hover {
      background-color: #2d4373;
    }

    .social-btn.apple {
      background-color: #000;
    }

    .social-btn.apple:hover {
      background-color: #333;
    }

    .footer-text {
      margin-top: 20px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>O.C.P</h1>
    <h3>Login to your account</h3>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      @if (session('error'))
      <div class="message error">{{ session('error') }}</div>
      @endif

      @if (session('success'))
      <div class="message success">{{ session('success') }}</div>
      @endif

      <div class="input-icon">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required />
      </div>

      <div class="input-icon">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required />
      </div>

      <button type="submit">Log In</button>
    </form>

    <div style="margin-top: 10px;">
      <a href="#">Forgot your password?</a>
    </div>

    <p style="margin: 15px 0 10px;">or continue with</p>

    <div class="social-buttons">
      <a href="/auth/google" class="social-btn google"><i class="fab fa-google"></i> Continue with Google</a>
      <a href="/auth/facebook" class="social-btn facebook"><i class="fab fa-facebook-f"></i> Continue with Facebook</a>
      <a href="/auth/apple" class="social-btn apple"><i class="fab fa-apple"></i> Continue with Apple</a>
    </div>

    <div class="footer-text">
      Don't have an account? <a href="{{ route('register') }}">Sign up</a>
    </div>
  </div>
</body>
</html>
