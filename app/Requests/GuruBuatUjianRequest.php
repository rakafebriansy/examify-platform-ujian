<?php

namespace App\Requests;

use App\Core\Request;

class GuruBuatUjianRequest extends Request
{
    public function check(array $request): bool
    {
        try {
            $this->result = $this->required('Nama', $request['nama']);
            $this->result = $this->required('Tanggal ujian', $request['tanggal_ujian']);
            $this->result = $this->required('Mata pelajaran', $request['id_mata_pelajaran']);
            return $this->result;
        } catch (\TypeError $e) {
            return false;
        }
    }
}
?>