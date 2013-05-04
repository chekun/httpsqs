<?php
namespace HTTPSQS\Exception;

use Exception;

class InvalidQueueNameException extends Exception
{
    public function __construct($message = 'Invalid Queue Name')
    {
        parent::__construct($message);
    }
}