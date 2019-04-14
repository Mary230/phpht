
<?php
include "index.html";
include "helper.php";
if (!isset($_REQUEST['month'])) $month = "now";
else $month = $_REQUEST['month'];

$fileArr = file("month.txt");
$fileArr = explode(",", $fileArr[0]);

if ($month == "now") {
    $dateTime = new DateTime();
    $dateTime->setDate(date("o", $dateTime->getTimestamp()),
        date("n", $dateTime->getTimestamp()),1);}
else $dateTime = mySetDate($fileArr,$month);

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
            echo date("j", $date->getTimestamp())."</td>";
            $num ++;
            if (!($num%7)) echo "</tr>";
        }
?>
    </table>
