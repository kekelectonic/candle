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
   	$query_orders = "
        SELECT cart.id_candle, id_order_user, url_image, name_candle, quantity, price_size, quantity * price_size, status_order 
        FROM cart, candles, candle_size_price, candle_image, candle_name 
        WHERE id_order_user = $id_order_user 
        AND id_user = $id_user AND status_order = 'cart' 
        AND cart.id_candle = candles.id_candle 
        AND candles.id_size_candle = candle_size_price.id_size_price
		AND candles.id_image = candle_image.id_image       
        AND candles.id_name_candle = candle_name.id_name_candle;";
        $result = mysqli_query($link, $query_orders);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/cart.css">
    <title>Корзина</title>
</head>
<body>
<div class="logo">
        <a href="catalogue.php"><img src="../img/logo.png" width= "250px" height= "110px"></a>
    </div>
<header>
    <a href="catalogue.php"> Каталог </a>
    <a href="construct.php"> Конструктор </a>
    <a href="account.php"> Личный кабинет </a>
    <a href="../back/logout.php"> Выйти </a>
</header>

    <nav>
<?php
$row = mysqli_num_rows($result);
if($row > 0){  //прячет кнопку, если нет товаров в корзине
?>
        <p><a href="../back/clear-cart.php?idOrd=<?= $id_order_user;?>">Очистить корзину</a></p>
<?php
}
?>
    </nav>

<div class="container">
    <div class="content">
<?php
if($row > 0){ //прячет p, если нет товаров в корзине
?>
			<p>Фото</p>
            <p>Название</p>
            <p>Цена</p> 
            <p>Количество</p>
            <p>Сумма</p>
            <p>Действие</p>

    <?php
}
        // $row = mysqli_num_rows($result);
        if($row <= 0){
            echo "<span> В корзине пока нет товаров</span>";
            echo "<script>
                document.querySelector('.container').style.borderRadius = '12px'
                document.querySelector('.container').style.display = 'flex' 
                document.querySelector('.container').style.justifyContent = 'center' 
                document.querySelector('.container').style.alignItems = 'center' 
            </script>";
        }
        else{
        $cost = 0;
        while ($row_data = mysqli_fetch_assoc($result)) {
            $order = $row_data['id_order_user'];
            $cost += $row_data['quantity * price_size']; 
        ?>
        	<p><img src="<?= $row_data['url_image'];?>">
        		</p>
            <p><a href="about_candle.php?id=<?= $row_data['id_candle'];?>"><?= $row_data['name_candle'];?></a></p>
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
    <?php
if($row > 0){
?>
<p class="cost">Итого: <?= $cost;?> руб </p>
</div>

<footer>
    <a href="../back/add_to_order.php" class>Заказать</a>
<?php                   
}
?>
</footer>

</body>
</html>