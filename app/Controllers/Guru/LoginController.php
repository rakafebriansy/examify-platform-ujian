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
        if(isset($_COOKIE['remember_guru'])) {
            View::redirectTo('/examify-platform-ujian/guru/ujian');
        }
        View::set('guru/login',[
            'title' => 'Guru | Login'
        ]);
    }
    public function login()
    {
        if ($this->guru_login_request->check($_POST)) {
            $guru = Guru::findBy('nip',$_POST['nip']);
            if($guru && password_verify($_POST['kata_sandi'],$guru->kata_sandi)){
                $_SESSION['id_guru'] = $guru->id;
                if(isset($_POST['ingat_saya'])) {
                    setcookie('remember_guru',$guru->id,time()+86400);
                }
                View::redirectTo('/examify-platform-ujian/guru/ujian');
            }
            $message = 'NIP atau kata sandi salah.';
            View::redirectWith('/examify-platform-ujian/guru/login',$message,true);
        }
        $message = $this->guru_login_request->getMessage();
        View::redirectWith('/examify-platform-ujian/guru/login',$message,true);
    }
}
?>