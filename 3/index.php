<?php
/**
 * Created by PhpStorm.
 * User: bmacha
 * Date: 2019-03-04
 * Time: 17:29
 */
require 'ht2.html';
if(isset($_REQUEST['area1'])) {
    $allStr = $_REQUEST['area1'];

    $arr = explode(PHP_EOL, $allStr);


    $count = count($arr);

    for ($i = 0; $i < $count; $i++) {
        $shuf = explode(" ", $arr[$i]);
        shuffle($shuf);
        $arr[] = implode(" ", $shuf);
    }

    uasort($arr, function ($val1, $val2) {
        if (count(explode(" ", $val1)) > 1 && count(explode(" ", $val2)) > 1) {
            return explode(" ", $val1)[1] <=> explode(" ", $val2)[1];
        } else if (count(explode(" ", $val1)) == count(explode(" ", $val2))) {
            return explode(" ", $val1)[0] <=> explode(" ", $val2)[0];
        } else {
            return count(explode(" ", $val1)) <=> count(explode(" ", $val2));
        }
    });

    foreach ($arr as $a) {
        echo $a . "\n</br>";
    }
}
