<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Урок №2</title>
</head>
<body>

<h1>Напишите программу, которая составит и выведет в браузер таблицу истинности для логических операторов &&, || и xor.</h1>

<table border="1" style="border-collapse: collapse;">
    <tr>
        <td>a<td>
        <td>b<td>
        <td>&&<td>
        <td>||<td>
        <td>xor<td>
    </tr>
    <tr>
        <td><?php $a = false; echo (int)$a; ?><td>
        <td><?php $b = false; echo (int)$b; ?><td>
        <td><?php echo (int)($a && $b); ?><td>
        <td><?php echo (int)($a || $b); ?><td>
        <td><?php echo (int)($a xor $b); ?><td>
    </tr>
    <tr>
        <td><?php $a = true; echo (int)$a; ?><td>
        <td><?php $b = false; echo (int)$b; ?><td>
        <td><?php echo (int)($a && $b); ?><td>
        <td><?php echo (int)($a || $b); ?><td>
        <td><?php echo (int)($a xor $b); ?><td>
    </tr>
    <tr>
        <td><?php $a = false; echo (int)$a; ?><td>
        <td><?php $b = true; echo (int)$b; ?><td>
        <td><?php echo (int)($a && $b); ?><td>
        <td><?php echo (int)($a || $b); ?><td>
        <td><?php echo (int)($a xor $b); ?><td>
    </tr>
    <tr>
        <td><?php $a = true; echo (int)$a; ?><td>
        <td><?php $b = true; echo (int)$b; ?><td>
        <td><?php echo (int)($a && $b); ?><td>
        <td><?php echo (int)($a || $b); ?><td>
        <td><?php echo (int)($a xor $b); ?><td>
    </tr>
</table>

<h1>Составьте функцию вычисления дискриминанта квадратного уравнения. Покройте ее тестами. Используя эту функцию, напишите программу, которая решает квадратное уравнение. Оформите красивый вывод решения.</h1>
<?php

// дискриминант
function discriminant($a, $b, $c){
    return $b**2 - 4*$a*$c;
};

// D > 0
assert(81 == discriminant(4,7,-2));
// D == 0
assert(0 == discriminant(25,10,1));
// D < 0
assert(-20 == discriminant(30,10,1));

?>

<h2> Квадратное уравнение </h2>

<?php
//ax**2 + bx + c
// Исходные данные
$a = 1;
$b = 3;
$c = -4;

?>
<div>
    <p>Решение квадратного уравнения:</p>
    <p> <?php echo $a; ?><i>x <sup><small>2</small></sup>
            <?php
            if ($b > 0) {
                echo '+';
            } else {
                echo '-';
            }
            ?>
            <?php echo abs($b) ?>x
            <?php
            if ($c > 0) {
                echo '+';
            } else {
                echo '-';
            }
            ?>
            <?php echo abs($c) ?> </i>
    </p>
</div>

<div>
    <p>Дискриминант:</p>
<p>D =
    <i>b <sup><small>2</small></sup> - 4ac</i> =
    <i> <?php echo $b ?> <sup><small>2</small></sup> - 4*<?php echo $a ?>*<?php echo $c ?> </i> =
    <?php echo $discr = discriminant($a, $b, $c) ?>
</p>
</div>

<div>

    <?php
    if ($discr > 0) { ?>

        <p>Корни квадратного уравнения:</p>
        <p><i>x <sub><small>1,2</small></sub> = (-b ± √D)/(2a)</i></p>
        <p><i>x <sub><small>1</small></sub> = (-b + √D)/(2a)</i> =
            (<?php echo -$b; ?> + √<?php echo $discr; ?>)/(2*<?php echo $a; ?>) =
            <?php echo (-$b + sqrt($discr))/(2*$a); ?>
        </p>
        <p><i>x <sub><small>2</small></sub> = (-b - √D)/(2a)</i> =
            (<?php echo -$b; ?> - √<?php echo $discr; ?>)/(2*<?php echo $a; ?>) =
            <?php echo (-$b - sqrt($discr))/(2*$a); ?>
        </p>

    <?php } elseif ($discr == 0) { ?>
        <p>x = -b/(2a) =
            <?php echo -$b; ?>/(2*<?php echo $a; ?>) =
            <?php echo -$b/(2*$a); ?>
        </p>

    <?php } elseif ($discr < 0) { ?>
        <p> Нет корней</p>
    <?php ;}
    ?>

</div>


<h1>Проведите самостоятельное исследование на тему "Что возвращает оператор include, если его использовать как функцию?". Используйте руководство по языку, составьте и приложите примеры, иллюстрирующие ваше исследование.</h1>
<?php

    /*
     * Если файл подключен успешно. то возвращается значение 1
     * если файл подключен неуспешно. то возфращается булево значение false и выводится Warning
     * мы можем выполнить выражение return внутри включаемого файла, чтобы завершить процесс выполнения в этом файле и вернуться к выполнению включающего файла
     */

    include __DIR__.'/test.php';
    var_dump(include __DIR__.'/test.php'); // int(1)
    var_dump(include __DIR__.'/test1.php'); // bool(false) + warning
    var_dump(include __DIR__.'/test2.php'); // string(1) "5"
?>


<h1>* Составьте функцию, которая на вход будет принимать имя человека, а возвращать его пол, пытаясь угадать по имени (null - если угадать не удалось). Вам придется самостоятельно найти нужные вам строковые функции. Начните с написания тестов для функции. </h1>

<?php


function gender ($name) {
    $name = mb_strtolower($name);
    if ($name == 'женя' ||  $name == 'саша') {
        return null;
    }

    // набор гласных букв характерных для женских имен
    $femaleLetters = 'аяи';
    $femaleSearch = (strspn($name, $femaleLetters, -1));

     if ($femaleSearch == 1) {
        if ($name == 'паша' ||  $name == 'миша' ||  $name == 'витя' /*и так далее, в идеале использовать массив*/){
            return 'm';
        }
        return 'f';
    } elseif ($femaleSearch == 0) {
        return 'm';
    }
}

assert('m' == gender('Иван'));
assert('m' == gender('Сергей'));
assert('m' == gender('Дмитрий'));
assert('f' == gender('Лиза'));
assert('f' == gender('Светлана'));
assert('f' == gender('Анна'));
assert(null == gender('женя'));
assert(null == gender('Саша'));
assert('m' == gender('витя'));
assert('m' == gender('Миша'));

?>

</body>
</html>