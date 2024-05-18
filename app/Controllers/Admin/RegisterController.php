<?php

namespace App\Controllers\Admin;

use App\Models\Admin;
use App\Models\Token;
use App\Request\AdminLoginRequest;

class RegisterController
{
    public function setToken()
    {
        
    }
    public function token(): bool
    {
        $message = [];
        $id = $_SESSION['id_admin'];
        $token = new Token();
        $token->token = uniqid();
        $token->id_admin = $id;
        if($token->insert()) {
            $message['success'] = 'Token berhasil ditambahkan.';
            $_SESSION['success'] = $message;
            header('Location: /admin/token');
            exit;
        }
        $message['errors'] = 'Nama pengguna atau kata sandi salah.';
        $_SESSION['errors'] = $message;
        header('Location: /admin/token');
        exit;
    }
}

?>