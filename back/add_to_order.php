<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";

	$id_candle = $_GET['candleID'];
	$id_user = $_SESSION['id_user'];
	$cost_order = $_SESSION['cost_order']; 
///////////////////НОМЕР ЗАКАЗА//////////////////////////////////
    $query_session = "SELECT `session_order` FROM `users` WHERE `id_user` = $id_user;";
    $result_session = mysqli_query($link, $query_session);
    $session_data = mysqli_fetch_row($result_session);
    $sess = $session_data[0];
	$id_order_user = $sess;
//////////////////МЕНЯЕМ СТАТУС С КОРЗИНЫ НА ЗАКАЗ//////////////////////////////////
	$queryToOrder = "UPDATE `cart` SET `status_order` = 'order', `cost_order` = $cost_order, `date` = NOW() WHERE `id_user` = $id_user AND `id_order_user` = $id_order_user AND `status_order` = 'cart';";
	$resultToOrder = mysqli_query($link, $queryToOrder);

//////////////////////ОБНОВЛЕНИЕ НОМЕРА ЗАКАЗА//////////////////////////////////////
        $query_session = "SELECT `session_order` FROM `users` WHERE `id_user` = $id_user;";
        $result_session = mysqli_query($link, $query_session);
        $session_data = mysqli_fetch_row($result_session);
        $session = $session_data[0];
        $session++;

        $query_update_session = "UPDATE `users` SET `session_order` = $session WHERE `id_user` = $id_user;";
        $result_update_session = mysqli_query($link, $query_update_session);


        $query_session2 = "SELECT `session_order` FROM `users` WHERE `id_user` = $id_user;";
        $result_session2 = mysqli_query($link, $query_session2);
        $session_data2 = mysqli_fetch_row($result_session2);
        $session = $session_update[0];
        $_SESSION['session'] = $session;
/////////////////////////////////////////////////////////
$thanks = 1;

mysqli_close($link);
header('Location: ../view/order.php?thanks='.urlencode($thanks));
?>