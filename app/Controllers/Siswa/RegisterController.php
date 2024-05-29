<?php

namespace App\Controllers\Siswa;
use App\Core\View;
use App\Models\Siswa;
use App\Requests\SiswaRegisterRequest;

class RegisterController
{
    private SiswaRegisterRequest $siswa_register_request;
    public function __construct() {
        $this->siswa_register_request = new SiswaRegisterRequest();
    }
    public function setRegister()
    {
        View::set('siswa/register',[
            'title' => 'Siswa | Registrasi'
        ]);
    }
    public function register()
    {
        if ($this->siswa_register_request->check($_POST)) {
            $checked = Siswa::findBy('nama',$_POST['nama']);
            if(!isset($checked)) {
                $kata_sandi = password_hash($_POST['kata_sandi'],PASSWORD_DEFAULT);

                $siswa = new Siswa();
                $siswa->nis = $_POST['nis'];
                $siswa->nama = $_POST['nama'];
                $siswa->jurusan = $_POST['jurusan'];
                $siswa->kelas = $_POST['kelas'];
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