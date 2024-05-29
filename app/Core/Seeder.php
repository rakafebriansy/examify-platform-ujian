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