<?php

namespace App\Core;

abstract class Request
{
    protected bool $result;
    protected string $error_message;
    protected array $message_bags = [
        'required' => '# tidak boleh kosong.',
        'exists' => '# tidak tersedia.',
    ];

    protected function undefined(string $column): bool
    {
        $message = $this->message_bags['required'];
        $this->error_message = str_replace('#', $column, $message);
        return false;
    }
    protected function required(string $header, string $value): bool
    {
        $trimmed = trim($value);
        if(strlen($trimmed) == 0) {
            $message = $this->message_bags['required'];
            $this->error_message = str_replace('#', $header, $message);
            return false;
        }
        return true;
    }
    protected function exists(string $header, string $table, string $column, string $value): bool
    {
        $cursor = new Cursor();
        $result = $cursor->executeNonQuery('SELECT * FROM ' . $table . ' WHERE ' . $column . ' = ' . $value);
        if($result) {
            return true;
        }
        $message = $this->message_bags['exists'];
        $this->error_message = str_replace('#', $column, $message);
        return false;
    }
    public function getMessage()
    {
        return $this->error_message;
    }
    public abstract function check(array $request): bool;
}

?>