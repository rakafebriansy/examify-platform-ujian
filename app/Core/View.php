<?php

namespace App\Core;

class View
{
    public static function set(string $page, array $data=[]): void
    {
        extract($data);
        include 'app/Views/'.$page.'.php';
    }
    public static function redirectTo(string $url): void
    {
        header('Location: ' . $url);
        exit; 
    }
    public static function redirectWith(string $url, string $message, bool $errors = false): void
    {
        $label = $errors ? 'errors' : 'success';
        $_SESSION[$label] = $message;
        header('Location: ' . $url);
        exit; 
    }
}

?>