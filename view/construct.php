<?php
session_start();
require_once "../back/connection.php";

if (empty($_SESSION['username'])) {
    header('Location: auth.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="../css/construct.css">
    <title>Конструктор</title>
</head>
<body>
   
<header>
    <a href="account.php"> Личный кабинет </a>
    <a href="catalogue.php"> Каталог </a>
    <a href="../back/logout.php"> Выйти </a>
</header>
    <h1>Создайте свечу </h1>
    
<div class="container">    
        <div class="content">
        <p> Выберите цвет:</p>
                <select class="nav" name="select_color"> 
                        <option class="red" value="red" selected >Красный</option> 
                        <option class="orange" value="orange">Оранжевый</option>
                        <option class="yellow" value="yellow">Желтый</option>
                        <option class="green" value="green">Зеленый</option>
                        <option class="blue" value="blue">Голубой</option>
                        <option class="darkblue" value="darkblue">Синий</option>
                        <option class="purple" value="purple">Фиолетовый </option>
                </select>
        </div>

        <div class="content">
           
            <p> Выберите запах:</p>
                    <select class="nav" name="select_smell"> 
                            <option value="1">channel №5</option> 
                            <option value="2">trash</option>
                            <option value="3">garbage</option>
                            <option value="4">dirty MONK socks</option>
                            <option value="5">dead fish</option>
                            <option value="5">gspd </option>
                            <option value="6"> Pugacheva</option>
                    </select>
        </div>  

        <div class="content">
            <p> Выберите форму:</p>
                    <select class="nav" name="select_form"> 
                            <option value="1">Цилиндрическая</option> 
                            <option value="2">Прямоугольная</option>
                            <option value="3">Звёздочка</option>
                    </select>
        </div>
        
        <div class="content" >
           
            <p> Выберите размер:</p>
                    <select class="nav" name="select_size"> 
                            <option value="1">5x5см</option> 
                            <option value="2">10х10см</option>
                            <option value="3">15х15см</option>
                    </select>
        </div> 
        <form class="content qAndS" >
           <p> Количество:</p>
                <input type="number" min="1" class="quantity">
                <button type="submit" class="sbmt"> Добавить в корзину </button>
        </form>   
        

</div>



</body>
</html>