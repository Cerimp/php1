<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Урок №4</title>
</head>
<body>


<div>На основе кода, изученного на уроке, сделайте простейшую фотогалерею:
    <ol>
        <li>Скрипт, который выводит в браузер изображения из определенной папки на сервере</li>
        <li>Форма и скрипт загрузки нового изображения в эту папку</li>

        <li>Решите задачу загрузки файла от пользователя в заданное место на сервере с тем же именем файла, что он имел на компьютере пользователя.&nbsp;</li>

        <li>* Решите задачу ограничения загрузки, например - только файлов JPEG и PNG</li>
    </ol>
</div>



<?php

$list = scandir(__DIR__.'/images');
$list = array_diff($list, ['.', '..']);

foreach ($list as $img) {
    ?>
    <img src="/4/gallery/images/<?php echo $img ?>"/>
    <?php
}
?>


<form method="post" action="/4/gallery/upload.php" enctype="multipart/form-data">
    <input type="file" name="myimage">
    <button type="submit">Добавить</button>
</form>




</body>
</html>