<?php
include "index.html";
include "helper.php";

if (!isset($_REQUEST['url'])|| !isset($_REQUEST['type'])) return;

$url = $_REQUEST['url'];
$type = $_REQUEST['type'];

if (filter_var($url, FILTER_VALIDATE_IP)) $ip = $url;
else $ip = getIP($url);

if ($ip)
    switch ($type):
        case "p": checkPing($ip); break;
        case "t": checkTraceroute($ip); break;
        endswitch;
else echo "Данный ip address не существует";
