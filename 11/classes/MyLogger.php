<?php

namespace classes;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use classes\Helper;

class MyLogger extends AbstractLogger implements LoggerInterface
{

    private $helper;
    private $handler;
    private $filename;

    /**
     * MyLogger constructor.
     * @param $fileName
     */
    public function __construct(string $fileName)
    {
        $this->helper = new Helper();
        $this->handler = fopen($fileName,'a');
        $this->filename = $fileName;
    }


    public function log($level, $message, array $context = array())
    {
        $s = file_get_contents($this->filename);
        $size = sizeof(file($this->filename));
        if(substr(trim($s),-1,1)==']')
        {
            file_put_contents('text.txt',substr(trim($s),0,-1));
        }
        if ($size>2) fwrite($this->handler, ",".PHP_EOL);
//        fwrite($this->handler, "\"log\" : ");

        fwrite($this->handler, json_encode([
            "level" => $level,
            "date" => $this->helper->getDate(),
            "message" => $message
        ], JSON_UNESCAPED_UNICODE));


        fwrite($this->handler, PHP_EOL."]");
    }

    public function __destruct()
    {
        fclose($this->handler);
    }
}