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
    <link rel="stylesheet" href="../css/order.css">
    <title>Информация о заказах</title>
</head>
<body>
        <?php
        echo $_SESSION['id_user'];
        echo $_SESSION['username'];
    ?>

<header>
    <a href="account.php"> Личный кабинет </a>
    <a href="catalogue.php"> Каталог </a>
    <a href="../back/logout.php"> Выйти </a>
</header>

<div class="container">
    
    <div class="content">
        <p>ID</p>
        <p>Дата</p> 
        <p>Итого</p> 

            <p> <a href="order_info.php">211</a> </p>
            <p> 11.04.2020</p>
            <p> 1208р</p>

            <p> <a href="order_info.php">211</a> </p>
            <p> 11.04.2020</p>
            <p> 1208р</p>
            <p> <a href="order_info.php">211</a> </p>
            <p> 11.04.2020</p>
            <p> 1208р</p>
            <p> <a href="order_info.php">211</a> </p>
            <p> 11.04.2020</p>
            <p> 1208р</p>
            
    </div>
        
       
</div>



</body>
</html>