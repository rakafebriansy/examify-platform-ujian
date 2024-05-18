<?php

namespace App\Controllers\Admin;

use App\Models\Admin;
use App\Request\AdminLoginRequest;

class LoginController
{
    private AdminLoginRequest $admin_login_request;
    public function __construct() {
        $this->admin_login_request = new AdminLoginRequest();
    }
    public function setLogin()
    {
        
    }
    public function login()
    {
        $message = [];
        $request = $_GET;
        if ($this->admin_login_request->check($request)) {
            $admin = Admin::findBy('nama_pengguna',$request['nama_pengguna']);
            if(isset($admin) &&  password_verify($request['kata_sandi'],$admin->kata_sandi)){
                $_SESSION['id_admin'] = $admin->id;
                header('Location: /admin/dashboard');
                exit;
            }
            $message = 'Nama pengguna atau kata sandi salah.';
            $_SESSION['errors'] = $message;
            header('Location: /admin/register');
            exit;
        }
        $message = $this->admin_login_request->getMessage();
        $_SESSION['errors'] = $message;
        header('Location: /admin/register');
        exit; 
    }
}

?>