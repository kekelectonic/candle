<?php
session_start();

if (empty($_SESSION['username'])) 
{
    header('Location: ../view/auth.php');
    exit();
}

else 
{
    header('Location: ../index.php/library.php');
    exit();
}