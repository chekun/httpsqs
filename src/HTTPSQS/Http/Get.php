<?php 
namespace HTTPSQS\Http;

use HTTPSQS\Http\Context;

class Get
{

    public static function request($url)
    {
        return file_get_contents($url, 0, Context::makeGet());
    }

}