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
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="../css/order_info.css">
    <title>Информация о заказах</title>
</head>
<body>

<header>
    <a href="account.php"> Личный кабинет </a>
    <a href="catalogue.php"> Каталог </a>
    <a href="../back/logout.php"> Выйти </a>
</header>

<div class="container">
    
        <div class="content">
            <p>ТОВАР</p>
            <p>Цена</p> 
            <p>Количество</p>
            <p>Сумма</p>

            <p> Аромасвеча "восток"</p>
            <p> 300р</p>
            <p> 1шт</p>
            <p> 300р</p>

            <p> Аромасвеча "дикий запад"</p>
            <p> 200р</p>
            <p> 2шт</p>
            <p> 400р</p>

            <p> Аромасвеча "пугачёва"</p>
            <p> 1000р</p>
            <p> 3шт</p>
            <p> 3000р</p>

            <p> Аромасвеча "пугачёва"</p>
            <p> 1000р</p>
            <p> 3шт</p>
            <p> 3000р</p>

            <p> Аромасвеча "пугачёва"</p>
            <p> 1000р</p>
            <p> 3шт</p>
            <p> 3000р</p>

            <p> Аромасвеча "пугачёва"</p>
            <p> 1000р</p>
            <p> 3шт</p>
            <p> 3000р</p>

            <p> Аромасвеча "пугачёва"</p>
            <p> 1000р</p>
            <p> 3шт</p>
            <p> 3000р</p>
            <p> Аромасвеча "пугачёва"</p>
            <p> 1000р</p>
            <p> 3шт</p>
            <p> 3000р</p>
        </div>
        <div class="content">
            <a href="#">Повторить заказ</a>
        </div>
       
</div>



</body>
</html>