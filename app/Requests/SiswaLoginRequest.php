<?php

namespace App\Requests;

use App\Core\Request;

class SiswaLoginRequest extends Request
{
    public function check(array $request): bool
    {
        try {
            $this->result = $this->required('NIS', $request['NIS']);
            $this->result = $this->required('Nama', $request['nama']);
            return $this->result;
        } catch (\TypeError $e) {
            return false;
        }
    }
}

?>