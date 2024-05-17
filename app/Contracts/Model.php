<?php

namespace App\Contracts;

interface IModel
{
    public function insert(): bool;
    public function update(): bool;
    public function delete(): bool;
    public static function find(int $id): array;
    public static function all(): array|null;
}

?>