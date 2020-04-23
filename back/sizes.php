<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";

if(isset($_POST['little'])) {
$size = 1;
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
    AND candles.id_size_candle = $size
    AND candles.id_name_candle != 1";
}

if(isset($_POST['middle'])) {
$size = 2;
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
    AND candles.id_size_candle = $size
    AND candles.id_name_candle != 1";
}

if(isset($_POST['big'])) {
$size = 3;
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
    AND candles.id_size_candle = $size
    AND candles.id_name_candle != 1";
}
if(isset($_POST['all'])) {
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
}
	header('Location: ../view/catalogue.php');
