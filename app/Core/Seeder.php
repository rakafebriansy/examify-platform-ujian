<?php

namespace App\Core;

use App\Core\Database;

class Seeder extends Cursor
{
    private function clear()
    {
        parent::executeNonQuery('DELETE FROM detail_ujian; ALTER TABLE detail_ujian AUTO_INCREMENT = 1');
        parent::executeNonQuery('DELETE FROM detail_soal; ALTER TABLE detail_soal AUTO_INCREMENT = 1');
        parent::executeNonQuery('DELETE FROM jawaban; ALTER TABLE jawaban AUTO_INCREMENT = 1');
        parent::executeNonQuery('DELETE FROM soal; ALTER TABLE soal AUTO_INCREMENT = 1');
        parent::executeNonQuery('DELETE FROM ujian; ALTER TABLE ujian AUTO_INCREMENT = 1');
        parent::executeNonQuery('DELETE FROM siswa; ALTER TABLE siswa AUTO_INCREMENT = 1');
        parent::executeNonQuery('DELETE FROM guru; ALTER TABLE guru AUTO_INCREMENT = 1');
        parent::executeNonQuery('DELETE FROM mata_pelajaran; ALTER TABLE mata_pelajaran AUTO_INCREMENT = 1');
        parent::executeNonQuery('DELETE FROM admin;ALTER TABLE admin AUTO_INCREMENT = 1;');
    }
    public function connect(): void
    {
        parent::connect();
    }
    public function close(): void
    {
        parent::close();
    }
    public function seed()
    {
        parent::create('admin',[
            'nama_pengguna' => 'raka',
            'kata_sandi' => '123'
        ]);
        parent::create('mata_pelajaran',[
            'nama' => 'Matematika',
            'id_admin' => 1
        ]);
        parent::create('mata_pelajaran',[
            'nama' => 'Bahasa Indonesia',
            'id_admin' => 1
        ]);
        parent::create('guru', [
            'nip' => '12345678',
            'nama' => 'kiko',
            'kata_sandi' => password_hash('123',PASSWORD_DEFAULT)
        ]);
        parent::create('siswa', [
            'nis' => '12345678',
            'nama' => 'raider',
            'jurusan' => 'mipa',
            'kelas' => '6',
            'kata_sandi' => password_hash('123',PASSWORD_DEFAULT)
        ]);
        parent::create('ujian',[
            'id' => 1,
            'nama' => 'UTS Matematika Kelas 12',
            'tanggal_ujian' => date('Y-m-d'),
            'token' => uniqid(),
            'id_mata_pelajaran' => 1,
            'id_guru' => 1,
        ]);
        parent::create('ujian',[
            'id' => 2,
            'nama' => 'UTS Bahasa Indonesia Kelas 12',
            'tanggal_ujian' => date('Y-m-d'),
            'token' => uniqid(),
            'id_mata_pelajaran' => 2,
            'id_guru' => 1,
        ]);
        parent::create('ujian',[
            'id' => 3,
            'nama' => 'UTS Bahasa Indonesia Kelas 11',
            'tanggal_ujian' => date('Y-m-d'),
            'token' => uniqid(),
            'id_mata_pelajaran' => 2,
            'id_guru' => 1,
        ]);
        parent::create('ujian',[
            'id' => 4,
            'nama' => 'UTS Bahasa Indonesia Kelas 10',
            'tanggal_ujian' => date('Y-m-d'),
            'token' => uniqid(),
            'id_mata_pelajaran' => 2,
            'id_guru' => 1,
        ]);

        parent::create('soal',[
            'id' => 1,
            'pertanyaan' => 'Siapakah ayahku?',
            'kunci_jawaban' => 'd',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Prabowo',
            'id_soal' => 1,
            'opsi' => 'a',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Jamal',
            'id_soal' => 1,
            'opsi' => 'b',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Devin',
            'id_soal' => 1,
            'opsi' => 'c',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Deren',
            'id_soal' => 1,
            'opsi' => 'd',
        ]);
        parent::create('detail_soal',[
            'id_ujian' => 1,
            'id_soal' => 1,
        ]);

        parent::create('soal',[
            'id' => 2,
            'pertanyaan' => 'Apakah zoom kamu premium?',
            'kunci_jawaban' => 'd',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Ya',
            'id_soal' => 2,
            'opsi' => 'a',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Tidak',
            'id_soal' => 2,
            'opsi' => 'b',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Bukan',
            'id_soal' => 2,
            'opsi' => 'c',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Mungkin',
            'id_soal' => 2,
            'opsi' => 'd',
        ]);
        parent::create('detail_soal',[
            'id_ujian' => 1,
            'id_soal' => 2,
        ]);

        parent::create('soal',[
            'id' => 3,
            'pertanyaan' => 'Berapa jumlah kromosom Y pada bulu babi?',
            'kunci_jawaban' => 'd',
        ]);
        parent::create('jawaban',[
            'jawaban' => '49',
            'id_soal' => 3,
            'opsi' => 'a',
        ]);
        parent::create('jawaban',[
            'jawaban' => '48',
            'id_soal' => 3,
            'opsi' => 'b',
        ]);
        parent::create('jawaban',[
            'jawaban' => '1',
            'id_soal' => 3,
            'opsi' => 'c',
        ]);
        parent::create('jawaban',[
            'jawaban' => '1000',
            'id_soal' => 3,
            'opsi' => 'd',
        ]);
        parent::create('detail_soal',[
            'id_ujian' => 1,
            'id_soal' => 3,
        ]);


        parent::create('soal',[
            'id' => 4,
            'pertanyaan' => 'Siapa penemu bola lampu?',
            'kunci_jawaban' => 'a',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Thomas Edison',
            'id_soal' => 4,
            'opsi' => 'a',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Alexander Graham Bell',
            'id_soal' => 4,
            'opsi' => 'b',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Jessica Alba',
            'id_soal' => 4,
            'opsi' => 'c',
        ]);
        parent::create('jawaban',[
            'jawaban' => 'Leonardo Dicaprio',
            'id_soal' => 4,
            'opsi' => 'd',
        ]);
        parent::create('detail_soal',[
            'id_ujian' => 1,
            'id_soal' => 4,
        ]);
    }
    public function fresh() 
    {
        try {
            $this->clear();
            $this->seed();
            return true;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}

?>