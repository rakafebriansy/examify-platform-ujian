<?php

namespace App\Core;

use Dotenv\Dotenv;

class Env
{
    public static function set($dir): void
    {
        $dotenv = Dotenv::createImmutable($dir);
        $dotenv->load();
    }
}

?>