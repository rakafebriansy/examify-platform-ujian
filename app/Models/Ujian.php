<?php

namespace App\Models;
use App\Contracts\IModel;
use App\Core\Cursor;
use App\Core\Model;

class Ujian extends Model implements IModel
{
    private static string $table = 'ujian';
    public ?int $id;
    public string $nama;
    public string $tanggal_ujian;
    public string $jenis;
    public int $id_mata_pelajaran;
    public int $id_admin;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'nama' => $this->nama,
            'tanggal_ujian' => $this->tanggal_ujian,
            'jenis' => $this->jenis,
            'id_mata_pelajaran' => $this->id_mata_pelajaran,
            'id_admin' => $this->id_admin
        ];
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'nama' => $this->nama,
            'tanggal_ujian' => $this->tanggal_ujian,
            'jenis' => $this->jenis,
            'id_mata_pelajaran' => $this->id_mata_pelajaran,
            'id_admin' => $this->id_admin
        ];
        $result = $this->db->update(self::$table, $data, $this->id);
        return $result;
    }
    public function delete(): bool
    {
        $result = $this->db->delete(self::$table,$this->id);
        return $result;
    }
    public static function find(int $id): object|null
    {
        $db = new Cursor();
        $result = $db->readOne(self::$table, ['id','=',$id]);

        if(!isset($result)) {
            return null;
        }

        $ujian = new Ujian();
        $ujian->id = $result['id'];
        $ujian->tanggal_ujian = $result['tanggal_ujian'];
        $ujian->jenis = $result['jenis'];
        $ujian->id_mata_pelajaran = $result['id_mata_pelajaran'];
        $ujian->id_admin = $result['id_admin'];

        return $ujian;
    }    
    public static function all(): array|null
    {
        $db = new Cursor();

        if(!isset($result)) {
            return null;
        }

        $tokens = $db->readMany(self::$table);
        $db->close();
        return $tokens;
    }
}

?>