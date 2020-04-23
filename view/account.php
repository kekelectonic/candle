<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href ="../css/account.css">
</head>

<body>
<div class="logo">
        <a href="catalogue.php"><img src="../img/logo.png" width= "250px" height= "110px"></a>
    </div>
    <?php
        $id_user = $_SESSION['id_user'];

        $query = "SELECT `id_user`, `login`, `fio`, `phone`, `address` FROM `users` WHERE `id_user` = '$id_user'";
        $result = mysqli_query($link, $query);
        $data = mysqli_fetch_assoc($result);
        $login_data = $data['login'];
        $fio_data = $data['fio'];
        $phone_data = $data['phone'];
        $address_data = $data['address'];

    ?>    

    <header>
        <a href="catalogue.php"> Каталог </a>    
        <a href="construct.php"> Конструктор </a>
        <a href="cart.php"> Корзина </a>
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