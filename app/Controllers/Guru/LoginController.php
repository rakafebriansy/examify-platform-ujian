<?php

namespace App\Controllers\Guru;
use App\Models\Guru;
use App\Request\GuruLoginRequest;

class LoginController
{
    private GuruLoginRequest $guru_login_request;
    public function __construct() {
        $this->guru_login_request = new GuruLoginRequest();
    }
    public function setLogin()
    {
        
    }
    public function login()
    {
        $message = [];
        $request = $_GET;
        if ($this->guru_login_request->check($request)) {
            $guru = Guru::findBy('nama',$request['nama']);
            if(isset($guru) && password_verify($request['kata_sandi'],$guru->kata_sandi)){
                $_SESSION['id_guru'] = $guru->id;
                header('Location: /guru/dashboard');
                exit;
            }
            $message = 'Nama atau kata sandi salah.';
            $_SESSION['errors'] = $message;
            header('Location: /guru/register');
            exit;
        }
        $message = $this->guru_login_request->getMessage();
        $_SESSION['errors'] = $message;
        header('Location: /guru/register');
        exit; 
    }
}
?>