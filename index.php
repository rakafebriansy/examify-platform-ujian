<?php
require 'app/init.php';

use App\Core\Router;
use App\Core\View;
use App\Core\Cursor;
use App\Core\Env;
use App\Models\Admin;
use App\Models\Token;

Env::set(__DIR__);

// $admin = Admin::find(1);
// $token = new Token();
// $token->token = uniqid();
// $token->id_admin = $admin->id;
// $result = $token->insert();
// $result = Token::find(1);
// var_dump($result);


// Router::add('/', 'GET', function () { return View::set('home'); });
// Router::url('login', 'get', 'AuthController::login');

// Router::run();
?>