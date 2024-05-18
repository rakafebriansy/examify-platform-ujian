<?php

namespace App\Core;

abstract class Request
{
    protected bool $result;
    protected string $error_message;
    protected array $message_bags = [
        'required' => '# tidak boleh kosong.',
    ];

    protected function required(string $column, string $value): bool
    {
        $trimmed = trim($value);
        if(strlen($trimmed) > 0) {
            $message = $this->message_bags['required'];
            $this->error_message = str_replace('#', $column, $this->message_bags['required']);
            return true;
        }
        return false;
    }
    public function getMessage()
    {
        return $this->error_message;
    }
    public abstract function check(array $request): bool;
}

?>