<?php

namespace App\Requests;

use App\Core\Request;

class GuruRegisterRequest extends Request
{
    public function check(array $request): bool
    {
        try {
            $this->result = $this->required('NIP', $request['nip']);
            $this->result = $this->required('Nama', $request['nama']);
            $this->result = $this->required('Kata sandi', $request['kata_sandi']);
            return $this->result;
        } catch (\TypeError $e) {
            return false;
        }
    }
}

?>