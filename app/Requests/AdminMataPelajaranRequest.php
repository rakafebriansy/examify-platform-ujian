<?php

namespace App\Requests;

use App\Core\Request;

class AdminMataPelajaranRequest extends Request
{
    public function check(array $request): bool
    {
        try {
            $this->result = $this->required('Nama mata pelajaran', $request['nama']);
            return $this->result;
        } catch (\TypeError $e) {
            return false;
        }
    }
}

?>