<?php


function help(string $str){
    $value = stristr($str, " ", true);
    $value = stristr($value, "=", false);
    $value = substr($value, 1);
    return $value;
}
