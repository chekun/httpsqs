<?php 
namespace HTTPSQS;

use HTTPSQS\Exception\InvalidQueueNameException;
use HTTPSQS\Exception\InvalidDataException;
use HTTPSQS\Exception\InvalidPositionException;
use HTTPSQS\Exception\InvalidLengthException;
use HTTPSQS\Queue\Status;
use HTTPSQS\Queue\Options;
use HTTPSQS\Http\Get;
use HTTPSQS\Http\Post;

class Queue
{
    private $name = '';
    private $host = '127.0.0.1';
    private $port = 1218;
    private $charset = 'utf-8';
    private $url = '';
    private $auth = '';

    public function __construct(
        $queueName = '',
        $host = '127.0.0.1', 
        $port = 1218, 
        $auth = '',
        $charset = 'utf-8'
    ) {
        if (!$queueName) {
            throw new InvalidQueueNameException();
        } else {
            $this->name = $queueName;
            $this->host = $host;
            $this->port = $port;
            $this->charset = $charset;
            $this->auth = $auth;
            $this->url = 'http://'.$this->host.':'.$this->port.'?auth='.$this->auth.'&charset='.$this->charset.'&name='.$this->name.'&opt=';
        }
    }

    public function push($data)
    {
        if (!is_string($data)) {
            throw new InvalidDataException();
        } else {
            $result = Post::request($this->url.Options::PUT, $data);
            if ($result === Status::HTTPSQS_PUT_OK) {
                return true;
            } elseif ($result === Status::HTTPSQS_PUT_END) {
                return Status::HTTPSQS_PUT_END;
            } else {
                return false;
            }
        }
    }

    public function shift()
    {
        $result = Get::request($this->url.Options::GET);
        if ($result == Status::HTTPSQS_ERROR or $result == false) {
            return false;
        }
        return $result;
    }

    public function status()
    {
        $result = Get::request($this->url.Options::STATUS);
        if ($result == Status::HTTPSQS_ERROR or $result == false) {
            return false;
        }
        return $result;
    }

    public function view($position)
    {
        if (!is_int($position)) {
            throw new InvalidPositionException();
        } else {
            $result = Get::request($this->url.Options::VIEW.'&pos='.$position);
            if ($result == Status::HTTPSQS_ERROR or $result == false) {
                return false;
            }
            return $result;
        }
    }

    public function reset()
    {
        $result = Get::request($this->url.Options::RESET);
        if ($result == Status::HTTPSQS_RESET_OK) {
            return true;
        }
        return false;
    }

    public function maxQueue($length)
    {
        if (!is_int($length)) {
            throw new Exception("Queue Length must be int!");
        } else {
            $result = Get::request($this->url.Options::MAX_QUEUE.'&num='.$length);
            if ($result == Status::HTTPSQS_MAXQUEUE_OK) {
                return true;
            }
            return false;
        }
    }

}
