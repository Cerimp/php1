<h1>Задание</h1>
<ol>
    <li>Создайте класс GuestBook, который будет удовлетворять следующим требованиям:
        <ol>
            <li>В конструктор передается путь до файла с данными гостевой книги, в нём же происходит чтение данных из ней (используйте защищенное свойство объекта для хранения данных)</li>
            <li>Метод getData() возвращает массив записей гостевой книги</li>
            <li>Метод append($text) добавляет новую запись к массиву записей</li>
            <li>Метод save() сохраняет массив в файл</li>
        </ol>
    </li>
    <li>* Продумайте - какие части функционала можно вынести в базовый (родительский) класс TextFile, а какие - сделать в унаследованном от него классе GuestBook</li>
    <li>Создайте класс Uploader в соответствии с требованиями:
        <ol>
            <li>В конструктор передается имя поля формы, от которого мы ожидаем загрузку файла</li>
            <li>Метод isUploaded() проверяет - был ли загружен файл от данного имени поля</li>
            <li>Метод upload() осуществляет перенос файла (если он был загружен!) из временного места в постоянное</li>
        </ol>
    </li>
    <li>* Попробуйте некоторые методы заканчивать конструкцией return $this; и придумайте этому применение</li>
</ol>



<h2> Гостевая книга </h2>
<?php

// Блок работы с гостевой книгой
include __DIR__ . '/classes/GuestBook.php';
$guestBook = new GuestBook(__DIR__.'/data.txt');
$guestBook->append('Новая строка');
$guestBook->save();

var_dump($guestBook->getData());
var_dump($guestBook->methodThis());
?>

<h2>Галерея</h2>

    <form method="post" action="/6/index.php" enctype="multipart/form-data">
        <input type="file" name="myimage">
        <button type="submit">Добавить</button>
    </form>
<?php

include __DIR__.'/classes/Uploader.php';

    if (isset($_FILES['myimage'])) {
        $uploader = new Uploader('myimage');
        $uploader->upload();
    }