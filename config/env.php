<?php

namespace Config;

use Dotenv\Dotenv;

class Env
{
    public static function parse($dir): void
    {
        $dotenv = Dotenv::createImmutable($dir);
        $dotenv->load();
    }
}

?>