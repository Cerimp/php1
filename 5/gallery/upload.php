<?php
session_start();
include __DIR__.'/../functions.php';

// Функция генератора имени, с тем же именем что у пользователя на компьютере - избегаем перезаписи файлов с одинаковым именем...
function nameImage($name) {
    // Если имя файла существует, то добавляем к имени "1" и вызываем еще раз проверку и так до бесконечности...
    if (file_exists(__DIR__.'/images/'.$name)) {
        $nameNew = pathinfo($name);
        $nameNew = $nameNew['filename'].'1.'.$nameNew['extension'];
        return nameImage($nameNew);
        //Если имени файла не существует, то используем для сохранения...
    } else {
        return $name;
    }
}

// Разрешенные типы файлов
$types = ['image/png', 'image/jpeg'];

// Добавил проверку на пользователя, который вошел ...
if (isset($_FILES['myimage']) && in_array($_FILES['myimage']['type'], $types) && null !== getCurrentUser()) {
    if (0 == $_FILES['myimage']['error']) {
        $nameFile = nameImage($_FILES['myimage']['name']);
        $uploaded = move_uploaded_file(
            $_FILES['myimage']['tmp_name'],
            __DIR__.'/images/'.$nameFile
        );
        if (true === $uploaded) {
            $res = fopen(__DIR__.'/logs.txt', 'a');
            fwrite($res, $_SESSION['user'].' '.date('Y-m-d H:i:s').' '.$nameFile."\n");
            fclose($res);
        }
    }
} else {
    ?>Не удалось<?php
}
