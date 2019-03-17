<?php
require 'ht2.html';
$oldStr = $_REQUEST['area1'];

function changeStr(string $string) : string
{   $newStr = '';
    $gen = gen($string);
    foreach ($gen as $char){
        $newStr = $newStr.$char;
    }
    echo $gen->getReturn();
    return $newStr;
}

function gen(string $string){
    static $count = 0;
    $strarray = str_split($string);
    for ($i = 0; $i<count($strarray); $i++){
        if ($strarray[$i] == 'l'): yield 1; $count++;
            elseif ($strarray[$i] == 'h'): yield 4; $count++;
            elseif ($strarray[$i] == 'e'): yield 3;$count++;
            elseif ($strarray[$i] == 'o'): yield 0;$count++;
            else: yield $strarray[$i];
        endif;
    }
    return 'колличество замен: '.$count."\n<br>";
}
echo changeStr($oldStr);