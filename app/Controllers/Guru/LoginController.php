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
        View::set('guru/login',[
            'title' => 'Guru | Login'
        ]);
    }
    public function login()
    {
        $request = $_POST;
        if ($this->guru_login_request->check($request)) {
            $guru = Guru::findBy('nip',$request['nip']);
            if($guru && password_verify($request['kata_sandi'],$guru->kata_sandi)){
                $_SESSION['id_guru'] = $guru->id;
                View::redirectTo('/examify/guru/ujian');

            }
            $message = 'NIP atau kata sandi salah.';
            View::redirectWith('/examify/guru/login',$message,true);
        }
        $message = $this->guru_login_request->getMessage();
        View::redirectWith('/examify/guru/login',$message,true);
    }
}
?>