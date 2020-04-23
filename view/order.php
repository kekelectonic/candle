<?php
session_start();
require_once "../back/check_session.php";
require_once "../back/connection.php";

$id_user = $_SESSION['id_user'];
$queryOrders = "SELECT DISTINCT `id_order_user`, `date`, `cost_order` FROM `cart` WHERE `id_user` = $id_user AND status_order = 'order' ORDER BY `cart`.`id_order_user` DESC";
$result = mysqli_query($link, $queryOrders);
$thanks = $_GET['thanks'];
if($thanks == 1){
   $message = "Спасибо заказ! Наш менеджер свяжется с вами в течение 5 минут";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/order.css">
    <title>Информация о заказах</title>
</head>
<body>
<div class="logo">
        <a href="catalogue.php"><img src="../img/logo.png" width= "250px" height= "110px"></a>
    </div>
<header>
    <a href="account.php"> Личный кабинет </a>
    <a href="catalogue.php"> Каталог </a>
    <a href="cart.php"> Корзина </a>
    <a href="../back/logout.php"> Выйти </a>
</header>

<div class="message"><?= $message;?></div>

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