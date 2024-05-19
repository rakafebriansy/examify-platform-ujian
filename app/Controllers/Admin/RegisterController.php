<?php

namespace App\Controllers\Admin;

use App\Core\View;
use App\Models\Admin;
use App\Models\Token;
use App\Requests\AdminTokenRequest;

class RegisterController
{
    public function setToken()
    {
        
    }
    public function token(): void
    {
        $id = $_SESSION['id_admin'];
        $token = new Token();
        $token->token = uniqid();
        $token->id_admin = $id;
        if($token->insert()) {
            $message = 'Token berhasil ditambahkan.';
            View::redirectWith('/admin/token',$message);
        }
        $message = 'Nama pengguna atau kata sandi salah.';
        View::redirectWith('/admin/token',$message,true);
    }
}

?>