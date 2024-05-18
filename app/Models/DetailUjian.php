<?php

namespace App\Models;
use App\Contracts\IModel;
use App\Core\Cursor;
use App\Core\Model;

class DetailUjian extends Model implements IModel
{
    private static string $table = 'detail_ujian';
    public ?int $id;
    public int $id_ujian;
    public int $id_siswa;
    public int $skor;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'id_ujian' => $this->id_ujian,
            'id_siswa' => $this->id_siswa,
            'skor' => $this->skor,
        ];
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'id_ujian' => $this->id_ujian,
            'id_siswa' => $this->id_siswa,
            'skor' => $this->skor,
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

        $ujian = new DetailUjian();
        $ujian->id = $result['id'];
        $ujian->id_ujian = $result['id_ujian'];
        $ujian->id_siswa = $result['id_siswa'];
        $ujian->skor = $result['skor'];

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