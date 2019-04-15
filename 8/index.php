<?php
include "helper.php";
if (!isset($_REQUEST['month'])) $month = "now";
else $month = $_REQUEST['month'];
$fileArr = file_get_contents("month.txt");
$fileArr = explode(",", trim($fileArr));
if ($month == "now") {
    $dateTime = new DateTime();
    $dateTime->setDate(date("o", $dateTime->getTimestamp()),
        date("n", $dateTime->getTimestamp()),1);}
else $dateTime = mySetDate($fileArr,$month);
$today = new DateTime();
$num = 0;
$wed = 0;
$begin = $dateTime;
$year = date("o", $dateTime->getTimestamp());
$m = date("n", $dateTime->getTimestamp());
$d = date("t", $dateTime->getTimestamp());
$end = new DateTime();
$end->setDate($year,$m,$d);
$end = $end->modify( '+1 day' );
$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval ,$end);
$non = addEl($dateTime);
?>
<link rel="stylesheet" href="myCss.css">
<form method="get" action="index.php">
    <label for="mon">Выберите месяц</label>
    <select name="month" id="mon">
        <option value="now">now</option>
<?php
    foreach ($fileArr as $item){
        echo "<option value = \"";
        echo $item;
        echo "\">";
        echo $item;
        echo "</option>";
    }
 ?>
    </select>
    <input type="submit" value="OK">
</form>

<h3><?php echo date("F", $dateTime->getTimestamp()) ?></h3>
<table style="">
    <tr >
        <td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td>
    </tr>
    <?php
    foreach ($non as $item){
        if (!($num%7)) echo "<tr>";
        if ($num==5||$num==6){
            echo "<td style='color: red'> </td>";
        }
        else
            echo "<td> </td>";
        $num ++;
        if (!($num%7)) echo "</tr>";
    }
    foreach($daterange as $date){
        if (!($num%7)) echo "<tr>";
        if (date("w",$date->getTimestamp()) == 0 || date("w",$date->getTimestamp()) == 6){
            echo "<td style='color: red'>";
        }
        else
            echo "<td>";
        if (date("m", $date->getTimestamp())==date("m", $today->getTimestamp()) &&
            date("d", $date->getTimestamp())==date("d", $today->getTimestamp())){
            echo "<b>".date("j", $date->getTimestamp())."</b></td>";
        }
        else
            echo date("j", $date->getTimestamp())."</td>";
        $num ++;
        if (!($num%7)) echo "</tr>";
    }
    ?>
</table>