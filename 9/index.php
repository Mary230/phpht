<?php
require_once "Logger.php";
require_once "BrowserLogger.php";
require_once "FileLogger.php";

include "index.html";

$type = $_REQUEST["type"];


if (empty($_REQUEST["text"])):
    echo "<p style=\"color:red\">Введите текст</p>";
    return;
endif;

$textArr = explode(PHP_EOL,$_REQUEST["text"]);

/**
 * @var Logger $logger
 */
$logger = null;
if ($type == "file"){
    workWithFile($textArr);
}else workWithBrowser($textArr);


function workWithFile(array $textArr){
    if (empty($_REQUEST["filename"])) :
        echo "<p style=\"color:red\">Введите имя файла</p>";
        return;
    endif;
    $filename = $_REQUEST["filename"];
    $fileLogger = new FileLogger("$filename");
    pleaseWrite($fileLogger,helper($textArr));
}

function workWithBrowser(array $textArr){
    $browserLogger = new BrowserLogger($_REQUEST["setting"]);
    pleaseWrite($browserLogger, helper($textArr));
}

function pleaseWrite(Logger $logger, array $textArr){
    foreach ($textArr as $str) $logger -> write($str);
}


function helper(array $teatArr):array {
    $newTextArr = [];
    $k = 0;
    foreach ($teatArr as $text){
        foreach (str_split($text) as $char){
            if (ctype_upper($char)) {
                $newTextArr[] = "Строка \"".trim($text)."\" содержит заглавные буквы";
                $k = 1;
                break;
            }
        }
            if ($k == 1) {
                $k= 0;
                continue;
            }
            $newTextArr[] = "Строка \"".trim($text)."\" не содержит заглавные буквы";


    }
    return $newTextArr;
}