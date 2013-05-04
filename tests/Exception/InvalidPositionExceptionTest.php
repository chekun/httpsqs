<?php
use HTTPSQS\Exception\InvalidPositionException;

class InvalidPositionExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException HTTPSQS\Exception\InvalidPositionException
     */
    public function testInvalidLengthException()
    {
        throw new InvalidPositionException();
    }
}
