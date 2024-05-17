<?php

namespace App\Core;

class Router { 
    public static $urls = [];
    public static function add($url, $method, $callback) {
        if ($url == '/') { $url = ''; }
        self::$urls[strtoupper($method)][$url] = $callback;
        self::$urls['routes'][] = $url;
        self::$urls['routes'] = array_unique(self::$urls['routes']);
    }
    public static function run()
    {
        $url = implode("/", 
        array_filter(
            explode("/", 
                str_replace($_ENV['BASEDIR'], "", 
                    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
                    )
                ), 'strlen'
            )
        );

        if (!in_array($url, self::$urls['routes'])) {
            header('Location: '.$_ENV['BASEURL']);
        }

        $call = self::$urls[$_SERVER['REQUEST_METHOD']][$url];
        $call();
    }
}

?>