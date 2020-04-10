<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href ="header.html">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Main</title>
</head>
<body>
    <?php
    include "header.html";
    ?>

    <div class="container">
        <div class="pic" data-modal-text="Описание"><img src="../img/candle.jpg" width="200px" height="200px"></div>
        <div class="pic" data-modal-text="Описание"><img src="../img/candle.jpg" width="200px" height="200px"></div>
        <div class="pic" data-modal-text="Описание"><img src="../img/candle.jpg" width="200px" height="200px"></div>
        <div class="pic" data-modal-text="Описание"><img src="../img/candle.jpg" width="200px" height="200px"></div>
        <div class="pic" data-modal-text="Описание"><img src="../img/candle.jpg" width="200px" height="200px"></div>
        <div class="pic" data-modal-text="Описание"><img src="../img/candle.jpg" width="200px" height="200px"></div>
        <div class="pic" data-modal-text="Описание"><img src="../img/candle.jpg" width="200px" height="200px"></div>
        <div class="pic" data-modal-text="Описание"><img src="../img/candle.jpg" width="200px" height="200px"></div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<script> 
$('.pic').hover(
        function() {
          let top = $(this).offset().top + $(this).height();
          let left = $(this).offset().left;
          let data = $(this).data('modal-text');
      
          let div = document.createElement('div');
          div.id = 'modal';
          $(div).css('top', top);
          $(div).css('left', left);
          $(div).html(data);
          $('body').append(div);
        },
        function() {
          $('#modal').remove();
        });
</script>

</body>
</html>