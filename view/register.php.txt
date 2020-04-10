<?php
require_once "../back/connection.php";

if (isset($_POST['reg-button'])) {
    $login = $_POST['reg-login'];
    $password = $_POST['reg-pass'];
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    $button = $_POST['reg-button'];

    $query = "SELECT login FROM users WHERE login = '$login';";
    $result = mysqli_query($link, $query);
    $row = mysqli_num_rows($result);

    if ($row == 0) 
    {
        $query_reg = "INSERT INTO `users` (`id_user`, `login`, `password`, `username`) VALUES (NULL, '$login', '$passwordhash');";
        $send = mysqli_query($link, $query_reg);
    }
    else{
        echo "<p style='
                      align-items: center; 
                      color: #f33; 
                      font-weight: bolder; 
                      background-color: white; 
                      padding: 2%; 
                      border-radius: 5px;
                      border: 1px solid #ff4d4d;'>Такой пользователь уже существует! </p>";
    }

    if ($send) 
    {
        header('Location: auth.php');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/auth.css">
  <meta charset="utf-8">
	<title> Регистрация </title>
</head>

<body>
<main>
    <div id="container">
        <h1>Регистрация</h1>
        <form id="reg" method="POST">
            <p><input type="text" name="reg-login" required autofocus placeholder="Логин..."></p>
            <p><input type="password" name="reg-pass" required="" placeholder="Пароль..."></p>
            <p><input type="submit" name="reg-button" value="Зарегистрироваться" id="book_add"></p>
            
            <p><a href="../index.php"> <span>У меня уже есть аккаунт</a></p>
        </form>
    </div>
</main>  
</body>
</html>