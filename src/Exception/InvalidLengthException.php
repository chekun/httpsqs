<?php
namespace HTTPSQS\Exception;

class InvalidLengthException extends Exception
{
    public function __construct($message = 'Queue Length Must be Int!')
    {
        parent::__construct($message);
    }
}