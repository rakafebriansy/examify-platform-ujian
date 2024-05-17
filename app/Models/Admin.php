<?php

namespace App\Models;

use Config\Database;

class Admin
{
    private static string $table = 'admin';
    private Database $db;
    public ?int $id;
    public string $nama_pengguna;
    public string $kata_sandi;
    
    public function __construct() {
        $this->db = new Database();
    }
    public function insert(): bool
    {
        $data = [
            'nama_pengguna' => $this->nama_pengguna,
            'kata_sandi' => $this->kata_sandi
        ];
        try {
            $this->db->connect();
            $this->db->create(self::$table,$data);
            $this->db->close();
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
    public function update(): bool
    {
        $data = [
            'nama_pengguna' => $this->nama_pengguna,
            'kata_sandi' => $this->kata_sandi
        ];
        try {
            $this->db->connect();
            $this->db->update(self::$table, $data, $this->id);
            $this->db->close();
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
    public function delete(): bool
    {
        try {
            $this->db->connect();
            $this->db->delete(self::$table,$this->id);
            $this->db->close();
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
    public static function find(int $id): array
    {
        $db = new Database();
        try {
            $db->connect();
            $result = $db->readOne(self::$table, ['id','=',$id]);
            $db->close();
            return $result;
        } catch (\PDOException $e) {
            throw $e;
        }
    }    
    public static function all(): array|null
    {
        $db = new Database();
        try {
            $db->connect();
            $admins = $db->readMany(self::$table);
            $db->close();
            return $admins;
        } catch (\PDOException $e) {
            return null;
        }
    }
}

?>