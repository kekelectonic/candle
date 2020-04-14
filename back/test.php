<?php
require_once "../back/connection.php";

           $getId = 1;

           $query = "SELECT DISTINCT date FROM candle_order WHERE id_user = '$getId'";                        
            $resultSelect = mysqli_query($link, $query);
            $SelectRow = mysqli_fetch_assoc($resultSelect);
            $author_book = $SelectRow['author_book'];
            $name_book = $SelectRow['name_book'];
            $description_book = $SelectRow['description_book'];
            $img_book = $SelectRow['img_book'];