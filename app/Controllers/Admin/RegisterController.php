<?php

namespace App\Controllers\Admin;

use App\Models\Admin;
use App\Request\AdminLoginRequest;

class RegisterController
{
    private AdminLoginRequest $admin_login_request;
    public function __construct() {
        $this->admin_login_request = new AdminLoginRequest();
    }
    public function insertToken()
    {

    }
    public function setRegister()
    {
        
    }
    public function register()
    {
        $request = $_GET;
        if ($this->admin_login_request->check($request)) {

        }
        $errors = [
            'name' => $this->admin_login_request->getMessage()
        ];
        $_SESSION['errors'] = $errors;
        header('Location: /admin/register');
        exit; 
    }
}

?>