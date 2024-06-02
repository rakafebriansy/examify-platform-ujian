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
        if(isset($_COOKIE['remember_siswa'])) unset($_COOKIE['remember_siswa']);
        if(isset($_COOKIE['remember_guru'])) unset($_COOKIE['remember_guru']);
        View::redirectTo('/examify-platform-ujian/');
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