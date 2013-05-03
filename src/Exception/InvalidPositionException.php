<?php
namespace HTTPSQS\Exception;

class InvalidPositionException extends Exception
{
    public function __construct($message = 'Position Must be Int!')
    {
        parent::__construct($message);
    }
}