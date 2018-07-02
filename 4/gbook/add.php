<?php

// Подключаем функции
include __DIR__.'/functions.php';

if (isset($_POST['record']) && !empty($_POST['record'])) {
    $records = dataBook();

    foreach ($records as $key => $record) {
        $records[$key] = trim($record);
    }
    $records[] = $_POST['record'];

    file_put_contents(__DIR__.'/data.txt', implode("\n", $records));
}
    header('Location: /4/gbook/');
    exit;


