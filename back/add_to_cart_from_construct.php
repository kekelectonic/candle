<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";

//////////СНАЧАЛА ИДЕТ ДОБАВЛЕНИЕ В ТАБЛИЦУ СВЕЧИ/////////////////////////////////
$IdSelectColor = $_GET['select_color'];
$IdSelectSmell = $_GET['select_smell'];
$IdSelectSize = $_GET['select_size'];


$queryImg = "SELECT candle_image.id_image FROM candle_color, candle_image WHERE candle_color.id_image = candle_image.id_image AND candle_color.id_color_candle = $IdSelectColor;";
$resultImg = mysqli_query($link, $queryImg);
$rowDataImg = mysqli_fetch_assoc($resultImg);
$id_image = $rowDataImg['id_image'];
$queryToCandles = "INSERT INTO `candles` (`id_candle`, `id_name_candle`, `id_color_candle`, `id_smell_candle`, `id_size_candle`, `id_image`) VALUES (NULL, 1, $IdSelectColor, $IdSelectSmell, $IdSelectSize, $id_image);";
$resultToCandles = mysqli_query($link, $queryToCandles);
/////////ТУТ ЖЕ ВЫБИРАЕМ ЭТУ СВЕЧУ/////////////////////
$queryLastIdCandle = "SELECT id_candle FROM candles ORDER BY id_candle DESC LIMIT 1";
$resultLastIdCandle = mysqli_query($link, $queryLastIdCandle);
$rowDataId = mysqli_fetch_assoc($resultLastIdCandle);
$LastIdCandle = $rowDataId['id_candle'];

	///////////////////НОМЕР ЗАКАЗА//////////////////////////////////
	$id_user = $_SESSION['id_user'];
    $query_session = "SELECT `session_order` FROM `users` WHERE `id_user` = $id_user;";
    $result_session = mysqli_query($link, $query_session);
    $session_data = mysqli_fetch_row($result_session);
    $sess = $session_data[0];
	$id_order_user = $sess;

//////////////////////ПОТОМ ИДЕТ ДОБАВЛЕНИЕ В КОРЗИНУ/////////////////////////

$queryToCart = "INSERT INTO `cart` (`id_orders`, `id_candle`, `quantity`, `id_user`, `date`, `id_order_user`, `status_order`)  
	VALUES(NULL, $LastIdCandle, 1, $id_user, NOW(), $id_order_user, 'cart');";

$resultToCart = mysqli_query($link, $queryToCart) or die("Ошибка " . mysqli_error($link));

mysqli_close($link);
header('Location: ../view/cart.php');
?>
