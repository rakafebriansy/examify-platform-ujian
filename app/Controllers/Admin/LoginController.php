<?php

namespace App\Controllers\Admin;

use App\Core\View;
use App\Models\Admin;
use App\Requests\AdminLoginRequest;

class LoginController
{
    private AdminLoginRequest $admin_login_request;
    public function __construct() {
        $this->admin_login_request = new AdminLoginRequest();
    }
    public function setLogin()
    {
        View::set('admin/login',[
            'title' => 'Admin | Login'
        ]);
    }
    public function login()
    {
        $request = $_POST;
        if ($this->admin_login_request->check($request)) {
            $admin = Admin::findBy('nama_pengguna',$request['nama_pengguna']);
            if(isset($admin) &&  password_verify($request['kata_sandi'],$admin->kata_sandi)){
                $_SESSION['id_admin'] = $admin->id;
                View::redirectTo('/examify/admin/dashboard');
            }
            $message = 'Nama pengguna atau kata sandi salah.';
            View::redirectWith('/examify/admin/login',$message,true);
        }
        $message = $this->admin_login_request->getMessage();
        View::redirectWith('/examify/admin/login',$message,true);
    }
}

?>