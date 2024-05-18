<?php

namespace App\Request;

use App\Core\Request;

class AdminLoginRequest extends Request
{
    public function check(array $request): bool
    {
        $this->result = $this->required('nama_pengguna', $request['nama_pengguna']);
        $this->result = $this->required('kata_sandi', $request['kata_sandi']);
        return $this->result;
    }
}

?>