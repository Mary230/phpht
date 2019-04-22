<?php
use \first\myClass;
use \ex\Ex1;
use \ex\Ex2;
use \ex\Ex3;
use \ex\Ex4;
use \ex\Ex5;

spl_autoload_register(function ($class) {
    $str = str_replace("\\", "/", $class);
    include_once __DIR__."/".$str . '.php';
});



$myClass = new myClass();

for ($i = 1; $i<5; $i++){
    $fname = "f".$i;
    $m = rand(-100,100);
    try {
        echo "\n".$m."\n";
        $myClass->$fname($m);
    } catch (Ex5 $exception){
        echo $exception->getMessage()."\n";
        $exception->myFunc();
    }   catch (Ex4 $exception){
        echo $exception->getMessage()."\n";
        $exception->myFunc();
    }   catch (Ex3 $exception){
        echo $exception->getMessage()."\n";
        $exception->myFunc();
    }   catch (Ex2 $exception){
        echo $exception->getMessage()."\n";
        $exception->myFunc();
    }   catch (Ex1 $exception){
        echo $exception->getMessage()."\n";
        $exception->myFunc();
    }
}





