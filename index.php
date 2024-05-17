<?php
require 'app/init.php';

use App\Core\Router;
use App\Core\View;
use App\Core\Cursor;
use App\Core\Env;
use App\Models\Admin;

Env::set(__DIR__);

var_dump(Admin::find(1));

// Router::add('/', 'GET', function () { return View::set('home'); });
// Router::url('login', 'get', 'AuthController::login');

// Router::run();
?>