<?php

namespace App\Controllers\Guru;
use App\Core\View;
use App\Models\Guru;
use App\Request\GuruRegisterRequest;

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

                if($guru->insert()) {
                    $message = 'Akun berhasil didaftarkan';
                    View::redirectWith('/guru/login',$message);
                }
                $message = 'Akun gagal dibuat';
                View::redirectWith('/guru/register',$message, true);
            }
            $message = 'Akun dengan nama tersebut telah terdaftar';
            View::redirectWith('/guru/register',$message, true);
        }
        $message = $this->guru_register_request->getMessage();
        View::redirectWith('/guru/register',$message, true);
    }
}

?>