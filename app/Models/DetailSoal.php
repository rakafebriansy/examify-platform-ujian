<?php

namespace App\Models;
use App\Contracts\IModel;
use App\Core\Cursor;
use App\Core\Model;

class DetailSoal extends Model implements IModel
{
    private static string $table = 'detail_soal';
    public ?int $id;
    public int $id_ujian;
    public int $id_soal;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'id_ujian' => $this->id_ujian,
            'id_soal' => $this->id_soal,
        ];
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'id_ujian' => $this->id_ujian,
            'id_soal' => $this->id_soal,
        ];
        $result = $this->db->update(self::$table, $data, $this->id);
        return $result;
    }
    public function delete(): bool
    {
        $result = $this->db->delete(self::$table,$this->id);
        return $result;
    }
    public static function find(int $id): object|bool
    {
        $db = new Cursor();
        $result = $db->readOne(self::$table, ['id','=',$id]);

        if($result) {
            $ujian = new DetailSoal();
            $ujian->id = $result['id'];
            $ujian->id_ujian = $result['id_ujian'];
            $ujian->id_soal = $result['id_soal'];
            return $ujian;
        }
        
        return false;
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