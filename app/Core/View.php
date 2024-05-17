<?php

namespace App\Core;

class View
{
    public static function set($page, $data=[]) {
        extract($data);
        include 'app/Views/'.$page.'.php';
    }
    
}

?>