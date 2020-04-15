<?php
session_start();
require_once "../back/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
    <title>Каталог</title>
</head>
<body>
<header>
    <a href="account.php"> Личный кабинет </a>
    <a href="construct.php"> Создать свой вариант </a>
    <a href="#"> Выйти </a>
</header> 
<div class="container">
  
    <?php
        $query = "SELECT `id_candle`, `color_candle`, `form_candle`, `smell_candle`, `size_candle`, `price_candle`, `img_candle` FROM `candles`";                        
        $result = mysqli_query($link, $query);
        $row = mysqli_num_rows($result);

        while ($row_data = mysqli_fetch_assoc($result)) {
            // echo ;
            ?>
            <div class='pic'>
                <p class='descP'>
                    Цвет: <? echo $row_data['color_candle'];?> <br>
                    Форма: <? echo $row_data['form_candle'];?> <br>
                    Запах: <? echo  $row_data['smell_candle']; ?> <br>
                    Размер: <? echo $row_data['size_candle']; ?> <br>
                    Цена: <? echo $row_data['price_candle']; ?> <br>

                    <a href="../back/add_to_cart.php?candleID=<?= $row_data["id_candle"];?>" class='sbmt'></a>
                </p>
            </div>
            <?

            // echo "<div class='pic'>";
            //     echo "<p class='descP'>";
            //         echo "Цвет: " . $row_data['color_candle'];
            //         echo "<br>";
            //         echo "Форма: " . $row_data['form_candle'];
            //         echo "<br>";
            //         echo "Запах: " . $row_data['smell_candle'];
            //         echo "<br>";
            //         echo "Размер: " . $row_data['size_candle'];
            //         echo "<br>";
            //         echo "Цена: " . $row_data['price_candle'];

            // echo "<form id='add_cart' method='GET' action='../back/add_to_cart.php?".$row_data['id_candle']."'>";
            
            //     echo "<input type='submit' class='sbmt' name='add' value='' id='".$row_data["id_candle"]."'>";
            // echo "</form>";
            //     echo "</p>";
            // echo "</div>";
        }
            ?>
  
</div>
    </body>
</html>