<?php

namespace App\Models;

use App\Contracts\IModel;
use App\Core\Cursor;
use App\Core\Model;

class Guru extends Model implements IModel
{
    private static string $table = 'guru';
    public ?int $id;
    public string $nip;
    public string $nama;
    public string $jabatan;
    public string $kata_sandi;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'nip' => $this->nip,
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'kata_sandi' => $this->kata_sandi,
        ];
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'nip' => $this->nip,
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
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

        $guru = new MataPelajaran();
        $guru->id = $result['id'];
        $guru->nip = $result['nip'];
        $guru->nama = $result['nama'];
        $guru->jabatan = $result['jabatan'];
        $guru->kata_sandi = $result['kata_sandi'];

        return $guru;
    }    
    public static function all(): array|null
    {
        $db = new Cursor();

        if(!isset($result)) {
            return null;
        }

        $admins = $db->readMany(self::$table);
        $db->close();
        return $admins;
    }
}

?>