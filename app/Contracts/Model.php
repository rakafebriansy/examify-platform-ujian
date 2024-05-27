<?php

namespace App\Contracts;

interface IModel
{
    public function insert(): bool;
    // public function insertGetId(): bool|int;
    public function update(): bool;
    public function delete(): bool;
    public static function find(int $id): object|bool;
    public static function all(): array|null;
}

?>