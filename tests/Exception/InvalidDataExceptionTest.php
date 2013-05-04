<?php
use HTTPSQS\Exception\InvalidDataException;

class InvalidDataExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException HTTPSQS\Exception\InvalidDataException
     */
    public function testInvalidDataException()
    {
        throw new InvalidDataException();
    }
}
