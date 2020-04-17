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
        $query_orders = "
        SELECT name_candle, quantity, quantity * price_size 
        FROM cart, candles, candle_size_price, candle_name 
        WHERE id_order_user = $id_order_user 
        AND id_user = $id_user 
        AND cart.id_candle = candles.id_candle 
        AND candles.id_size_candle = candle_size_price.id_size_price 
        AND candles.id_name_candle = candle_name.id_name_candle;";

        $result = mysqli_query($link, $query_orders);
        $row = mysqli_num_rows($result);
        if($row <= 0){
            echo "В корзине пока нет товаров";
        }
        else{
        $cost = 0;
        while ($row_data = mysqli_fetch_assoc($result)) {
            
            $cost += $row_data['quantity * price_size']; 
        ?>
            <p><?= $row_data['name_candle'];?></p>
            <p> <?= $row_data['quantity'];?></p>
            <p><?= $row_data['quantity * price_size'];?></p>
        <?
        }
            ?>
            <p>Всего: <?= $cost;?></p>  
     <?
        }
        ?>
    </div>
        <form method="GET" action="../back/add_to_order.php">
        <input type="submit" name="add-to-order" value="Заказать" id="add-to-order">
    </form>     

</div>



</body>
</html>