<?php

namespace App\Requests;

use App\Core\Request;

class GuruBuatSoalRequest extends Request
{
    public function check(array $request): bool
    {
        try {
            $this->result = $this->required('Pertanyaan', $request['pertanyaan']);
            $this->result = $this->required('Opsi A', $request['jawaban']['opsi_a']);
            $this->result = $this->required('Opsi B', $request['jawaban']['opsi_b']);
            $this->result = $this->required('Opsi C', $request['jawaban']['opsi_c']);
            $this->result = $this->required('Opsi D', $request['jawaban']['opsi_d']);
            $this->result = $this->required('Kunci Jawaban', $request['kunci_jawaban']);
            return $this->result;
        } catch (\TypeError $e) {
            return false;
        }
    }
}
?>