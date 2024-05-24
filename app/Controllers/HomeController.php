<?php

namespace App\Controllers;
use App\Core\Seeder;
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
    public function fresh()
    {
        $seeder = new Seeder();
        if($seeder->fresh()) {
            echo 'Fresh!';
        } else {
            echo 'Nope';
        }
        exit;
    }
}

?>