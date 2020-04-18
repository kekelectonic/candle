<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";

$id_user = $_SESSION['id_user'];
$queryOrders = "SELECT DISTINCT `id_order_user`, `date`, `cost_order` FROM `cart` WHERE `id_user` = $id_user AND status_order = 'order'";
$result = mysqli_query($link, $queryOrders);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="../css/order.css">
    <title>Информация о заказах</title>
</head>
<body>

<header>
    <a href="account.php"> Личный кабинет </a>
    <a href="cart.php"> Корзина </a>
    <a href="catalogue.php"> Каталог </a>
    <a href="../back/logout.php"> Выйти </a>
</header>

<div class="container">
    
    <div class="content">
        <p>Номер заказа</p>
        <p>Дата заказа</p> 
        <p>Сумма заказа</p> 

<?php
while ($row_data = mysqli_fetch_assoc($result)) {
  ?>
            <p> <a href="order_info.php?id_order=<?=$row_data["id_order_user"];?>"><?= $row_data['id_order_user'];?></a> </p>
            <p><?= $row_data['date'];?></p>
            <p><?= $row_data['cost_order'];?> руб</p>
 <?php
}
 ?>           

    </div>
        
       
</div>



</body>
</html>