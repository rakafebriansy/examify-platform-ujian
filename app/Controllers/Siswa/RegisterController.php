<?php

namespace App\Controllers\Siswa;
use App\Core\View;
use App\Models\Siswa;
use App\Request\SiswaRegisterRequest;

class RegisterController
{
    private SiswaRegisterRequest $siswa_register_request;
    public function __construct() {
        $this->siswa_register_request = new SiswaRegisterRequest();
    }
    public function setRegister()
    {
        
    }
    public function register()
    {
        $request = $_GET;
        if ($this->siswa_register_request->check($request)) {
            $checked = Siswa::findBy('nama',$request['nama']);
            if(!isset($checked)) {
                $kata_sandi = password_hash($request['kata_sandi'],PASSWORD_DEFAULT);

                $siswa = new Siswa();
                $siswa->nis = $request['nis'];
                $siswa->nama = $request['nama'];
                $siswa->jurusan = $request['jurusan'];
                $siswa->kelas = $request['kelas'];
                $siswa->kata_sandi = $kata_sandi;
                $siswa->insert();
    
                $message = 'Akun telah terdaftar';
                View::redirectWith('/siswa/login',$message);
            }
            $message = 'Akun gagal dibuat';
            View::redirectWith('/siswa/register',$message, true);
        }
        $message = $this->siswa_register_request->getMessage();
        View::redirectWith('/siswa/register',$message, true);
    }
}

?>