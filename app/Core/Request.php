<?php


class Request
{

    public static function uri()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = trim($uri, '/');
        $uri = str_replace('examProjects/php_basics', '', $uri);
       return trim($uri, '/');
    }


    public static function get($key , $defeult = null){
        return $_GET[$key] ?? $_POST[$key] ?? $defeult ;
    }


    public static function method(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}