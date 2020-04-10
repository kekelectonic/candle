<?php
session_start();
require_once '../back/connection.php';

if (isset($_POST['auth-button'])) {
  $login = $_POST['auth-login'];
  $password = $_POST['auth-pass'];

  $button_auth = $_POST['auth-button'];

  $query = "SELECT `login`, `password`  FROM `users`";
  $result = mysqli_query($link, $query);

  while ($row = mysqli_fetch_row($result)) {
    $passVer = password_verify($password, $row[1]);
    if (($login == $row[0]) and $passVer) 
    {
      session_start();
      $_SESSION['username'] = $row[0];
      header('Location: library.php');
    }

  }
    echo "<p style='
          align-items: center; 
          color: #f33; 
          font-weight: bolder; 
          background-color: white; 
          padding: 2%; 
          border-radius: 5px;
          border: 1px solid #ff4d4d;'> Неправильный логин или пароль! </p>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/auth.css">
  <meta charset="utf-8">
	<title> Авторизация </title>
</head>
<body>
<main>
  
    <div id="container">
      <h1>Авторизация</h1>
      <form class="login-form" method="POST">
        <p><input type="text" name="auth-login" required placeholder="Ваш логин..."/></p>
        <p><input type="password" name="auth-pass" required placeholder="Ваш пароль..."/></p>
        <p><input type="submit" name="auth-button" required value="ВОЙТИ" id="book_add"></p>
        <p class="reg"><a href="register.php">Регистрация</a> </p>
      </form>
    </div>
</main>
</body>
</html>