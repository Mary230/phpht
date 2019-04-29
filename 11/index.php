<?php

use classes\MyLogger;
spl_autoload_register(function ($class) {
    $str = str_replace("\\", "/", $class);
    include_once __DIR__."/".$str . '.php';
});
require_once "../vendor/autoload.php";


$logger = new MyLogger("text.txt");

$logger->log(E_ERROR, "Error");
