<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";
$id_user = $_SESSION['id_user'];

$id_candle = $_GET['id'];

$queryCandle  = "SELECT url_image, name_candle, price_size, name_smell, size_candle FROM candles, candle_size_price, candle_image, candle_name, candle_smell WHERE candles.id_size_candle = candle_size_price.id_size_price AND candles.id_image = candle_image.id_image AND candles.id_smell_candle = candle_smell.id_smell_candle AND candles.id_name_candle = candle_name.id_name_candle AND candles.id_candle = $id_candle";
$result = mysqli_query($link, $queryCandle);

$rowData = mysqli_fetch_assoc($result);
$url_image = $rowData['url_image'];
$name_candle = $rowData['name_candle'];
$price_size = $rowData['price_size'];
$name_smell = $rowData['name_smell'];
$size_candle = $rowData['size_candle'];

$back = $_SERVER['HTTP_REFERER'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="../css/about_candle.css">
    <title>Описание свечи</title>
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

<div class="container">
        <div class='pic' style="background-image: url(<?= $url_image;?>);">
        </div>
        <div class="content">
            
               <p><span><?= $name_candle;?></span> </p>
               <p>Запах: <?= $name_smell; ?> </p>
               <p>Размер: <?= $size_candle; ?> </p>
               <p>Цена: <?= $price_size; ?> руб </p> 

        <div class="cont">  
            <a href="<?= $back; ?>">Вернуться</a>
        </div>

    </div>
</div>


</body>
</html>
