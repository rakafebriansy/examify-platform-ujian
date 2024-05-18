<?php

namespace App\Controllers\Admin;

use App\Core\View;
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
        $request = $_GET;
        if ($this->admin_login_request->check($request)) {
            $admin = Admin::findBy('nama_pengguna',$request['nama_pengguna']);
            if(isset($admin) &&  password_verify($request['kata_sandi'],$admin->kata_sandi)){
                $_SESSION['id_admin'] = $admin->id;
                View::redirectTo('/admin/dashboard');
            }
            $message = 'Nama pengguna atau kata sandi salah.';
            View::redirectWith('/admin/register',$message,true);
        }
        $message = $this->admin_login_request->getMessage();
        View::redirectWith('/admin/register',$message,true);

    }
}

?>