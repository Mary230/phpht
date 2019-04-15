<?php
include "AbstractLogger.php";

class FileLogger extends AbstractLogger{

    public $filename;
    public $handler;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->handler = fopen($filename,'a');
    }

    function write(string $str){
        fwrite($this->handler, $str);
    }

    public function __destruct()
    {
        fclose($this->handler);
    }
}