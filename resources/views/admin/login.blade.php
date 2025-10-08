<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body>
  <section class="container">
    <div class="login-container">
      <div class="circle circle-one"></div>
      <div class="form-container">
        <img
          src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png"
          alt="illustration" class="illustration" />
        <h1 class="opacity">ADMIN</h1>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <input type="email" name="email" placeholder="EMAIL" required autofocus />
          <input type="password" name="password" required placeholder="PASSWORD" />
          <button type="submit" class="opacity">LOGIN</button>
          @error('email')
            <p style="color:red;">{{ $message }}</p>
          @enderror
        </form>
      </div>
      <div class="circle circle-two"></div>
    </div>
    <div class="theme-btn-container"></div>
  </section>
</body>

</html>