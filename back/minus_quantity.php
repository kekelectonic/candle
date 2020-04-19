<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";

$id_user = $_SESSION['id_user'];
$id_candle = $_GET['idCandle'];
$id_order = $_GET['idOrder'];
$quantity = $_GET['quantity'];
if($quantity > 1){
$quantity--;	
$queryMinusCandle = "UPDATE `cart` SET `quantity` = $quantity WHERE `id_user` = $id_user AND `id_candle` = $id_candle AND `id_order_user` = $id_order;";
$resultMinusCandle = mysqli_query($link, $queryMinusCandle);	
}

mysqli_close($link);
header('Location: ../view/cart.php');

