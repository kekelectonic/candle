<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";

        $SESSIONname = $_SESSION['username'];
        $query_id = "SELECT id_user FROM users WHERE login = '$SESSIONname'";
        $result_id = mysqli_query($link, $query_id);
        $id_data = mysqli_fetch_row($result_id);
        $id_user = $id_data[0];
        $_SESSION['id_user'] = $id_user;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/catalogue.css">
    <title>Каталог</title>
</head>
<body>

<header>
    <a href="account.php"> Личный кабинет </a>
    <a href="cart.php"> Корзина </a>
    <a href="construct.php"> Создать свой вариант </a>
    <a href="../back/logout.php"> Выйти </a>


</header> 
<div class="container">
  
    <?php
        $query = "
SELECT id_candle, name_candle, name_color, name_form, name_smell, size_candle, price_size
FROM
    candles, candle_name, candle_color, candle_form, candle_smell, candle_size_price
WHERE
    candles.id_name_candle = candle_name.id_name_candle 
    AND candles.id_color_candle = candle_color.id_color_candle 
    AND candles.id_form_candle = candle_form.id_form_candle 
    AND candles.id_smell_candle = candle_smell.id_smell_candle 
    AND candles.id_size_candle = candle_size_price.id_size_price";                        
        $result = mysqli_query($link, $query);

        while ($row_data = mysqli_fetch_assoc($result)) {
            
            ?>
            <div class='pic'>
                <p class='descP'>
                    <span><? echo $row_data['name_candle'];?></span>
                    Цвет: <? echo $row_data['name_color'];?> <br>
                    Форма: <? echo $row_data['name_form'];?> <br>
                    Запах: <? echo  $row_data['name_smell']; ?> <br>
                    Размер: <? echo $row_data['size_candle']; ?> <br>
                    Цена: <? echo $row_data['price_size']; ?> <br>

                    <a href="../back/add_to_cart.php?candleID=<?= $row_data["id_candle"];?>" class='sbmt'></a>
                </p>
            </div>
            <?
        }
            ?>
  
</div>
    </body>
</html>