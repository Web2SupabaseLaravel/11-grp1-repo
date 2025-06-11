<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login Page</title>

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

    .social-buttons {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 10px;
    }

    .social-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 10px;
      border-radius: 5px;
      color: white;
      text-decoration: none;
      font-weight: 600;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .social-btn i {
      font-size: 20px;
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
      background-color: #000000;
    }
    .social-btn.apple:hover {
      background-color: #333333;
    }

    a {
      font-size: 14px;
      color: black;
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
  </style>
</head>
<body>
  <div class="container">
    <h1>Online Course Platform</h1>
    <h3>Login to your Account</h3>

    <form method="POST" action="{{ route('api.login') }}">
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

      <button type="submit">Log in</button>
    </form>

    <div>
      <a href="#">Forget your Password?</a>
    </div>

    <p>or continue with</p>

    <div class="social-buttons">
      <a href="/auth/google" class="social-btn google"
        ><i class="fab fa-google"></i> Continue with Google</a
      >
      <a href="/auth/facebook" class="social-btn facebook"
        ><i class="fab fa-facebook-f"></i> Continue with Facebook</a
      >
      <a href="/auth/apple" class="social-btn apple"
        ><i class="fab fa-apple"></i> Continue with Apple</a
      >
    </div>

    <p style="margin-top: 15px;">
      Don't have an Account? <a href="{{ route('register') }}">Sign Up</a>


    </p>
  </div>
</body>
</html>
