<?php
require 'app/init.php';

use App\Core\Router;
use App\Core\View;
use App\Core\Cursor;
use App\Core\Env;
use App\Models\Admin;
use App\Models\Token;

Env::set(__DIR__);

Router::add('/', 'GET', function () { return View::set('index'); });
// Router::url('login', 'get', 'AuthController::login');

Router::run();
?>