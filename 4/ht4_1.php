<?php
function xrange($textarr, $intarr, $sum, $count) {
    $a = 0;
    while ($a<$count) {
        $a++;
        $rand = rand(1, $sum);
        $rum = 0;
        $jkj = 1;
        foreach ($intarr as $key => $item) {
            if ($jkj){
                $rum+=$item;
                if ($rum >= $rand  ) {
                    $jkj = 0;
                    yield $textarr[$key];
                }
            }
        }
    }
}



function check($textarr, $intarr){
    if (!isset($textarr) || isset($intarr)) return;
    $realLife = [];
    $count = 10000;
    for($i=0; $i<count($intarr); $i++){
        for($j=$i+1; $j<count($intarr); $j++){
            if($intarr[$i]>$intarr[$j]){
                $temp = $intarr[$j];
                $intarr[$j] = $intarr[$i];
                $intarr[$i] = $temp;

                $temp = $textarr[$j];
                $textarr[$j] = $textarr[$i];
                $textarr[$i] = $temp;
            }
        }
    }
    foreach ($textarr as $item){
        $realLife[$item] = 0;
    }
    $newSum = 0;
    foreach ($intarr as &$integer){
        $integer = round($integer*100);
        $newSum += $integer;
    }
    foreach (xrange($textarr, $intarr, $newSum,$count) as $item){
        foreach ($textarr as $value){
            if ($item == $value){
                $realLife[$item]++;
                break;
            }
        }
    }
    for($i = 0; $i<count($textarr); $i++){
        $data[] = [
            "text" => $textarr[$i],
            "count" => $realLife[$textarr[$i]]/$count,
            "probability" => $intarr[$i]/100
        ];
    }


    print_r(json_encode($data, JSON_UNESCAPED_UNICODE));
}