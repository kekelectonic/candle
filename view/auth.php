<?php
// session_start();
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

        $SESSIONname = $_SESSION['username'];
        $query_id = "SELECT id_user FROM users WHERE login = '$SESSIONname'";
        $result_id = mysqli_query($link, $query_id);
        $id_data = mysqli_fetch_row($result_id);
        $id_user = $id_data[0];
        $_SESSION['id_user'] = $id_user;
        $id_user = $_SESSION['id_user'];
        
//////////////////////////////////////////////////////////////////
//ОЧЕНЬ СЛОЖНАЯ ШТУКА 
//ДАЖЕ НЕ ПЫТАЙТЕСЬ ПОНЯТЬ ЗАЧЕМ//////////////////////////////////////////
        $query_session = "SELECT `session_order` FROM `users` WHERE `id_user` = $id_user;";
        $result_session = mysqli_query($link, $query_session);
        $session_data = mysqli_fetch_row($result_session);
        $session = $session_data[0];
        $session++;

        $query_update_session = "UPDATE `users` SET `session_order` = $session WHERE `id_user` = $id_user;";
        $result_update_session = mysqli_query($link, $query_update_session);

        $_SESSION['session'] = $session;
/////////////ЕСЛИ В КОРЗИНЕ ЧТО-ТО ОСТАЛОСЬ////////////////////////////////////////////////////////
$queryCart = "SELECT DISTINCT `id_order_user`, `status_order` FROM `cart` WHERE `id_user` = $id_user AND `status_order` = 'cart' ORDER BY `cart`.`id_order_user` DESC LIMIT 1";
$resultCart = mysqli_query($link, $queryCart);
$rowData = mysqli_fetch_assoc($resultCart);
$lastOrder = $rowData['id_order_user'];
$row_cnt = mysqli_num_rows($resultCart);

//////////////////////
if ($row_cnt > 0){
$queryToCart = "UPDATE `cart` SET `id_order_user`= $session WHERE `id_user` = $id_user AND `status_order` = 'cart' AND `id_order_user` = $lastOrder;";
$resultCart = mysqli_query($link, $queryToCart);
}

/////////////////////////////////////////////

      header('Location: catalogue.php');
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
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> Авторизация </title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/auth.css">
</head>
<body>
<div class="logo">
        <img src="../img/logo.png" width= "250px" height= "110px">
    </div>
<main>
  
    <div id="container">
      <h1>Авторизация</h1>
      <form class="login-form" method="POST">
        <p><input type="text" name="auth-login" required placeholder="Ваш логин..."/></p>
        <p><input type="password" name="auth-pass" required placeholder="Ваш пароль..."/></p>
        <p><input type="submit" name="auth-button" required value="ВОЙТИ" class="add"></p>
        <p class="reg"><a href="register.php">Регистрация</a> </p>
      </form>
    </div>
</main>
</body>
</html>