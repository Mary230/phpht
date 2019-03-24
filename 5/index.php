<?php
include "ht5.html";

if (!isset($_REQUEST['password'])) return;

$password = $_REQUEST['password'];
if (strlen($password)<10){
    echo "<p class= \"warning\">Ваш пароль должен содержать более 10 символов";
    return;
}
$int = '/(?=[0-9]).+(?=[0-9])/m';
$small = '/(?=[a-z]).+(?=[a-z])/m';
$big = '/(?=[A-Z]).+(?=[A-Z])/m';
$chars = '/(?=[%\$#_\*]).+(?=[%\$#_\*])/m';

if (preg_match('/[^a-zA-Z0-9%\$#_\*]/m',$password)){
    echo "<p class= \"warning\">Ваш пароль должен содержит недопустимые символы";
    return;
}

if (!preg_match($int, $password)){
    echo "<p class= \"warning\">Ваш пароль должен содержать как минимум 2 цифры";
    return;
}
if (!preg_match($small, $password)){
    echo "<p class= \"warning\">Ваш пароль должен содержать как минимум 2 строчные буквы";
    return;
}
if (!preg_match($big, $password)){
    echo "<p class= \"warning\">Ваш пароль должен содержать как минимум 2 заглавные буквы";
    return;
}
if (!preg_match($chars, $password)){
    echo "<p class= \"warning\"> Ваш пароль должен содержать как минимум 2 символы %$#_*";
    return;
}

$char = 0;

if (preg_match('/(?=[0-9]{4,})/m', $password)){
    echo "<p class= \"warning\">Ваш пароль не должен содержать более трех цифр подряд";
    return;
}
if (preg_match('/(?=[a-z]{4,})/m', $password)){
    echo "<p class= \"warning\">Ваш пароль не должен содержать более трех букв нижнего регистра подряд";
    return;
}
if (preg_match('/(?=[A-Z]{4,})/m', $password)){
    echo "<p class= \"warning\">Ваш пароль не должен содержать более трех букв верхнего регистра подряд";
    return;
}
if (preg_match('/(?=[%$#_*]{4,})/m', $password)){
    echo "<p class= \"warning\">Ваш пароль не должен содержать более трех специальных символов подряд";
    return;
}
echo "Cool";