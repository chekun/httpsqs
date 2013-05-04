<?php 
namespace HTTPSQS\Http;

use HTTPSQS\Http\Context;

class Post
{

    public static function request($url, $data = array())
    {
        return file_get_contents($url, 0, Context::makePost($data));
    }

}