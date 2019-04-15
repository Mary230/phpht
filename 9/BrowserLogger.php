<?php
require_once "Logger.php";

class BrowserLogger extends Logger
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
        date_default_timezone_set ( "Europe/Moscow" );
        $dateTime = new DateTime();
        switch ($this->setting):
            case "d": echo date("j F o h:i", $dateTime->getTimestamp()); break;
            case "t": echo date("h:i",$dateTime->getTimestamp()); break;
        endswitch;
        echo "      ".$str."<br>";
    }
}