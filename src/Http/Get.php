<?php 
namespace HTTPSQS\Http;

use Context;

class Get
{

    public static function fetch($url)
    {
        return file_get_contents($url, 0, new Context());
    }

}