<?php
include "helper.php";

$iniArr = parse_ini_file("index.ini", true, INI_SCANNER_NORMAL);
$textArr = file($iniArr["main"]["filename"]);
$int_reg = '/[0-9]/m';

echo "\n";
echo "Преобразованный файл:";
echo "\n\n";
$symbols = [];
foreach ($iniArr as $item):
    if (isset($item["symbol"])):
        $symbols[] = $item["symbol"];
    endif;
endforeach;
$rules = [];
$rules[] = firstRule($iniArr["first_rule"]["upper"]);
$rules[] = secondRule($iniArr["second_rule"]["direction"]);
$rules[] = thirdRule($iniArr["third_rule"]["delete"]);

foreach ($textArr as &$str):

    if (strpos($str, $symbols[0])===0):
        $str = substr($str, strpos($str, " ")+1);
        if ($rules[0]=="+"):
            $str = mb_strtoupper($str);
        elseif($rules[0]=="-"): $str = mb_strtolower($str);
        endif;
    endif;

    if (strpos($str, $symbols[1])===0) :
        $str = substr($str, strpos($str, " ")+1);
        $newstr = str_split($str);
            switch ($rules[1]):
                case "+":
                    foreach ($newstr as &$second) :
                        if (preg_match($int_reg, $second)) :
                            if ($second == 9) : $second = 0;
                            else : $second++;
                            endif;
                        endif;
                    endforeach;
                    break;
                case "-" :
                    foreach ($newstr as &$second) :
                        if (preg_match($int_reg, $second)) :
                            if ($second == 0) : $second = 9;
                            else : $second--;
                            endif;
                        endif;
                    endforeach;

                    break;
            endswitch;
        $str = implode($newstr);
    endif;

    if (strpos($str, $symbols[2])===0) :
        $str = substr($str, strpos($str, " ")+1);
        if ($rules[2]!==false){
            $str = substr($str, strpos($str, " ")+1);
            $str = explode($rules[2], $str);
            $str = implode($str);
        }
    endif;
endforeach;
foreach ($textArr as $value):
    echo $value;
endforeach;
echo "\n\n";