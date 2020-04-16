<?php
session_start();
require_once "../back/connection.php";

if (empty($_SESSION['username'])) {
    header('Location: auth.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href ="../css/account.css">
</head>
<body>
    <?php
        echo $_SESSION['id_user'];
        echo $_SESSION['username'];
        $id_user = $_SESSION['id_user'];

        $query = "SELECT `id_user`, `login`, `fio`, `phone`, `address` FROM `users` WHERE `id_user` = '$id_user'";
        $result = mysqli_query($link, $query);
        $data = mysqli_fetch_assoc($result);
        $login_data = $data['login'];
        $fio_data = $data['fio'];
        $phone_data = $data['phone'];
        $address_data = $data['address'];

    ?>    
<!--     <form method="GET" action="../back/logout.php">
        <input type="submit" name="exit-button" value="Выход" id="backbtn">
    </form>  -->
    <header>
        <a href="catalogue.php"> Выбрать из каталога </a>
        <a href="construct.php"> Создать свой вариант </a>
        <a href="../back/logout.php"> Выйти </a>
    </header>
    
<div class="container">    
        <div class="content">
            <p>Имя: <? echo $fio_data;?></p>
            <p>Логин: <? echo $login_data;?></p>
            <p>Телефон: <? echo $phone_data;?></p>
            <p>Адрес: <? echo $address_data;?></p>
        </div>
        <div class="content">
            <a href="order.php">История заказов</a>
        </div>
            
        

</div>
</body>
</html>