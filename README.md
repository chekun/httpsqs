# php wrapper for [httpsqs](http://code.google.com/p/httpsqs/)

# How to use

```php
<?php
    $queue = new HTTPSQS\Queue('queue_name');
    //enqueue
    $queue->push('data');
    //dequeue
    echo $queue->shift();
    //view queue status
    echo $queue->status();
    //view specific position 
    echo $queue->view($position = 1);
    //reset queue
    $queue->reset();
    //set queue max length
    $queue->maxQueue($length = 10000);
```