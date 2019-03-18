<?php
require "ht4.html";
if (isset($_REQUEST['area1'])):
$allStr = $_REQUEST['area1'];

$arr = explode(PHP_EOL, $allStr);
$sumOfInt = 0;
$intarr = [];
foreach ($arr as &$str):
    $i = 0;
    $int = 0;
    while ( is_numeric(substr(trim($str), $i-1))):
        $i--;
        $int = substr(trim($str), $i);
    endwhile;
    $str = trim($str, "1234567890 \t\n\r\0\x0B");
    $intarr[] = $int;
    $sumOfInt += $int;
endforeach;
$probarr = [];
foreach ($intarr as $item){
    if ($sumOfInt):
        $probarr[] = $item/$sumOfInt;
    else: $probarr[] = $item/1;
    endif;
}
$data = [];
for($i = 0; $i<count($arr); $i++){
    $data[] = [
        "text" => $arr[$i],
        "weight" => $intarr[$i],
        "probability" => $probarr[$i]
    ];
}
$firstjson = [
    "sum" => $sumOfInt,
    "data" => $data
];

print_r(json_encode($firstjson, JSON_UNESCAPED_UNICODE));
include "ht4_1.php";
echo "\n<br>";
echo "\n<br>";
check($arr, $probarr);
endif;