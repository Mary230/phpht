<form action="index.php">
    <textarea name="area1" value=""></textarea><br />
    <input type="text" name="area2" value=""><br />
    <input type="submit" value="Нажмите кнопку">
</form>
<?php

if (isset($_REQUEST['area1'])):
    $source = $_REQUEST['area1'];
    $source = str_split($source);
endif;
if (isset($_REQUEST['area2'])):
    $sek = $_REQUEST['area2'];
    $sek = str_split($sek);
endif;
$values = [];
$now = 0;
$circle = 0;
$newArr = [];
$seki = 0;
if (isset($source)):
    for ($i = 0; $i < count($source); ++$i):
        switch ($source[$i]):
            case "." :
                $newArr[] = chr($values[$now]);
                break;
            case "," :
                $values[$now] = ord($sek[$seki]);
                $seki++;
                break;
            case "+" :
                if (isset($values[$now])):
                    $values[$now]++;
                else :
                    $values[$now]=0;
                    $values[$now]++;
                endif;
                break;
            case "-" :
                $values[$now]--;
                break;
            case ">" :
                $now++;
                if (isset($values[$now]) != true):
                    $values[$now] = 0;
                endif;
                break;
            case "<" :
                $now--;
                if (isset($values[$now]) != true):
                    $values[$now] = 0;
                endif;
                break;
            case "[" :
                if ($values[$now] == 0):
                    $circle++;
                    while ($circle):
                        $i++;
                        switch ($source[$i]):
                            case "[" :
                                $circle++;
                                break;
                            case "]" :
                                $circle--;
                                break;
                        endswitch;endwhile;endif;
                break;
            case "]" :
                if ($values[$now] != 0):
                    $circle++;
                    while ($circle):
                        $i--;
                        switch ($source[$i]):
                            case "]" :
                                $circle++;
                                break;
                            case "[" :
                                $circle--;
                                break;
                        endswitch;endwhile;endif;
                break;
        endswitch;
    endfor;
endif;
echo implode($newArr);