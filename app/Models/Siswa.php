<?php

namespace App\Models;

use App\Contracts\IModel;
use App\Core\Cursor;
use App\Core\Model;

class Siswa extends Model implements IModel
{
    private static string $table = 'siswa';
    public ?int $id;
    public string $nis;
    public string $nama;
    public string $jurusan;
    public string $kelas;
    public string $kata_sandi;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'nis' => $this->nis,
            'nama' => $this->nama,
            'jurusan' => $this->jurusan,
            'kelas' => $this->kelas,
            'kata_sandi' => $this->kata_sandi,
        ];
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'nis' => $this->nis,
            'nama' => $this->nama,
            'jurusan' => $this->jurusan,
            'kelas' => $this->kelas,
            'kata_sandi' => $this->kata_sandi,
        ];
        $result = $this->db->update(self::$table, $data, $this->id);
        return $result;
    }
    public function delete(): bool
    {
        $this->db->delete(self::$table,$this->id);
        return true;
    }
    public static function find(int $id): object|null
    {
        $db = new Cursor();
        $result = $db->readOne(self::$table, ['id','=',$id]);
        
        if(!isset($result)) {
            return null;
        }

        $mata_pelajaran = new Siswa();
        $mata_pelajaran->id = $result['id'];
        $mata_pelajaran->nama_pengguna = $result['nis'];
        $mata_pelajaran->nama_pengguna = $result['nama'];
        $mata_pelajaran->nama_pengguna = $result['jurusan'];
        $mata_pelajaran->nama_pengguna = $result['kelas'];
        $mata_pelajaran->nama_pengguna = $result['kata_sandi'];

        return $mata_pelajaran;
    }    
    public static function all(): array|null
    {
        $db = new Cursor();

        if(!isset($result)) {
            return null;
        }

        $siswas = $db->readMany(self::$table);
        $db->close();
        return $siswas;
    }
    public static function findBy(string $column,string $nama_pengguna): object|null
    {
        $db = new Cursor();
        $result = $db->readOne(self::$table, [$column,'=',$nama_pengguna]);

        if(!isset($result)) {
            return null;
        }
        
        $siswa = new Siswa();
        $siswa->id = $result['id'];
        $siswa->nama_pengguna = $result['nis'];
        $siswa->nama_pengguna = $result['nama'];
        $siswa->nama_pengguna = $result['jurusan'];
        $siswa->nama_pengguna = $result['kelas'];
        $siswa->nama_pengguna = $result['kata_sandi'];

        return $siswa;
    }
}

?>