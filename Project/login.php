<?php
session_start();
if (isset($_SESSION['username'])) {
  header("Location: form.php");
}
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username === 'Faris Akmal Soehartono' && $password === '3124600101') {
    $_SESSION['username'] = $username;
    header("Location: form.php");
    exit;
  } else {
    $error = "Username atau password salah!";
  }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(160deg, rgb(90, 20, 253), rgb(255, 48, 210));
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
      min-height: 100vh;
    }

    .container {
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgb(79, 79, 79);
      width: 100%;
      max-width: 400px;
    }

    .container h2 {
      text-align: center;
      margin-bottom: 15px;
      color: rgb(50, 50, 50);
    }

    .username,
    .password {
      position: relative;
    }

    .usernameinput,
    .passwordinput {
      width: 100%;
      height: 40px;
      padding: 12px;
      margin: 8px 0 16px;
      border: 1px solid rgb(84, 84, 84);
      border-radius: 8px;
      box-sizing: border-box;
      font-size: 16px;
      -webkit-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    .placeholder1,
    .placeholder2 {
      position: absolute;
      top: 19px;
      left: 10px;
      color: grey;
      background-color: white;
      padding: 0 4px;
      transition: 0.1s ease all;
      pointer-events: none;
      font-size: 16px;
      line-height: 18px;
      border-radius: 20px;
    }

    .usernameinput:focus,
    .passwordinput:focus {
      outline: none;
      border: 1px solid blue;
    }

    .usernameinput:focus~.placeholder1,
    .passwordinput:focus~.placeholder2 {
      top: -1px;
      left: 8px;
      font-size: 12px;
      color: blueviolet;
    }

    .usernameinput:valid~.placeholder1,
    .passwordinput:valid~.placeholder2 {
      top: -1px;
      left: 8px;
      font-size: 12px;
    }

    .login {
      width: 100%;
      height: 40px;
      margin: 8px 0 16px;
      border: none;
      background: rgb(20, 122, 255);
      color: white;
      border-radius: 8px;
      font-size: 16px;
    }

    .login:hover {
      cursor: pointer;
      background-color: rgb(0, 82, 163);
    }

    .register {
      text-align: center;
      margin-top: 5px;
    }

    .register span {
      color: rgb(20, 122, 255);
      cursor: pointer;
    }

    .register span:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Login</h2>
    <form method="POST" action="">
      <div class="username">
        <input id="uname" class="usernameinput" name="username" type="text" required>
        <label class="placeholder1" for="uname">Username</label>
      </div>
      <div class="password">
        <input id="password" class="passwordinput" name="password" type="password" required>
        <label class="placeholder2" for="password">Password</label>
      </div>
      <input class="login" type="submit" value="Login">
      <?php if (isset($error)) {
        echo "<p style='color: tomato; text-align: center;'>$error</p>";
      } ?>
      <div class="register">Don't have an account? <span>Let's register</span></div>
    </form>
  </div>
</body>

</html>