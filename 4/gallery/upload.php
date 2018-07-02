<?php

//var_dump($_FILES);

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

if (isset($_FILES['myimage']) && in_array($_FILES['myimage']['type'], $types)) {
    if (0 == $_FILES['myimage']['error']) {
        move_uploaded_file(
            $_FILES['myimage']['tmp_name'],
            __DIR__.'/images/'.nameImage($_FILES['myimage']['name'])
        );
    }
} else {
    echo "Не удалось";
}
