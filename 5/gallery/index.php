<?php
session_start();
include __DIR__.'/../functions.php';
?>



<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Урок №5. Галерея</title>
</head>
<body>

<?php
if (null !== getCurrentUser()) { ?>
    <form method="post" action="/5/gallery/upload.php" enctype="multipart/form-data">
        <input type="file" name="myimage">
        <button type="submit">Добавить</button>
    </form>
    <?php
}

?>

<?php

$list = scandir(__DIR__.'/images');
$list = array_diff($list, ['.', '..']);

foreach ($list as $img) {
    ?>
    <img src="/5/gallery/images/<?php echo $img ?>"/>
    <?php
}
?>

</body>
</html>