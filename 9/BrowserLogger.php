<?php
include "AbstractLogger.php";

class BrowserLogger extends AbstractLogger
{
    public $setting;

    /**
     * BrowserLogger constructor.
     * @param $setting
     */
    public function __construct(string $setting)
    {
        $this->setting = $setting;
    }


    function write(string $str)
    {
        $dateTime = new DateTime();
        switch ($this->setting):
            case "d": echo date("j F o", $dateTime->getTimestamp()); break;
            case "t": echo date("h:i",$dateTime->getTimestamp()); break;
            case "o": echo date("r", $dateTime->getTimestamp()); break;
        endswitch;
        echo "<br>\n".$str;
    }
}