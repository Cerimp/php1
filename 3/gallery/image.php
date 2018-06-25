<a href="/3/gallery"> Вернуться назад</a> <br/>
<?php

$images = include (__DIR__.'/data.php');

if (isset($images[$_GET["id"]])) { ?>
    <img src="/3/gallery/images/<?php echo $images[$_GET["id"]] ?>" alt="">
<?php
} else { ?>
    Изображение не найдено!
<?php }