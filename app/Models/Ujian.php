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
    public string $token;
    public int $id_mata_pelajaran;
    public int $id_guru;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'nama' => $this->nama,
            'tanggal_ujian' => $this->tanggal_ujian,
            'token' => uniqid(),
            'id_mata_pelajaran' => $this->id_mata_pelajaran,
            'id_guru' => $this->id_guru
        ];
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'nama' => $this->nama,
            'tanggal_ujian' => $this->tanggal_ujian,
            'id_mata_pelajaran' => $this->id_mata_pelajaran,
            'token' => uniqid(),
        ];
        $result = $this->db->update(self::$table, $data, $this->id);
        return $result;
    }
    public function delete(): bool
    {
        $result = $this->db->delete(self::$table,$this->id);
        return $result;
    }
    public static function find(int $id): object|false
    {
        $db = new Cursor();
        $result = $db->readOne(self::$table, ['id','=',$id]);

        if($result) {
            $ujian = new Ujian();
            $ujian->id = $result['id'];
            $ujian->nama = $result['nama'];
            $ujian->tanggal_ujian = $result['tanggal_ujian'];
            $ujian->token = $result['token'];
            $ujian->id_mata_pelajaran = $result['id_mata_pelajaran'];
            $ujian->id_guru = $result['id_guru'];
    
            return $ujian;
        }
        
        return false;
    }    
    public static function findJSON(int $id): array|false
    {
        $db = new Cursor();
        $result = $db->readOne(self::$table, ['id','=',$id]);

        if($result) {
            $ujian = [];
            $ujian['id'] = $result['id'];
            $ujian['nama'] = $result['nama'];
            $ujian['tanggal_ujian'] = $result['tanggal_ujian'];
            $ujian['token'] = $result['token'];
            $ujian['id_mata_pelajaran'] = $result['id_mata_pelajaran'];
            $ujian['id_guru'] = $result['id_guru'];
    
            return $ujian;
        }
        
        return false;
    }    
    public static function all(): array|null
    {
        $db = new Cursor();
        $result = $db->readMany(self::$table);
        
        if(!isset($result)) {
            return null;
        }

        $ujians = [];
        foreach($result as $row) {
            $ujian = new Ujian();
            $ujian->id = $result['id'];
            $ujian->nama = $result['nama'];
            $ujian->tanggal_ujian = $result['tanggal_ujian'];
            $ujian->token = $result['token'];
            $ujian->id_mata_pelajaran = $result['id_mata_pelajaran'];
            $ujian->id_guru = $result['id_guru'];
            $ujians[] = $ujian;
        }
        
        $db->close();
        return $ujians;
    }
}

?>