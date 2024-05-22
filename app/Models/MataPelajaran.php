<?php

namespace App\Models;

use App\Contracts\IModel;
use App\Core\Cursor;
use App\Core\Model;

class MataPelajaran extends Model implements IModel
{
    private static string $table = 'mata_pelajaran';
    public ?int $id;
    public string $nama;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'nama' => $this->nama,
        ];
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'nama' => $this->nama,
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

        $mata_pelajaran = new MataPelajaran();
        $mata_pelajaran->id = $result['id'];
        $mata_pelajaran->nama_pengguna = $result['nama'];

        return $mata_pelajaran;
    }    
    public static function all(): array|null
    {
        $db = new Cursor();
        $result = $db->readMany(self::$table);
        
        if(!isset($result)) {
            return null;
        }

        $mata_pelajarans = [];
        foreach($result as $row) {
            $mata_pelajaran = new MataPelajaran();
            $mata_pelajaran->id = $row['id'];
            $mata_pelajaran->nama = $row['nama'];
            $mata_pelajarans[] = $mata_pelajaran;
        }
        
        $db->close();
        return $mata_pelajarans;
    }
}

?>