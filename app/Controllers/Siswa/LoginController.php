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
        View::set('siswa/login',[
            'title' => 'Siswa | Login'
        ]);
    }
    public function login()
    {
        if ($this->siswa_login_request->check($_POST)) {
            $siswa = Siswa::findBy('nis',$_POST['nis']);
            if(isset($siswa) && password_verify($_POST['kata_sandi'],$siswa->kata_sandi)){
                $_SESSION['id_siswa'] = $siswa->id;
                View::redirectTo('/examify/siswa/login');
            }
            $message = 'Nama atau kata sandi salah.';
            View::redirectWith('/examify/siswa/login',$message,true);
        }
        $message = $this->siswa_login_request->getMessage();
        View::redirectWith('/examify/siswa/login',$message,true);
    }
}

?>