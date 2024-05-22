<?php

namespace App\Controllers;
use App\Core\View;

class HomeController
{
    public function index(): void
    {
        View::set('index');
    }
    public function logout()
    {
        session_destroy();
        View::redirectTo('/examify/');
    }
}

?>