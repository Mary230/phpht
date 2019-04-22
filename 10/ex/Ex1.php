<?php

namespace ex;
use Exception;

class Ex1 extends Exception
{

    /**
     * ex1 constructor.
     */
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function myFunc() {
        echo "Сработал первый выброс\n";
    }
}