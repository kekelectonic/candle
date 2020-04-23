<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";
$id_order = $_GET['id_order'];
$id_user = $_SESSION['id_user'];
$queryInfoOrder = "
        SELECT cart.id_candle, name_candle, url_image, price_size, quantity, quantity * price_size, status_order, cost_order FROM cart, candles, candle_size_price, candle_name, candle_image WHERE id_order_user = $id_order AND id_user = $id_user AND status_order = 'order' AND cart.id_candle = candles.id_candle AND candles.id_image = candle_image.id_image AND candles.id_size_candle = candle_size_price.id_size_price AND candles.id_name_candle = candle_name.id_name_candle";
$resultInfoOrder = mysqli_query($link, $queryInfoOrder);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="../css/order_info.css">
    <title>Информация о заказах</title>
</head>
<body>
<div class="logo">
        <a href="catalogue.php"><img src="../img/logo.png" width= "250px" height= "110px"></a>
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
            <p>Цена</p> 
            <p>Количество</p>
            <p>Сумма</p>
<?php
$cost = 0;
while ($row_data = mysqli_fetch_assoc($resultInfoOrder)) {
            $cost += $row_data['quantity * price_size'];
?>
            <p><img src="<?= $row_data['url_image'];?>">
            <p><a href="about_candle.php?id=<?= $row_data['id_candle'];?>" class= "about_candle"><?= $row_data['name_candle'];?></a></p>
            <p><?= $row_data['price_size'];?> руб</p>
            <p><?= $row_data['quantity'];?> шт</p>
            <p><?= $row_data['quantity * price_size'];?> руб</p>
<?php
}
?>
</div>
<p class="cost">Итого:<span> <?= $cost;?></span> руб </p>
</div>        
        <footer>
            <a href="../back/repeat_order.php?id_order=<?=$id_order;?>">Повторить заказ</a>
    </footer>
       




</body>
</html>