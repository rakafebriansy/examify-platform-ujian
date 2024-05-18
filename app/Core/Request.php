<?php

namespace App\Core;

abstract class Request
{
    protected bool $result;
    protected string $error_message;
    protected array $message_bags = [
        'required' => '# tidak boleh kosong',
    ];

    protected function required(string $value): bool
    {
        $trimmed = trim($value);
        if(strlen($trimmed) > 0) {
            $this->error_message = $this->message_bags['required'];
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