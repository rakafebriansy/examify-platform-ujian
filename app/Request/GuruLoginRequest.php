<?php

namespace App\Request;

use App\Core\Request;

class GuruLoginRequest extends Request
{
    public function check(array $request): bool
    {
        $this->result = $this->required('NIP', $request['nip']);
        $this->result = $this->required('Kata sandi', $request['kata_sandi']);
        return $this->result;
    }
}
?>