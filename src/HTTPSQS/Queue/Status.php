<?php
namespace HTTPSQS\Queue;

class Status
{
    public static $HTTPSQS_PUT_END = 'HTTPSQS_PUT_END';
    public static $HTTPSQS_GET_END = 'HTTPSQS_GET_END';
    public static $HTTPSQS_PUT_OK = 'HTTPSQS_PUT_OK';
    public static $HTTPSQS_RESET_OK = 'HTTPSQS_RESET_OK';
    public static $HTTPSQS_MAXQUEUE_OK = 'HTTPSQS_MAXQUEUE_OK';
    public static $HTTPSQS_ERROR = 'HTTPSQS_ERROR';
}