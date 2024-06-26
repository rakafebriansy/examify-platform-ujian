<?php

namespace App\Controllers\Admin;

use App\Core\View;
use App\Models\MataPelajaran;
use App\Requests\AdminMataPelajaranRequest;

class MataPelajaranController
{
    private AdminMataPelajaranRequest $admin_mata_pelajaran_request;
    public function __construct() {
        $this->admin_mata_pelajaran_request = new AdminMataPelajaranRequest();
    }
    public function setMataPelajaran()
    {
        $mata_pelajarans = MataPelajaran::all();
        View::set('admin/mata-pelajaran',[
            'title' => 'Admin | Mata Pelajaran',
            'mata_pelajarans' => $mata_pelajarans
        ]);
    }
    public function buatMataPelajaran()
    {
        if ($this->admin_mata_pelajaran_request->check($_POST)) {
            $mata_pelajaran = new MataPelajaran();
            $mata_pelajaran->nama = $_POST['nama'];
            $mata_pelajaran->id_admin = $_SESSION['id_admin'];
            if($mata_pelajaran->insert()){
                $message = 'Mata pelajaran berhasil ditambahkan.';
                View::redirectWith('/examify-platform-ujian/admin/mata-pelajaran',$message);
            }
            $message = 'Mata pelajaran gagal ditambahkan.';
            View::redirectWith('/examify-platform-ujian/admin/mata-pelajaran',$message,true);
        }
        $message = $this->admin_mata_pelajaran_request->getMessage();
        View::redirectWith('/examify-platform-ujian/admin/mata-pelajaran',$message,true);
    }
    public function hapusMataPelajaran()
    {
        if (isset($_POST['id'])) {
            $mata_pelajaran = MataPelajaran::find($_POST['id']);
            if($mata_pelajaran->delete()){
                $message = 'Mata pelajaran berhasil dihapus.';
                View::redirectWith('/examify-platform-ujian/admin/mata-pelajaran',$message);
            }
        }
        $message = 'Mata pelajaran gagal dihapus.';
        View::redirectWith('/examify-platform-ujian/admin/mata-pelajaran',$message,true);
    }
}

?>