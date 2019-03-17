<?php
require 'simple_html_dom.php';
$html = file_get_html('http://mkuksa.ru/slimes/');

$names = array();
$refs = array();
$money = array();
$images = array();


foreach ($html->find("ul[class=nav navbar-nav] li a")as $item){
    $url = $item->href;
    $html1 = file_get_html($url);
    if ($url != 'http://mkuksa.ru/slimes/') {
        foreach ($html1->find("div[class=row mini_list] div[class=caption] a") as $value) {
            $refs[] = $value->href;
            $names[] = str_replace('&quot;', "'", $value->plaintext);
        }
        foreach ($html1->find('div[class=image] a') as $value) {
            $images[] = $value->href;
        }
        foreach ($html1->find('div[class=caption] p') as $value) {
            $money[] = stristr($value->plaintext, ".", TRUE);
        }
    }
}
for ($i = 0; $i < count($names); $i++) {
    echo "Name: ".$names[$i]." |  Ref:".$refs[$i]."  |  Img:".$images[$i]."  |  Price:".$money[$i];
    echo "\n";
}
echo "Общее колличество товаров: ".count(($names));

