<?php

namespace App\Request;

use App\Core\Request;

class GuruBuatSoalRequest extends Request
{
    public function check(array $request): bool
    {
        $this->result = $this->required('Pertanyaan', $request['pertanyaan']);
        $this->result = $this->required('Jawaban', $request['jawaban']);
        return $this->result;
    }
}
?>