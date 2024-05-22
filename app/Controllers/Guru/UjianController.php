<?php

namespace App\Controllers\Guru;
use App\Core\Cursor;
use App\Core\View;
use App\Models\MataPelajaran;
use App\Models\Soal;
use App\Models\Ujian;
use App\Requests\GuruBuatUjianRequest;

class UjianController
{
    private GuruBuatUjianRequest $guru_buat_ujian_request;
    public function __construct() {
        $this->guru_buat_ujian_request = new GuruBuatUjianRequest();
    }
    public function setUjian()
    {
        $mata_pelajarans = MataPelajaran::all();
        $cursor = new Cursor();
        $sql = <<<SQL
            SELECT ujian.id, tanggal_ujian, token, ujian.nama as nama_ujian, id_guru, mata_pelajaran.nama as mata_pelajaran 
            FROM ujian INNER JOIN mata_pelajaran ON ujian.id_mata_pelajaran = mata_pelajaran.id;
        SQL;
        $ujians = $cursor->executeNoBind($sql,fetch_all:true);
        View::set('guru/ujian',[
            'title' => 'Guru | Ujian',
            'mata_pelajarans' => $mata_pelajarans,
            'ujians' => $ujians
        ]);
    }
    public function buatUjian()
    {
        $request = $_POST;
        if($this->guru_buat_ujian_request->check($request)) {
            $ujian = new Ujian();
            $ujian->nama = $request['nama'];
            $ujian->tanggal_ujian = $request['tanggal_ujian'];
            $ujian->token = uniqid();
            $ujian->id_mata_pelajaran = $request['id_mata_pelajaran'];
            $ujian->id_guru = $_SESSION['id_guru'];
            if($ujian->insert()) {
                $message = 'Ujian berhasil ditambahkan.';
                View::redirectWith('/examify/guru/ujian',$message);
            }
            $message = 'Ujian gagal ditambahkan.';
            View::redirectWith('/examify/guru/ujian',$message,true);
        }
        $message = $this->guru_buat_ujian_request->getMessage();
        View::redirectWith('/examify/guru/ujian',$message,true);
    }


    // public function addSoal()
    // {
    //     $request = $_POST;
    //     if($this->guru_buat_soal_request->check($request)) {
    //         $soal = new Soal();
    //         $soal->pertanyaan = $request['pertanyaan'];
    //         $soal->kunci_jawaban = $request['kunci_jawaban'];
    //         $soal->id_guru = $_SESSION['id_guru'];
    //         if($soal->insert()) {
    //             $message = 'Soal berhasil dibuat.';
    //             View::redirectWith('/guru/soal',$message);
    //         }
    //         $message = 'Soal gagal dibuat.';
    //         View::redirectWith('/guru/soal',$message,true);
    //     }
    //     $message = $this->guru_buat_soal_request->getMessage();
    //     View::redirectWith('/guru/soal',$message,true);
    // }
}

?>