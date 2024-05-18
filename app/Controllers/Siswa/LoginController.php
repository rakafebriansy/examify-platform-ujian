<?php

namespace App\Controllers\Siswa;
use App\Models\Siswa;
use App\Request\SiswaLoginRequest;

class LoginController
{
    private SiswaLoginRequest $siswa_login_request;
    public function __construct() {
        $this->siswa_login_request = new SiswaLoginRequest();
    }
    public function setLogin()
    {
        
    }
    public function login()
    {
        $message = [];
        $request = $_GET;
        if ($this->siswa_login_request->check($request)) {
            $siswa = Siswa::findBy('nama',$request['nama']);
            if(isset($siswa) && password_verify($request['kata_sandi'],$siswa->kata_sandi)){
                $_SESSION['id_siswa'] = $siswa->id;
                header('Location: /siswa/dashboard');
                exit;
            }
            $message = 'Nama atau kata sandi salah.';
            $_SESSION['errors'] = $message;
            header('Location: /siswa/register');
            exit;
        }
        $message = $this->siswa_login_request->getMessage();
        $_SESSION['errors'] = $message;
        header('Location: /siswa/register');
        exit; 
    }
}

?>