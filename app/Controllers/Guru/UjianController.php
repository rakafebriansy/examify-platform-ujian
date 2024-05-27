<?php

namespace App\Controllers\Guru;
use App\Core\Cursor;
use App\Core\View;
use App\Models\DetailSoal;
use App\Models\Jawaban;
use App\Models\MataPelajaran;
use App\Models\Soal;
use App\Models\Ujian;
use App\Requests\GuruBuatSoalRequest;
use App\Requests\GuruBuatUjianRequest;
use App\Requests\GuruUbahUjianRequest;

class UjianController
{
    private GuruBuatUjianRequest $guru_buat_ujian_request;
    private GuruUbahUjianRequest $guru_ubah_ujian_request;
    private GuruBuatSoalRequest $guru_buat_soal_request;
    public function __construct() {
        $this->guru_buat_ujian_request = new GuruBuatUjianRequest();
        $this->guru_ubah_ujian_request = new GuruUbahUjianRequest();
        $this->guru_buat_soal_request = new GuruBuatSoalRequest();
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


    public function setSoal(string $id_ujian)
    {
        $cursor = new Cursor();
        $sql_ujian = <<<SQL
            SELECT ujian.id, ujian.nama as nama_ujian, mata_pelajaran.nama as mata_pelajaran 
            FROM ujian INNER JOIN mata_pelajaran ON ujian.id_mata_pelajaran = mata_pelajaran.id;
        SQL;
        $sql_soal = <<<SQL
            SELECT soal.* FROM ujian
            INNER JOIN detail_soal ON (ujian.id = detail_soal.id_ujian)
            INNER JOIN soal ON (soal.id = detail_soal.id_soal)
            WHERE ujian.id = 1;
        SQL;
        $sql_jawaban = <<<SQL
            SELECT jawaban.* FROM ujian
            INNER JOIN detail_soal ON (ujian.id = detail_soal.id_ujian)
            INNER JOIN soal ON (soal.id = detail_soal.id_soal)
            INNER JOIN jawaban ON (jawaban.id_soal = soal.id)
            WHERE ujian.id = 1;
        SQL;
        $ujian = $cursor->executeNoBind($sql_ujian);

        $soals = $cursor->executeNoBind($sql_soal,true);
        $jawabans = $cursor->executeNoBind($sql_jawaban,true);
        $jawaban_wrapper = [];
        $jawaban_group = [];
        foreach ($jawabans as $key => $jawaban) {
            $jawaban_group[] = $jawaban;
            if(($key + 1) % 4 == 0) {
                $jawaban_wrapper[] = $jawaban_group;
                $jawaban_group = [];
            }
        }
        View::set('guru/soal',[
            'title' => 'Guru | Soal',
            'ujian' => $ujian,
            'soals' => $soals,
            'jawabans' => $jawaban_wrapper
        ]);
    }
    public function buatSoal()
    {
        $id_ujian = $_POST['id_ujian'];
        if($this->guru_buat_soal_request->check($_POST)) {
            $soal = new Soal();
            $soal->pertanyaan = $_POST['pertanyaan'];
            $soal->kunci_jawaban = $_POST['kunci_jawaban'];
            $id_soal = $soal->insertGetId();
            if(isset($id_soal)) {
                foreach ($_POST['jawaban'] as $opsi => $deskripsi) {
                    $jawaban = new Jawaban();
                    $jawaban->jawaban = $deskripsi;
                    $jawaban->opsi = substr($opsi,-1);
                    $jawaban->id_soal = $id_soal;
                    $jawaban->insert();
                }

                $detail_soal = new DetailSoal();
                $detail_soal->id_ujian = $id_ujian;
                $detail_soal->id_soal = $id_soal;
                if($detail_soal->insert()) {
                    $message = 'Soal berhasil dibuat.';
                    View::redirectWith('/examify/guru/soal/' . $id_ujian,$message);
                }
            }
            $message = 'Soal gagal dibuat.';
            View::redirectWith('/examify/guru/soal/' . $id_ujian,$message,true);
        }
        $message = $this->guru_buat_soal_request->getMessage();
        View::redirectWith('/examify/guru/soal/' . $id_ujian,$message,true);
    }
    
    public function ajaxUbahUjian()
    {
        $id = $_POST['id'];
        $ujian = Ujian::findJSON($id);
        echo json_encode($ujian);
    }
}

?>