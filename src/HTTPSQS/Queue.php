<?php 
namespace HTTPSQS;

use Exception\InvalidQueueNameException;
use Exception\InvalidDataException;
use Exception\InvalidPositionException;
use Exception\InvalidLengthException;
use Queue\Status;
use Queue\Options;
use Http\Get;
use Http\Post;

class Queue
{
    private $name = '';
    private $host = '127.0.0.1';
    private $port = 1218;
    private $charset = 'utf-8';
    private $url = '';

	public function __construct(
        $queue_name = '',
        $host = '127.0.0.1', 
        $port = 1218, 
        $charset = 'utf-8'
    ) {
        if (!$queue_name) {
            throw new InvalidQueueNameException();
        } else {
            $this->name = $queue_name;
            $this->host = $host;
            $this->port = $port;
            $this->charset = $charset;
            $this->url = $this->host.':'.$this->port.'?charset='.$this->charset.'&name='.$this->name.'&opt=';
        }
    }

    public function push($data)
    {
        if (!is_string($data)) {
            throw new InvalidDataException();
        } else {
            $result = Post::fetch($this->url.Options::$PUT, $data);
            if ($result["data"] === Status::$HTTPSQS_PUT_OK) {
                return true;
            } elseif ($result["data"] === Status::$HTTPSQS_PUT_END) {
                return $result["data"];
            } else {
                return false;
            }
        }
    }

    public function shift()
    {
        $result = $this->item();
        if ($result !== false) {
            return $result["data"];
        } else {
            return false;
        }
    }

    public function item()
    {
        $result = Get::fetch($this->url.Options::$GET);
        if ($result["data"] == Status::HTTPSQS_ERROR or $result["data"] == false) {
            return false;
        }
        return $result;
    }

    public function status()
    {
        $result = Get::fetch($this->url.Options::$STATUS);
        if ($result["data"] == Status::HTTPSQS_ERROR or $result["data"] == false) {
            return false;
        }
        return $result["data"];
    }

    public function view($position)
    {
        if (!is_int($position)) {
            throw new InvalidPositionException();
        } else {
            $result = Get::fetch($this->url.Options::$VIEW.'&pos='.$position);
            if ($result["data"] == Status::HTTPSQS_ERROR or $result["data"] == false) {
                return false;
            }
            return $result["data"];
        }
    }

    public function reset()
    {
        $result = Get::fetch($this->url.Options::$RESET);
        if ($result["data"] == Status::HTTPSQS_RESET_OK) {
            return true;
        }
        return false;
    }

    public function maxQueue($length)
    {
        if (!is_int($length)) {
            throw new Exception("Queue Length must be int!");
        } else {
            $result = Get::fetch($this->url.Options::$MAX_QUEUE.'&num='.$length);
            if ($result["data"] == Status::HTTPSQS_MAXQUEUE_OK) {
                return true;
            }
            return false;
        }
    }

}