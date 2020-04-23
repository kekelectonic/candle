<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";
$id_order = $_GET['id_order'];
$id_user = $_SESSION['id_user'];
$queryInfoOrder = "
        SELECT name_candle, url_image, price_size, quantity, quantity * price_size, status_order, cost_order FROM cart, candles, candle_size_price, candle_name, candle_image WHERE id_order_user = $id_order AND id_user = $id_user AND status_order = 'order' AND cart.id_candle = candles.id_candle AND candles.id_image = candle_image.id_image AND candles.id_size_candle = candle_size_price.id_size_price AND candles.id_name_candle = candle_name.id_name_candle";
$resultInfoOrder = mysqli_query($link, $queryInfoOrder);

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
<div class="logo">
    <img src="../img/logo.png" width= "270px" height= "90px">
    </div>
<header>
    <a href="order.php">Заказы</a>
    <a href="cart.php"> Корзина </a>
    <a href="catalogue.php"> Каталог </a>
    <a href="../back/logout.php"> Выйти </a>
</header>

<div class="container">
    
        <div class="content">
            <p>Фото</p>
            <p>Название</p>
            <p>Цена за шт</p> 
            <p>Количество</p>
            <p>Сумма</p>
<?php
$cost = 0;
while ($row_data = mysqli_fetch_assoc($resultInfoOrder)) {
            $cost += $row_data['quantity * price_size'];
?>
            <p><img src="<?= $row_data['url_image'];?>">
            <p><?= $row_data['name_candle'];?></p>
            <p><?= $row_data['price_size'];?> руб</p>
            <p><?= $row_data['quantity'];?> шт</p>
            <p><?= $row_data['quantity * price_size'];?> руб</p>
<?php
}
?>

<p>Всего: <?=$cost;?> руб</p>
        </div>
        <div class="content">
            <a href="../back/repeat_order.php?id_order=<?=$id_order;?>">Повторить заказ</a>
        </div>
       
</div>



</body>
</html>