<?php

namespace App\Models;

use App\Contracts\IModel;
use App\Core\Cursor;
use App\Core\Model;

class Admin extends Model implements IModel
{
    private static string $table = 'admin';
    public ?int $id;
    public string $nama_pengguna;
    public string $kata_sandi;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'nama_pengguna' => $this->nama_pengguna,
            'kata_sandi' => $this->kata_sandi
        ];
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'nama_pengguna' => $this->nama_pengguna,
            'kata_sandi' => $this->kata_sandi
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
        
        $admin = new Admin();
        $admin->id = $result['id'];
        $admin->nama_pengguna = $result['nama_pengguna'];
        $admin->kata_sandi = $result['kata_sandi'];

        return $admin;
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