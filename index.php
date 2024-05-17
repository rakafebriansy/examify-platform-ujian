<?php
require 'app/init.php';

use App\Core\Router;
use App\Core\View;
use Config\Env;
use App\Models\Admin;

Env::parse(__DIR__);

Router::add('/', 'GET', function () { return View::set('home'); });
// Router::url('login', 'get', 'AuthController::login');

Router::run();
?>