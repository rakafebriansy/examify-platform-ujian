<?php

namespace App\Controllers\Siswa;
use App\Core\View;
use App\Models\Siswa;
use App\Requests\SiswaLoginRequest;

class LoginController
{
    private SiswaLoginRequest $siswa_login_request;
    public function __construct() {
        $this->siswa_login_request = new SiswaLoginRequest();
    }
    public function setLogin()
    {
        if(isset($_COOKIE['remember_siswa'])) {
            View::redirectTo('/examify-platform-ujian/siswa/ujian');
        }
        View::set('siswa/login',[
            'title' => 'Siswa | Login'
        ]);
    }
    public function login()
    {
        if ($this->siswa_login_request->check($_POST)) {
            $siswa = Siswa::findBy('nis',$_POST['nis']);
            if($siswa && password_verify($_POST['kata_sandi'],$siswa->kata_sandi)){
                $_SESSION['id_siswa'] = $siswa->id;
                if(isset($_POST['ingat_saya'])) {
                    setcookie('remember_siswa',$siswa->id,time()+86400);
                }
                View::redirectTo('/examify-platform-ujian/siswa/ujian');
            }
            $message = 'Nama atau kata sandi salah.';
            View::redirectWith('/examify-platform-ujian/siswa/login',$message,true);
        }
        $message = $this->siswa_login_request->getMessage();
        View::redirectWith('/examify-platform-ujian/siswa/login',$message,true);
    }
}

?>