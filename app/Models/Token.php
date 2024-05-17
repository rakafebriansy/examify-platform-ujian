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
        $result = $this->db->create(self::$table,$data);
        return $result;
    }
    public function update(): bool
    {
        $data = [
            'token' => $this->token,
            'id_admin' => $this->id_admin
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

        $token = new Token();
        $token->id = $result['id'];
        $token->token = $result['token'];
        $token->id_admin = $result['id_admin'];

        return $token;
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