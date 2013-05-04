<?php
namespace HTTPSQS\Exception;

use Exception;

class InvalidLengthException extends Exception
{
    public function __construct($message = 'Queue Length Must be Int!')
    {
        parent::__construct($message);
    }
}