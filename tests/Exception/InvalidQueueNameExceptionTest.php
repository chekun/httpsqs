<?php
use HTTPSQS\Exception\InvalidQueueNameException;

class InvalidQueueNameExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException HTTPSQS\Exception\InvalidQueueNameException
     */
    public function testInvalidQueueNameException()
    {
        throw new InvalidQueueNameException();
    }
}
