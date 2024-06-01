<?php

namespace App\Controllers\Siswa;
use App\Core\Cursor;
use App\Core\View;
use App\Models\DetailUjian;
use App\Models\MataPelajaran;
use App\Models\Siswa;

class UjianController
{
    public function setUjian()
    {
        $cursor = new Cursor();
        $sql = <<<SQL
            SELECT detail_ujian.skor, ujian.id, tanggal_ujian, token, ujian.nama as nama_ujian, id_guru, mata_pelajaran.nama as mata_pelajaran 
            FROM ujian INNER JOIN mata_pelajaran ON ujian.id_mata_pelajaran = mata_pelajaran.id
            LEFT JOIN detail_ujian ON detail_ujian.id_ujian = ujian.id;
        SQL;
        $siswa = Siswa::find($_SESSION['id_siswa']);
        $ujians = $cursor->executeNoBind($sql,fetch_all:true);
        View::set('siswa/berlangsung',[
            'title' => 'Siswa | Ujian',
            'ujians' => $ujians,
            'siswa' => $siswa,
        ]);
    }
    public function ujian(string $id_ujian)
    {
        $cursor = new Cursor();
        $sql_ujian = <<<SQL
            SELECT ujian.id, ujian.nama as nama_ujian, mata_pelajaran.nama as mata_pelajaran 
            FROM ujian INNER JOIN mata_pelajaran ON ujian.id_mata_pelajaran = mata_pelajaran.id
            WHERE ujian.id = $id_ujian;
        SQL;
        $sql_soal = <<<SQL
            SELECT soal.* FROM ujian
            INNER JOIN detail_soal ON (ujian.id = detail_soal.id_ujian)
            INNER JOIN soal ON (soal.id = detail_soal.id_soal)
            WHERE ujian.id = $id_ujian;
        SQL;
        $sql_jawaban = <<<SQL
            SELECT jawaban.* FROM ujian
            INNER JOIN detail_soal ON (ujian.id = detail_soal.id_ujian)
            INNER JOIN soal ON (soal.id = detail_soal.id_soal)
            INNER JOIN jawaban ON (jawaban.id_soal = soal.id)
            WHERE ujian.id = $id_ujian;
        SQL;
        $ujian = $cursor->executeNoBind($sql_ujian);

        $soals = $cursor->executeNoBind($sql_soal,true);
        $jawabans = $cursor->executeNoBind($sql_jawaban,true);
        $jawaban_wrapper = [];
        $jawaban_group = [];
        if(count($jawabans) <= 0) {
            $message = 'Soal belum tersedia';
            View::redirectWith('/examify-platform-ujian/siswa/ujian',$message, true);
        }
        foreach ($jawabans as $key => $jawaban) {
            $jawaban_group[] = $jawaban;
            if(($key + 1) % 4 == 0) {
                $jawaban_wrapper[] = $jawaban_group;
                $jawaban_group = [];
            }
        }
        View::set('siswa/soal',[
            'title' => 'Siswa | Soal',
            'ujian' => $ujian,
            'soals' => $soals,
            'jawabans' => $jawaban_wrapper
        ]);
    }
    public function submitUjian()
    {
        $id_ujian = $_POST['id_ujian'];
        $jawabans = $_POST['jawaban'];
        $cursor = new Cursor();

        $sql_soal = <<<SQL
            SELECT soal.* FROM ujian
            INNER JOIN detail_soal ON (ujian.id = detail_soal.id_ujian)
            INNER JOIN soal ON (soal.id = detail_soal.id_soal)
            WHERE ujian.id = $id_ujian;
        SQL;
        $soals = $cursor->executeNoBind($sql_soal,true);

        $jumlah_benar = 0;
        foreach ($jawabans as $key => $jawaban) {
            foreach($soals as $soal) {
                if($key == $soal['id']) {
                    if($jawaban == $soal['kunci_jawaban']) {
                        $jumlah_benar ++;
                    }
                }
            }
        }

        $detail_ujian = new DetailUjian();
        $detail_ujian->id_siswa = $_SESSION['id_siswa'];
        $detail_ujian->id_ujian = $id_ujian;
        $detail_ujian->skor = $jumlah_benar/count($soals)*100;
        if($detail_ujian->insert()) {
            $message = 'Jawaban berhasil disimpan';
            View::redirectWith('/examify-platform-ujian/siswa/ujian',$message);
        }
        $message = 'Jawaban gagal disimpan';
        View::redirectWith('/examify-platform-ujian/siswa/ujian',$message, true);
    }
    public function findUjian(string $keyword)
    {
        $keyword = "'%".$keyword."%'";
        $cursor = new Cursor();
        $sql = <<<SQL
            SELECT detail_ujian.skor, ujian.id, tanggal_ujian, token, ujian.nama as nama_ujian, id_guru, mata_pelajaran.nama as mata_pelajaran 
            FROM ujian INNER JOIN mata_pelajaran ON ujian.id_mata_pelajaran = mata_pelajaran.id
            LEFT JOIN detail_ujian ON detail_ujian.id_ujian = ujian.id
            WHERE LOWER(ujian.nama) like LOWER($keyword);
        SQL;
        $siswa = Siswa::find($_SESSION['id_siswa']);
        $ujians = $cursor->executeNoBind($sql,fetch_all:true);
        View::set('siswa/berlangsung',[
            'title' => 'Siswa | Ujian',
            'ujians' => $ujians,
            'siswa' => $siswa,
        ]);
    }
}

?>