<?php

include __DIR__ . '/TextFile.php';

class GuestBook extends TextFile
{

    // Путь к файлу с данными
    protected $fileName;

    public function __construct($fileData)
    {
        $this->fileName = $fileData;

        $this->data = file($fileData, FILE_IGNORE_NEW_LINES);
    }

    // Добавление к массиву данных
    public function append($text) {
        $this->data[] = trim($text);
    }

    // Сохранение массива в файл
    public function save() {
        file_put_contents($this->fileName, implode("\n", $this->data));
    }
}


