<?php

namespace App\Controllers\Siswa;

class RegisterController
{
    private GuruRegisterRequest $guru_register_request;
    public function __construct() {
        $this->guru_register_request = new GuruRegisterRequest();
    }
    public function setRegister()
    {
        
    }
    public function register()
    {
        $request = $_GET;
        if ($this->guru_register_request->check($request)) {
            $checked = Guru::findBy('nama',$request['nama']);
            if(!isset($checked)) {
                $kata_sandi = password_hash($request['kata_sandi'],PASSWORD_DEFAULT);

                $guru = new Guru();
                $guru->nip = $request['nip'];
                $guru->nama = $request['nama'];
                $guru->jabatan = $request['jabatan'];
                $guru->kata_sandi = $kata_sandi;
                $guru->insert();
    
                $message = 'Akun telah terdaftar';
                $_SESSION['success'] = $message;
                header('Location: /guru/login');
                exit;
            }
        }
        $message = $this->guru_register_request->getMessage();
        $_SESSION['errors'] = $message;
        header('Location: /guru/register');
        exit; 
    }
}

?>