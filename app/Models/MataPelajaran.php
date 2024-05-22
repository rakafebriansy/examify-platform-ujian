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
    public int $id_admin;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'nama' => $this->nama,
            'id_admin' => $this->id_admin,
        ];
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'nama' => $this->nama,
            'id_admin' => $this->id_admin,
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
            $mata_pelajaran = new MataPelajaran();
            $mata_pelajaran->id = $result['id'];
            $mata_pelajaran->nama = $result['nama'];
            $mata_pelajaran->id_admin = $result['id_admin'];
    
            return $mata_pelajaran;
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

        $mata_pelajarans = [];
        foreach($result as $row) {
            $mata_pelajaran = new MataPelajaran();
            $mata_pelajaran->id = $row['id'];
            $mata_pelajaran->nama = $row['nama'];
            $mata_pelajaran->id_admin = $row['id_admin'];
            $mata_pelajarans[] = $mata_pelajaran;
        }
        
        $db->close();
        return $mata_pelajarans;
    }
}

?>