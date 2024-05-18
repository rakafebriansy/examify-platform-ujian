<?php

namespace App\Controllers\Siswa;
use App\Models\Siswa;
use App\Request\SiswaRegisterRequest;

class RegisterController
{
    private SiswaRegisterRequest $guru_register_request;
    public function __construct() {
        $this->guru_register_request = new SiswaRegisterRequest();
    }
    public function setRegister()
    {
        
    }
    public function register()
    {
        $request = $_GET;
        if ($this->guru_register_request->check($request)) {
            $checked = Siswa::findBy('nama',$request['nama']);
            if(!isset($checked)) {
                $kata_sandi = password_hash($request['kata_sandi'],PASSWORD_DEFAULT);

                $guru = new Siswa();
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