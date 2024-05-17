<?php

namespace App\Models;

use App\Contracts\IModel;
use App\Core\Cursor;
use App\Core\Model;

class Jawaban extends Model implements IModel
{
    private static string $table = 'jawaban';
    public ?int $id;
    public string $jawaban;
    public string $opsi;
    public int $id_soal;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'jawaban' => $this->jawaban,
            'opsi' => $this->opsi,
            'id_soal' => $this->id_soal,
        ];
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'jawaban' => $this->jawaban,
            'opsi' => $this->opsi,
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
    public static function find(int $id): object|null
    {
        $db = new Cursor();
        $result = $db->readOne(self::$table, ['id','=',$id]);

        if(!isset($result)) {
            return null;
        }

        $jawaban = new MataPelajaran();
        $jawaban->id = $result['id'];
        $jawaban->nama_pengguna = $result['jawaban'];
        $jawaban->nama_pengguna = $result['opsi'];
        $jawaban->nama_pengguna = $result['id_soal'];

        return $jawaban;
    }    
    public static function all(): array|null
    {
        $db = new Cursor();

        if(!isset($result)) {
            return null;
        }
        
        $jawabans = $db->readMany(self::$table);
        $db->close();
        return $jawabans;
    }
}

?>