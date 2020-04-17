<?php
session_start();
require_once "../back/connection.php";

if (empty($_SESSION['username'])) {
    header('Location: auth.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="../css/construct.css">
    <title>Конструктор</title>
</head>
<body>
   
<header>
    <a href="account.php"> Личный кабинет </a>
    <a href="cart.php"> Корзина </a>
    <a href="catalogue.php"> Каталог </a>
    <a href="../back/logout.php"> Выйти </a>
</header>
    <h1>Создайте свечу </h1>
    
<div class="container"> 
<form class="content qAndS" action="">   
        <div class="content">
<?php
$queryColor = "SELECT `id_color_candle`, `name_color`, `eng_color` FROM `candle_color`";
$resultColor = mysqli_query($link, $queryColor);
?>
        <p> Выберите цвет:</p>
                <select class="nav" name="select_color">
<?php
while ($rowDataColor = mysqli_fetch_assoc($resultColor)) {
?>
    <option class="<?= $rowDataColor['eng_color'];?>" value="<?= $rowDataColor['id_color_candle'];?>">
        <?= $rowDataColor['name_color'];?>
    </option>
<?php
}
?>
                </select>
        </div>
<?php
$querySmell = "SELECT `id_smell_candle`, `name_smell` FROM `candle_smell`";
$resultSmell = mysqli_query($link, $querySmell);
?>
        <div class="content">
           
            <p> Выберите запах:</p>
                    <select class="nav" name="select_smell"> 
<?php
while ($rowDataSmell = mysqli_fetch_assoc($resultSmell)) {
?>                       
            <option value="<?= $rowDataSmell['id_smell_candle'];?>">
                <?= $rowDataSmell['name_smell'];?>
            </option>
<?php
}
?>
                    </select>
        </div>  
<?php
$queryForm = "SELECT `id_form_candle`, `name_form` FROM `candle_form`";
$resultForm = mysqli_query($link, $queryForm);
?>
        <div class="content">
            <p> Выберите форму:</p>
                    <select class="nav" name="select_form">
<?php
while ($rowDataForm = mysqli_fetch_assoc($resultForm)) {
?> 
            <option value="<?= $rowDataForm['id_form_candle'];?>">
                <?= $rowDataForm['name_form'];?>
            </option>
<?php
}
?>
                    </select>
        </div>
        
        <div class="content" >
<?php
$querySizePrice = "SELECT `id_size_price`, `size_candle`, `price_size` FROM `candle_size_price`";
$resultSizePrice = mysqli_query($link, $querySizePrice);
?>          
            <p> Выберите размер:</p>
                    <select class="nav" name="select_size">
<?php
while ($rowDataSizePrice = mysqli_fetch_assoc($resultSizePrice)) {
?> 
            <option value="<?= $rowDataSizePrice['id_size_price'];?>">
                <?= $rowDataSizePrice['size_candle'];?>
            </option>
<?php
}
?>
                    </select>
        </div> 
            <button type="submit" class="sbmt"> Добавить в корзину </button>
        </form>   
        

</div>



</body>
</html>