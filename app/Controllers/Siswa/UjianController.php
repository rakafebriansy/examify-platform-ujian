<?php

namespace App\Controllers\Siswa;
use App\Core\Cursor;
use App\Core\View;
use App\Models\MataPelajaran;
use App\Models\Siswa;

class UjianController
{
    public function setUjian()
    {
        $mata_pelajarans = MataPelajaran::all();
        $cursor = new Cursor();
        $sql = <<<SQL
            SELECT ujian.id, tanggal_ujian, token, ujian.nama as nama_ujian, id_guru, mata_pelajaran.nama as mata_pelajaran 
            FROM ujian INNER JOIN mata_pelajaran ON ujian.id_mata_pelajaran = mata_pelajaran.id;
        SQL;
        $siswa = Siswa::find($_SESSION['id_siswa']);
        $ujians = $cursor->executeNoBind($sql,fetch_all:true);
        View::set('siswa/berlangsung',[
            'title' => 'Siswa | Ujian',
            'mata_pelajarans' => $mata_pelajarans,
            'ujians' => $ujians,
            'siswa' => $siswa,
        ]);
    }
    public function findUjian()
    {
        
    }
}

?>