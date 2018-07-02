<?php

// Подключаем функции
include __DIR__.'/functions.php';

if (isset($_POST['record']) && !empty($_POST['record'])) {
    $records = dataBook(__DIR__.'/data.txt');
    if (count($records) === 0) {
        $records[] = $_POST['record'];
    } else {
        $records[] = "\n".$_POST['record'];
    }

    file_put_contents(__DIR__.'/data.txt', $records);
}
    header('Location: /4/gbook/');
    exit;


