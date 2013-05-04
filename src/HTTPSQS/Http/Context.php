<?php 
namespace HTTPSQS\Http;

class Context
{
    public static function makeGet($timeout = 1)
    {
        return stream_context_create(
            array(   
                'http' => array(   
                    'timeout' => $timeout,
                    'method' => 'GET'
                )
            )
        );
    }

    public static function makePost($params = array(), $timeout = 1)
    {
        return stream_context_create(
            array(   
                'http' => array(   
                    'timeout' => $timeout,
                    'method' => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => is_array($params) ? http_build_query($params) : $params
                )
            )
        );
    }
}