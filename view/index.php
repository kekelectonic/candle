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
    <link rel="stylesheet" href ="header.html">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Main</title>
</head>
<body>
<header>
    <a href="index.php"> Личный кабинет </a>
    <a href="construct.php"> Создать свой вариант </a>
    <a href="#"> Выйти </a>
</header>
<div id="news"><h3></h3></div>  
<div class="container">
  
    <?php
        $query = "SELECT `id_candle`, `color_candle`, `form_candle`, `smell_candle`, `size_candle`, `price_candle`, `img_candle` FROM `candles`";                        
        $result = mysqli_query($link, $query);
        $row = mysqli_num_rows($result);

        while ($row_data = mysqli_fetch_assoc($result)) {

            echo "<div class='pic'>";
                echo "<p class='descP'>";
                    echo "Цвет: " . $row_data['color_candle'];
                    echo "<br>";
                    echo "Форма: " . $row_data['form_candle'];
                    echo "<br>";
                    echo "Запах: " . $row_data['smell_candle'];
                    echo "<br>";
                    echo "Размер: " . $row_data['size_candle'];
                    echo "<br>";
                    echo "Цена: " . $row_data['price_candle'];

            echo "<form method='GET' action='../back/add_to_cart.php'>";
            echo "<input type='hidden' name='id_candle' value='".$row_data['id_candle']."'>";

                echo "<button type='submit' class='sbmt' id='".$row_data["id_candle"]."'> <img src='../img/cart.png' width='50px' height='50px'>";
                echo "</button>";
            echo "</form>";
                echo "</p>";
            echo "</div>";
        }
            ?>
  
</div>
    </body>
</html>