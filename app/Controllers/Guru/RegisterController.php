<?php

namespace App\Controllers\Guru;
use App\Core\View;
use App\Models\Guru;
use App\Requests\GuruRegisterRequest;

class RegisterController
{
    private GuruRegisterRequest $guru_register_request;
    public function __construct() {
        $this->guru_register_request = new GuruRegisterRequest();
    }
    public function setRegister()
    {
        View::set('guru/register',[
            'title' => 'Guru | Registrasi'
        ]);
    }
    public function register()
    {
        if ($this->guru_register_request->check($_POST)) {
            $checked = Guru::findBy('nama',$_POST['nama']);
            if($checked == false) {
                $kata_sandi = password_hash($_POST['kata_sandi'],PASSWORD_DEFAULT);

                $guru = new Guru();
                $guru->nip = $_POST['nip'];
                $guru->nama = $_POST['nama'];
                $guru->jabatan = $_POST['jabatan'];
                $guru->kata_sandi = $kata_sandi;

                if($guru->insert()) {
                    $message = 'Akun berhasil didaftarkan';
                    View::redirectWith('/examify-platform-ujian/guru/login',$message);
                }
                $message = 'Akun gagal dibuat';
                View::redirectWith('/examify-platform-ujian/guru/register',$message, true);
            }
            $message = 'Akun dengan nama tersebut telah terdaftar';
            View::redirectWith('/examify-platform-ujian/guru/register',$message, true);
        }
        $message = $this->guru_register_request->getMessage();
        View::redirectWith('/examify-platform-ujian/guru/register',$message, true);
    }
}

?>