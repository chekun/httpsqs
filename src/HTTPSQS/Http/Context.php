<?php 
namespace HTTPSQS\Http;

class Context
{
    public function __construct($method = 'GET', $timeout = 1)
    {
        return stream_context_create(
            array(   
                'http' => array(   
                    'timeout' => $timeout,
                    'method' => $method
                )
            )
        );
    }
}