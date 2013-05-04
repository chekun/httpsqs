<?php
use HTTPSQS\Exception\InvalidLengthException;

class InvalidLengthExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException HTTPSQS\Exception\InvalidLengthException
     */
    public function testInvalidLengthException()
    {
        throw new InvalidLengthException();
    }
}
