<?php
include 'simple_html_dom.php';
$html = file_get_html('http://mkuksa.ru/slimes/');
$names = array();
$refs = array();
$money = array();
$images = array();
$a = 0;
foreach ($html->find("ul.list-unstyled li a")as $item){
    $a++;
    $url = $item->href;
    echo "Ссылка: ".$url."\n";
    $html1 = file_get_html($url);
    foreach ($html1->find('div.caption a')as $value){
        $refs[] = $value->href;
        $names[] = str_replace('&quot;', "'", $value->plaintext);
    }
    foreach ($html1->find('div.image a')as $value) {
        $images[] = $value->href;
    }
    foreach ($html1->find('div.caption p')as $value){
        $money[] = stristr($value->plaintext, ".", TRUE);
    }
}
for ($i = 0; $i < count($names); $i++) {
    echo "Name: ".$names[$i]." |  Ref:".$refs[$i]."  |  Img:".$images[$i]."  |  Price:".$money[$i];
    echo "\n";
}
echo "Общее колличество товаров: ".count($names);
echo $a;