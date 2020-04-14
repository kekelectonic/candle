<?php
session_start();
require_once "../back/connection.php";

	$id_candle = $_GET['candleID'];
	$id_user = 2;

	$query = "INSERT INTO `candle_order`
	(`id_candle`, `quantity`, `id_order`, `id_user`, `date`)
	VALUES ($id_candle, 1, NULL, $id_user, NOW());";
	
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	mysqli_close($link);
	header('Location: ../view/index.php');
?>