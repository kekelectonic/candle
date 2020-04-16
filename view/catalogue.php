<?php
session_start();
require_once "../back/connection.php";

if (empty($_SESSION['username'])) {
    header('Location: auth.php');
    exit();
}

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
        $query = "SELECT `id_candle`, `name_candle`, `color_candle`, `form_candle`, `smell_candle`, `size_candle`, `price_candle`, `img_candle` FROM `candles`";                        
        $result = mysqli_query($link, $query);
        $row = mysqli_num_rows($result);

        while ($row_data = mysqli_fetch_assoc($result)) {
            
            ?>
            <div class='pic'>
                <p class='descP'>
                    <span><? echo $row_data['name_candle'];?></span>
                    Цвет: <? echo $row_data['color_candle'];?> <br>
                    Форма: <? echo $row_data['form_candle'];?> <br>
                    Запах: <? echo  $row_data['smell_candle']; ?> <br>
                    Размер: <? echo $row_data['size_candle']; ?> <br>
                    Цена: <? echo $row_data['price_candle']; ?> <br>

                    <a href="../back/add_to_cart.php?candleID=<?= $row_data["id_candle"];?>" class='sbmt'></a>
                </p>
            </div>
            <?
        }
            ?>
  
</div>
    </body>
</html>