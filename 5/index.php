<?php
include "ht5.html";

if (!isset($_REQUEST['password'])) return;

$password = $_REQUEST['password'];
//$password = "aaaAA89*&*";
if (strlen($password)<10){
    echo "<p class= \"warning\">Ваш пароль должен содержать более 10 символов";
    return;
}
$int = '/[0-9]{2,}/m';
$small = '/[a-z]{2,}/m';
$big = '/[A-Z]{2,}/m';
$chars = '/[%$#_*]{2,}/m';

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
for ($i = 0; $i<strlen($password); $i++){
    $char = $password[$i];
    $count = 1;
    for ($j = $i+1; $j<strlen($password); $j++){
        if (gettype($char) == gettype($password[$j])){
            $count ++;
            if ($count == 4){
                if (preg_match('/[0-9]/m', $char))echo "<p class= \"warning\">Ваш пароль не должен содержать более трех цифр подряд";
                if (preg_match('/[a-z]/m', $char))echo "<p class= \"warning\">Ваш пароль не должен содержать более трех букв нижнего регистра подряд";
                if (preg_match('/[A-Z]/m', $char))echo "<p class= \"warning\">Ваш пароль не должен содержать более трех букв верхнего регистра подряд";
                if (preg_match('/[%$#_*]/m', $char))echo "<p class= \"warning\">Ваш пароль не должен содержать более трех специальных символов подряд";
                return;
            }
        }
    }
}

echo "Cool";