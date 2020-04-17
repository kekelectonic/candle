<?php
session_start();
require_once "../back/connection.php";

if (empty($_SESSION['username'])) {
    header('Location: auth.php');
    exit();   
}

///////////////////////////////ВЫБОР ЦВЕТА////////////////////////////////////////////////////
$queryColor = "SELECT `id_color_candle`, `name_color`, `eng_color` FROM `candle_color`";
$resultColor = mysqli_query($link, $queryColor);
///////////////////////////////ВЫБОР ЗАПАХА/////////////////////////////////////////////////////
$querySmell = "SELECT `id_smell_candle`, `name_smell` FROM `candle_smell`";
$resultSmell = mysqli_query($link, $querySmell);
//////////////////////////////////ВЫБОР ФОРМЫ//////////////////////////////////////////////////
$queryForm = "SELECT `id_form_candle`, `name_form` FROM `candle_form`";
$resultForm = mysqli_query($link, $queryForm);
//////////////////////////////////ВЫБОР РАЗМЕРА//////////////////////////////////////////////////
$querySizePrice = "SELECT `id_size_price`, `size_candle`, `price_size` FROM `candle_size_price`";
$resultSizePrice = mysqli_query($link, $querySizePrice);
?>