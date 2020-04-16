<?php
session_start();
require_once "../back/connection.php";

	$id_candle = $_GET['candleID'];
	$id_user = $_SESSION['id_user'];
	$id_order_user = 1;
	$query = "INSERT INTO `candle_order` (`id_orders`, `id_candle`, `quantity`, `id_user`, `date`, `id_order_user`)  
	VALUES(NULL, $id_candle, 1, $id_user,NOW(), $id_order_user);";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	mysqli_close($link);
	header('Location: ../view/catalogue.php');
?>