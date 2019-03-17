
<form action="ht1_2.php">
    <textarea type="text" name="area1" value=""></textarea><br />
    <input type="text" name="area2" value=""><br />
    <input type="submit" value="Нажмите кнопку">
</form>


<?php
//echo $_REQUEST['area1'];
$str = $_REQUEST['area1'];
$values = $_REQUEST['area2'];

$array__str = str_split($str);
$array_val = str_split($values);
$newStr = "";
$k = -1;
$nowElem = $array_val[0];
$s = 0;

for ($i = 0; $i < count($array__str); $i++){
    if ($array__str[$i] == '[' && $nowElem == 0){
        $i = stripos($str, ']', $i);
    }
    switch ($array__str[$i]):
        case ',':
            {
                ++$k;
                $nowElem = ord($array_val[$k]);
                echo $nowElem."\n";
            } break;
        case '.':{
            $array_val[] = chr($nowElem);
            $newStr = $newStr.chr($nowElem);
        }
            break;
        case '>':
            {
                ++$k;
                $nowElem = ord($array_val[$k]);
            } break;
        case '<':
            {
                --$k;
                $nowElem = ord($array_val[$k]);
            } break;
        case '[':
            {
                $s = $i;
            } break;
        case ']':
            {
                if ($nowElem != 0){
                    $i = $s;
                }
            } break;
            case '+': {
                $nowElem++;;
            }break;
    endswitch;
}
echo $nowElem;
?>
