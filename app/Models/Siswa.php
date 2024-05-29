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
    public static function find(int $id): object|false
    {
        $db = new Cursor();
        $result = $db->readOne(self::$table, ['id','=',$id]);
        
        if($result) {
            $siswa = new Siswa();
            $siswa->id = $result['id'];
            $siswa->nis = $result['nis'];
            $siswa->nama = $result['nama'];
            $siswa->jurusan = $result['jurusan'];
            $siswa->kelas = $result['kelas'];
            $siswa->kata_sandi = $result['kata_sandi'];
    
            return $siswa;
        }
        
        return false;
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
    public static function findBy(string $column,string $nama_pengguna): object|bool
    {
        $db = new Cursor();
        $result = $db->readOne(self::$table, [$column,'=',$nama_pengguna]);

        if($result) {
            $siswa = new Siswa();
            $siswa->id = $result['id'];
            $siswa->nis = $result['nis'];
            $siswa->nama = $result['nama'];
            $siswa->jurusan = $result['jurusan'];
            $siswa->kelas = $result['kelas'];
            $siswa->kata_sandi = $result['kata_sandi'];
            
            return $siswa;
        }
        
        return false;
    }
}

?>