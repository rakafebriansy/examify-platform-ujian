<?php

namespace App\Models;

use App\Contracts\IModel;
use App\Core\Cursor;
use App\Core\Model;

class Soal extends Model implements IModel
{
    private static string $table = 'soal';
    public ?int $id;
    public string $pertanyaan;
    public string $kunci_jawaban;
    public int $id_guru;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'pertanyaan' => $this->pertanyaan,
            'kunci_jawaban' => $this->kunci_jawaban,
            'id_guru' => $this->id_guru,
        ];
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'pertanyaan' => $this->pertanyaan,
            'kunci_jawaban' => $this->kunci_jawaban,
            'id_guru' => $this->id_guru,
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

        $soal = new MataPelajaran();
        $soal->id = $result['id'];
        $soal->nama_pengguna = $result['pertanyaan'];
        $soal->nama_pengguna = $result['kunci_jawaban'];
        $soal->nama_pengguna = $result['id_guru'];

        return $soal;
    }    
    public static function all(): array|null
    {
        $db = new Cursor();

        if(!isset($result)) {
            return null;
        }

        $soals = $db->readMany(self::$table);
        $db->close();
        return $soals;
    }
}

?>