<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";

$id_order = $_GET['id_order'];
$id_user = $_SESSION['id_user'];

///////////////////НОМЕР ЗАКАЗА//////////////////////////////////
    $query_session = "SELECT `session_order` FROM `users` WHERE `id_user` = $id_user;";
    $result_session = mysqli_query($link, $query_session);
    $session_data = mysqli_fetch_row($result_session);
    $sess = $session_data[0];
	$id_order_user = $sess;
///////////////////КАКИЕ СВЕЧИ БЫЛИ В ЗАКАЗЕ//////////////////////////////////
$queryCandles = "SELECT `id_candle`, `quantity` FROM `cart` WHERE `id_user` = $id_user AND `id_order_user` = $id_order;";
$resultCandles = mysqli_query($link, $queryCandles);
while ($rowData = mysqli_fetch_assoc($resultCandles)) {
	$id_candle = $rowData['id_candle'];
	$quantity = $rowData['quantity'];
	$query = "INSERT INTO `cart` (`id_orders`, `id_candle`, `quantity`, `id_user`, `date`, `id_order_user`, `status_order`)  
	VALUES(NULL, $id_candle, $quantity, $id_user, NOW(), $id_order_user, 'cart');";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
}
	mysqli_close($link);
	header('Location: ../view/cart.php');
?>