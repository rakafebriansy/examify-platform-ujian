<?php

namespace App\Controllers\Guru;
use App\Core\View;
use App\Models\Soal;
use App\Request\GuruBuatSoalRequest;

class UjianController
{
    private GuruBuatSoalRequest $guru_buat_soal_request;
    public function __construct() {
        $this->guru_buat_soal_request = new GuruBuatSoalRequest();
    }
    public function setBuatSoal()
    {
        
    }
    public function buatSoal()
    {
        $request = $_GET;
        if($this->guru_buat_soal_request->check($request)) {
            $soal = new Soal();
            $soal->pertanyaan = $request['pertanyaan'];
            $soal->kunci_jawaban = $request['kunci_jawaban'];
            $soal->id_guru = $_SESSION['id_guru'];
            if($soal->insert()) {
                $message = 'Soal berhasil dibuat.';
                View::redirectWith('/guru/soal',$message);
            }
            $message = 'Soal gagal dibuat.';
            View::redirectWith('/guru/soal',$message,true);
        }
        $message = $this->guru_buat_soal_request->getMessage();
        View::redirectWith('/guru/soal',$message,true);
    }
}

?>