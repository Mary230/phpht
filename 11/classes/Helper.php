<?php

namespace classes;

use DateTime;

class Helper
{

    public $dateFormat = DateTime::RFC2822;

    public function getDate()
    {
        return (new DateTime())->format($this->dateFormat);
    }

}