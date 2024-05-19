<?php

namespace App\Requests;

use App\Core\Request;

class AdminLoginRequest extends Request
{
    public function check(array $request): bool
    {
        try {
            $this->result = $this->required('Nama pengguna', $request['nama_pengguna']);
            $this->result = $this->required('Kata sandi', $request['kata_sandi']);
            return $this->result;
        } catch (\TypeError $e) {
            return false;
        }
    }
}

?>