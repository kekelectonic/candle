<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";


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
    <link rel="stylesheet" href="../css/cart.css">
    <title>Корзина</title>
</head>
<body>

<header>
    <a href="catalogue.php"> Каталог </a>
    <a href="construct.php"> Конструктор </a>
    <a href="account.php"> Личный кабинет </a>
    <a href="../back/logout.php"> Выйти </a>
</header>

    <nav> 
        <p><a href="../back/clear-cart.php?idOrd=<?= $id_order_user;?>">Очистить корзину</a></p>  
        
    </nav>



<div class="container">


    <div class="content">
            <p>Товар</p>
            <p>Цена за шт</p> 
            <p>Количество</p>
            <p>Сумма</p>
            <p>Действие</p>

    <?php
        $query_orders = "
        SELECT cart.id_candle, id_order_user, name_candle, quantity, price_size, quantity * price_size, status_order 
        FROM cart, candles, candle_size_price, candle_name 
        WHERE id_order_user = $id_order_user 
        AND id_user = $id_user AND status_order = 'cart' 
        AND cart.id_candle = candles.id_candle 
        AND candles.id_size_candle = candle_size_price.id_size_price 
        AND candles.id_name_candle = candle_name.id_name_candle;";

        $result = mysqli_query($link, $query_orders);
        $row = mysqli_num_rows($result);
        if($row <= 0){
            echo "<span> В корзине пока нет товаров</span>";

        }
        else{
        $cost = 0;
        while ($row_data = mysqli_fetch_assoc($result)) {
            $order = $row_data['id_order_user'];
            $cost += $row_data['quantity * price_size']; 
        ?>
            <p><?= $row_data['name_candle'];?></p>
            <p><?= $row_data['price_size'];?></p>
            <p>
                <a href="../back/minus_quantity.php?idCandle=<?= $row_data['id_candle'];?>&idOrder=<?= $row_data['id_order_user'];?>&quantity=<?= $row_data['quantity'];?>">-</a> 
                <?= $row_data['quantity'];?> шт 
                <a href="../back/plus_quantity.php?idCandle=<?= $row_data['id_candle'];?>&idOrder=<?= $row_data['id_order_user'];?>&quantity=<?= $row_data['quantity'];?>">+</a>
            </p>
            <p><?= $row_data['quantity * price_size'];?> руб</p>
            <p><a href="../back/del-candle-from-cart.php?idOrder=<?= $row_data['id_order_user'];?>&idCandle=<?= $row_data['id_candle'];?>"><span class='del'>Удалить</span></a></p>
           
        <?
        }
            ?>
              
     <?
        }
        $_SESSION['cost_order'] = $cost;
        
        ?>


    </div>
</div>

<footer>
<?php
if($row > 0){
?>
<p class="cost">Итого:<span> <?= $cost;?></span> руб </p>
<p><a href="../back/add_to_order.php" class>Заказать</a></p>
<?php
}
?>
</footer>

</body>
</html>