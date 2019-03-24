<?php
include "helper.php";

$iniArr = parse_ini_file("index.ini", true, INI_SCANNER_NORMAL);
$textArr = file($iniArr["main"]["filename"]);
$int_reg = '/[0-9]/m';
echo "\n";
echo "Преобразованный файл:";
echo "\n\n";
$rules = [];
foreach ($iniArr as $item){
    if (isset($item["symbol"])){
        $rules[] = $item["symbol"];
    }
}

foreach ($textArr as &$str){
    if (strpos($str, $rules[0]."=")===0){
        $value = help($str);
        $str = substr($str, strpos($str, " ")+1);
        $flag = 0;
        try {
            switch ($value):
                case 1:
                case "true":
                case "yes":
                case "+":
                case "up":
                    $str = mb_strtoupper($str);
                    $flag = 1;
                    break;
                case 0:
                case "null":
                case "false":
                case "no":
                case "down":
                    $str = mb_strtolower($str);
                    $flag = 1;
                    break;

            endswitch;
            if (!$flag) {
                throw new Exception("Ошибка параметра");
            }
        }
        catch (Exception $e){
            echo "Ошибка: ", $e->getMessage(), "\n";
        }
    }
    if (strpos($str, $rules[1]."=")===0) {
        $value = help($str);
        $str = substr($str, strpos($str, " ")+1);
        $flag = 0;
        $newstr = str_split($str);
        try {
            switch ($value):
                case "+":
                    foreach ($newstr as &$second) {
                        if (preg_match($int_reg, $second)) {
                            if ($second == 9) {
                                $second = 0;
                            } else $second++;
                        }
                    };
                    $flag = 1;
                    break;
                case "-" :
                    foreach ($newstr as &$second) {
                        if (preg_match($int_reg, $second)) {
                            if ($second == 0) {
                                $second = 9;
                            } else $second--;
                        }
                    };
                    $flag = 1;
                    break;
            endswitch;
            if (!$flag) {
                throw new Exception("Ошибка параметра");
            }
        }catch (Exception $exception){
            echo "Ошибка: ", $e->getMessage(), "\n";
        }
        $str = implode($newstr);
    }
    if (strpos($str, $rules[2]."=")===0) {
        $value = help($str);
        $str = substr($str, strpos($str, " ")+1);
        $flag = 0;
        $str = explode($value, $str);
        $str = implode($str);
    }
}
foreach ($textArr as $value){
    echo $value;
}
echo "\n\n";