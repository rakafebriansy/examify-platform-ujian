<?php

namespace App\Controllers;
use App\Core\View;
use App\Models\Ujian;

class AjaxController
{
    public function ubahUjian()
    {
        $id = $_POST['id'];
        $ujian = Ujian::findJSON($id);
        echo json_encode($ujian);
    }
}

?>