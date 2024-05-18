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
        $errors = [];
        $request = $_GET;
        if ($this->admin_login_request->check($request)) {
            $admin = Admin::findBy('nama_pengguna',$request['nama_pengguna']);
            if(isset($admin) && $admin->kata_sandi == $request['kata_sandi']){
                $_SESSION['id_admin'] = $admin->id;
                header('Location: /admin/dashboard');
            }
            $errors['errors'] = 'Nama pengguna atau kata sandi salah.';
            $_SESSION['errors'] = $errors;
            header('Location: /admin/register');
        }
        $errors['name'] = $this->admin_login_request->getMessage();
        $_SESSION['errors'] = $errors;
        header('Location: /admin/register');
        exit; 
    }
}

?>