<?php

namespace App\Controllers\Guru;
use App\Core\View;
use App\Models\Guru;
use App\Requests\GuruLoginRequest;

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
        $request = $_POST;
        if ($this->guru_login_request->check($request)) {
            $guru = Guru::findBy('nama',$request['nama']);
            if(isset($guru) && password_verify($request['kata_sandi'],$guru->kata_sandi)){
                $_SESSION['id_guru'] = $guru->id;
                View::redirectTo('/guru/dashboard');

            }
            $message = 'Nama atau kata sandi salah.';
            View::redirectWith('/guru/register',$message,true);
        }
        $message = $this->guru_login_request->getMessage();
        View::redirectWith('/guru/register',$message,true);
    }
}
?>