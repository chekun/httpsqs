<?php
namespace HTTPSQS\Queue;

class Status
{
    const HTTPSQS_PUT_END = 'HTTPSQS_PUT_END';
    const HTTPSQS_GET_END = 'HTTPSQS_GET_END';
    const HTTPSQS_PUT_OK = 'HTTPSQS_PUT_OK';
    const HTTPSQS_RESET_OK = 'HTTPSQS_RESET_OK';
    const HTTPSQS_MAXQUEUE_OK = 'HTTPSQS_MAXQUEUE_OK';
    const HTTPSQS_ERROR = 'HTTPSQS_ERROR';
}