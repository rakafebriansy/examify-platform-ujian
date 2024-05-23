<?php

namespace App\Controllers\Guru;
use App\Core\Cursor;
use App\Core\View;
use App\Models\MataPelajaran;
use App\Models\Soal;
use App\Models\Ujian;
use App\Requests\GuruBuatUjianRequest;
use App\Requests\GuruUbahUjianRequest;

class UjianController
{
    private GuruBuatUjianRequest $guru_buat_ujian_request;
    private GuruUbahUjianRequest $guru_ubah_ujian_request;
    public function __construct() {
        $this->guru_buat_ujian_request = new GuruBuatUjianRequest();
        $this->guru_ubah_ujian_request = new GuruUbahUjianRequest();
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
        if($this->guru_buat_ujian_request->check($_POST)) {
            $ujian = new Ujian();
            $ujian->nama = $_POST['nama'];
            $ujian->tanggal_ujian = $_POST['tanggal_ujian'];
            $ujian->id_mata_pelajaran = $_POST['id_mata_pelajaran'];
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

    public function hapusUjian()
    {
        if (isset($_POST['id'])) {
            $mata_pelajaran = Ujian::find($_POST['id']);
            if($mata_pelajaran->delete()){
                $message = 'Ujian berhasil dihapus.';
                View::redirectWith('/examify/guru/ujian',$message);
            }
        }
        $message = 'Ujian gagal dihapus.';
        View::redirectWith('/examify/guru/ujian',$message,true);
    }

    public function ubahUjian()
    {
        if($this->guru_ubah_ujian_request->check($_POST)) {
            $ujian = Ujian::find($_POST['id']);
            $ujian->nama = $_POST['nama'];
            $ujian->tanggal_ujian = $_POST['tanggal_ujian'];
            $ujian->id_mata_pelajaran = $_POST['id_mata_pelajaran'];
            if($ujian->update()) {
                $message = 'Ujian berhasil ditambahkan.';
                View::redirectWith('/examify/guru/ujian',$message);
            }
            $message = 'Ujian gagal dihapus.';
            View::redirectWith('/examify/guru/ujian',$message,true);
        }
        $message = $this->guru_buat_ujian_request->getMessage();
        View::redirectWith('/examify/guru/ujian',$message,true);
    }

    // public function addSoal()
    // {
    //     $_POST = $_POST;
    //     if($this->guru_buat_soal_request->check($_POST)) {
    //         $soal = new Soal();
    //         $soal->pertanyaan = $_POST['pertanyaan'];
    //         $soal->kunci_jawaban = $_POST['kunci_jawaban'];
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