<?php namespace App\Util;

class EnviromentHelper
{
    public static function isLive()
    {
        return strtolower(env('APP_ENV')) === 'live';
    }
    public static function isLocal()
    {
        return strtolower(env('APP_ENV')) === 'local';
    }
}