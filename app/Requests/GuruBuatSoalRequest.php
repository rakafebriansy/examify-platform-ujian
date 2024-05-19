<?php

namespace App\Requests;

use App\Core\Request;

class GuruBuatSoalRequest extends Request
{
    public function check(array $request): bool
    {
        try {
            $this->result = $this->required('Pertanyaan', $request['pertanyaan']);
            $this->result = $this->required('Jawaban', $request['jawaban']);
            return $this->result;
        } catch (\TypeError $e) {
            return false;
        }
    }
}
?>