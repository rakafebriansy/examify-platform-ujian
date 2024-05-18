<?php

namespace App\Request;

use App\Core\Request;

class SiswaLoginRequest extends Request
{
    public function check(array $request): bool
    {
        $this->result = $this->required('NIS', $request['NIS']);
        $this->result = $this->required('Nama', $request['nama']);
        return $this->result;
    }
}

?>