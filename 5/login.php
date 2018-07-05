<?php

session_start();

include __DIR__.'/functions.php';

// Если данные пришли проверяем их и записываем данные в сессию
if (isset($_POST['user']) && isset($_POST['password'])) {
    if (сheckPassword ($_POST['user'], $_POST['password'])) {
        $_SESSION['user'] = $_POST['user'];
    }
}

// Если пользователь вошел - перенаправляем на страницу, в противном случае - форма
if (null !== getCurrentUser()) {
    header('Location: /5/index.php');
} else { ?>

    <form method="post" action="/5/login.php">
        Логин:<input type="text" name="user">
        Пароль:<input type="password" name="password">
        <button type="submit">Войти</button>
    </form>

    <?php
}
?>

