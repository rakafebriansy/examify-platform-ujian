<?php

namespace App\Requests;

use App\Core\Request;

class SiswaRegisterRequest extends Request
{
    public function check(array $request): bool
    {
        try {
            $this->result = $this->required('NIS', $request['nis']);
            $this->result = $this->required('Nama', $request['nama']);
            $this->result = $this->required('Jurusan', $request['jurusan']);
            $this->result = $this->required('Kelas', $request['kelas']);
            $this->result = $this->required('Kata sandi', $request['kata_sandi']);
            return $this->result;
        } catch (\TypeError $e) {
            return false;
        }
    }
}

?>