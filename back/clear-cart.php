<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";
$id_user = $_SESSION['id_user'];
$id_order = $_GET['idOrd'];

$queryDelCart = "DELETE FROM `cart` WHERE `id_order_user` = $id_order AND `id_user` = $id_user";
$resultDelCart = mysqli_query($link, $queryDelCart);

mysqli_close($link);
header('Location: ../view/cart.php');