<?php

namespace App\Models;
use App\Contracts\IModel;
use App\Core\Cursor;
use App\Core\Model;

class Token extends Model implements IModel
{
    private static string $table = 'token';
    public ?int $id;
    public string $token;
    public int $id_admin;
    
    public function __construct() {
        parent::__construct();
    }
    public function insert(): bool
    {
        $data = [
            'token' => $this->token,
            'id_admin' => $this->id_admin
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
            'token' => $this->token,
            'id_admin' => $this->id_admin
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
    public static function find(int $id): object|null
    {
        $db = new Cursor();
        try {
            $db->connect();
            $result = $db->readOne(self::$table, ['id','=',$id]);
            $db->close();

            $token = new Token();
            $token->id = $result['id'];
            $token->token = $result['token'];
            $token->id_admin = $result['id_admin'];

            return $token;
        } catch (\PDOException $e) {
            throw $e;
        }
    }    
    public static function all(): array|null
    {
        $db = new Cursor();
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