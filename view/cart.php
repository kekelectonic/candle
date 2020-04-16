<?php
session_start();
require_once "../back/connection.php";

if (empty($_SESSION['username'])) {
    header('Location: auth.php');
    exit();
}

$id_user = $_SESSION['id_user'];
    ///////////////////НОМЕР ЗАКАЗА//////////////////////////////////
    $query_session = "SELECT `session_order` FROM `users` WHERE `id_user` = $id_user;";
    $result_session = mysqli_query($link, $query_session);
    $session_data = mysqli_fetch_row($result_session);
    $sess = $session_data[0];
    $id_order_user = $sess;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="../css/order.css">
    <title>Корзина</title>
</head>
<body>

<header>
    <a href="account.php"> Личный кабинет </a>
    <a href="catalogue.php"> Вернуться в Каталог </a>
    <a href="../back/logout.php"> Выйти </a>
</header>

<div class="container">
    
    <div class="content">
        <p>Название</p>
        <p>Количество</p> 
        <p>Итого</p> 

    <?php
        $query_orders = "SELECT name_candle, quantity, price_candle * quantity FROM cart, candles WHERE id_order_user = $id_order_user AND id_user = $id_user AND cart.id_candle = candles.id_candle;"; 
        $result = mysqli_query($link, $query_orders);
        $row = mysqli_num_rows($result);
        $cost = 0;
        while ($row_data = mysqli_fetch_assoc($result)) {
            
            $cost += $row_data['price_candle * quantity']; 
        ?>
            <p><?= $row_data['name_candle'];?></p>
            <p> <?= $row_data['quantity'];?></p>
            <p><?= $row_data['price_candle * quantity'];?></p>
        <?
        }
            ?>
            <p>Всего: <?= $cost;?></p>  
    </div>
        <form method="GET" action="">
        <input type="submit" name="to-order" value="Заказать" id="to-order">
    </form>     

</div>



</body>
</html>