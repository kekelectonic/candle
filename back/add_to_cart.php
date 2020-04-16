<?php
session_start();
require_once "../back/connection.php";

	$id_candle = $_GET['candleID'];
	$id_user = $_SESSION['id_user'];
	///////////////////НОМЕР ЗАКАЗА//////////////////////////////////
    $query_session = "SELECT `session_order` FROM `users` WHERE `id_user` = $id_user;";
    $result_session = mysqli_query($link, $query_session);
    $session_data = mysqli_fetch_row($result_session);
    $sess = $session_data[0];
	$id_order_user = $sess;

	///////////////////ПРОВЕРКА НА УЖЕ СУЩЕСТВУЮЩИЙ ЗАКАЗ НА ДАННУЮ СЕССИЮ////////////////////////////////
	$query_repeat_order = "SELECT `id_orders`, `id_candle`, `quantity`, `id_user`, `date`, `id_order_user` FROM `candle_order` WHERE `id_candle` = $id_candle AND `id_user` = $id_user AND `id_order_user` = $id_order_user;";
	$result_repeat_order = mysqli_query($link, $query_repeat_order);
	$row_cnt = mysqli_num_rows($result_repeat_order);

	///////////////////////какое количество/////////////////////////////////////////////
	$query_quantity = "SELECT `quantity` FROM `candle_order` WHERE `id_candle` = $id_candle AND `id_user` = $id_user AND `id_order_user` = $id_order_user LIMIT 1";
	$result_quantity = mysqli_query($link, $query_quantity);
    $quantity_data = mysqli_fetch_row($result_quantity);
    $quantity = $quantity_data[0];

	///////////////////////ДОБАВЛЕНИЕ ЗАКАЗА В БД /////////////////////////////////////////////
	if($row_cnt > 0){
		$quantity++;
		$query = "UPDATE `candle_order` SET `quantity` = $quantity WHERE `id_candle` = $id_candle AND `id_user` = $id_user AND `id_order_user` = $id_order_user;";
	}
	else{
		$query = "INSERT INTO `candle_order` (`id_orders`, `id_candle`, `quantity`, `id_user`, `date`, `id_order_user`)  
	VALUES(NULL, $id_candle, 1, $id_user, NOW(), $id_order_user);";
	}

	
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));


	mysqli_close($link);
	header('Location: ../view/catalogue.php');
?>