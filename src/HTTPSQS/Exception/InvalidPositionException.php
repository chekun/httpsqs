<?php
namespace HTTPSQS\Exception;

use Exception;

class InvalidPositionException extends Exception
{
    public function __construct($message = 'Position Must be Int!')
    {
        parent::__construct($message);
    }
}