<?php
function mySetDate(array $fromTxt, string $mon) : DateTime{
    $myDate = new DateTime();
    $i = 1;
    foreach ($fromTxt as $month){
        if ($mon == $month) return $myDate -> setDate(date("o", $myDate -> getTimestamp()),$i,1);
        else $i++;
    }
    return new DateTime();
}

function addEl(DateTime $myDate) : array {
    $i = date("w", $myDate->getTimestamp())-1;
    $arr = [];
    if ($i == -1) $i = 6;
    $k = 0;
    while ($k<$i){
        $arr[] = "";
        $k++;
    }
    return $arr;
}