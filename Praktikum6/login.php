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
  <title>Login Sederhana</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: rgb(168, 174, 182);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px grey;
      width: 100%;
      max-width: 400px;
    }

    .container h2 {
      text-align: center;
      margin-bottom: 24px;
      color: rgb(72, 72, 72);
    }

    input.username,
    input.password {
      width: 100%;
      padding: 12px;
      margin: 8px 0 16px;
      border: 1px solid rgb(84, 84, 84);
      border-radius: 8px;
    }

    .login {
      width: 100%;
      height: 40px;
      margin: 8px 0 16px;
      border: none;
      background: rgb(65, 147, 255);
      color: white;
      border-radius: 8px;
      font-size: 16px;
    }

    .login:hover {
      cursor: pointer;
      background-color: rgb(31, 110, 190);
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Login</h2>
    <form method="POST" action="">
      <input class="username" name="username" type="text" placeholder="Username = Faris Akmal Soehartono" required>
      <input class="password" name="password" type="password" placeholder="Password = 3124600101" required>
      <input class="login" type="submit" value="Login">
      <?php if (isset($error)) {
        echo "<p style='color: tomato; text-align: center;'>$error</p>";
      } ?>
    </form>
  </div>
</body>

</html>