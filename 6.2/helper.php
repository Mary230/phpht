<?php
function firstRule(string $value){
    $value = mb_strtolower($value);
    try {
        if (preg_match('/up|1|true|yes|\+/m', $value)) {
            return "+";
        }
        if (preg_match('/0|null|false|no|down|-/m', $value)) {
            return "-";
        }
        throw new Exception("Ошибка параметра один");

    }catch (Exception $e){
        echo "Ошибка: ", $e->getMessage(), "\n";
        return false;
    }
}

function secondRule(string $value){
    try {
        if ($value=="+"){
            return "+";
        }
        elseif ($value=="-"){
            return "-";
        }
        throw new Exception("Ошибка параметра два");

    }catch (Exception $e){
        echo "Ошибка: ", $e->getMessage(), "\n";
        return false;
    }
}

function thirdRule(string $value )
{
    try {
        if (strlen($value) == 1) {
            return $value;
        }
        throw new Exception("Ошибка параметра два");

    } catch (Exception $e) {
        echo "Ошибка: ", $e->getMessage(), "\n";
        return false;
    }
}