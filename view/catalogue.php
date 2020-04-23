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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/catalogue.css">
    <title>Каталог</title>
</head>
<body>
<div class="logo">
        <a href="catalogue.php"><img src="../img/logo.png" width= "250px" height= "110px"></a>
    </div>
<header>
    
    <a href="construct.php"> Конструктор </a>   
    <a href="cart.php"> Корзина </a>
    <a href="account.php"> Личный кабинет </a>
    <a href="aboutUs.php"> О нас </a> 
    <a href="../back/logout.php"> Выйти </a>


</header> 
<div class="container">

    <?php
        $query = "
SELECT id_candle, name_candle, name_color, name_smell, size_candle, price_size, url_image
FROM
    candles, candle_name, candle_color, candle_smell, candle_size_price, candle_image
WHERE
    candles.id_name_candle = candle_name.id_name_candle 
    AND candles.id_color_candle = candle_color.id_color_candle 
    AND candles.id_smell_candle = candle_smell.id_smell_candle 
    AND candles.id_size_candle = candle_size_price.id_size_price
    AND candles.id_image = candle_image.id_image
    AND candles.id_name_candle != 1";
    /////ЧТОБЫ НЕ ПОКАЗЫВАТЬ ПОЛЬЗОВАТЕЛЬСКИЕ СВЕЧИ ДОСТАТОЧНО ПРОПИСАТЬ УСЛОВИЕ ГДЕ id_name_candle != 1 /////////////////////////////////////                        
        $result = mysqli_query($link, $query);

        while ($row_data = mysqli_fetch_assoc($result)) {
            
            ?>
            <div class='pic' style="background-image: url(<?= $row_data['url_image'];?>);">
                <p class='descP'>
                    <span><?= $row_data['name_candle'];?></span>
                    Запах: <?=  $row_data['name_smell']; ?> <br>
                    Размер: <?= $row_data['size_candle']; ?> <br>
                    Цена: <?= $row_data['price_size']; ?> <br>             
                    <a href="../back/add_to_cart.php?candleID=<?= $row_data["id_candle"];?>" class='sbmt'></a>
                    <span style="font-size: smaller;">Количество товара укажите в Корзине</span>
                </p>
            </div>
            <?
        }
            ?>
  
</div>
    </body>
</html>