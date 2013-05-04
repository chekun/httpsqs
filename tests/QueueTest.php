<?php
use HTTPSQS\Queue;

class QueueTest extends PHPUnit_Framework_TestCase
{
    protected $queue = null;

    protected function setUp()
    {
        $this->queue = new Queue('test');
    }

    public function testQueueInstance()
    {
        $this->assertInstanceOf('HTTPSQS\Queue', $this->queue);
    }

    public function testPush()
    {
        $this->assertTrue($this->queue->push('test push'));
    }

    public function testShift()
    {
        $this->assertEquals('test push', $this->queue->shift());
    }

    public function testStatus()
    {
        $this->assertTrue($this->queue->status() !== false);
    }

    public function testReset()
    {
        $this->assertTrue($this->queue->reset());
    }

    public function testView()
    {
        $this->assertTrue($this->queue->push('test push'));
        $this->assertEquals('test push', $this->queue->view(1));
        $this->assertTrue($this->queue->reset());
    }

    public function testMaxQueue()
    {
        $this->assertTrue($this->queue->maxQueue(1000));
    }


}