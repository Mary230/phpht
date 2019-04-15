<?php
require_once "Logger.php";

class FileLogger extends Logger{

    private $filename;
    private $handler;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->handler = fopen($filename,'a');
    }

    function write(string $str){
        fwrite($this->handler, $str."\n");
    }

    public function __destruct()
    {
        fclose($this->handler);
    }
}