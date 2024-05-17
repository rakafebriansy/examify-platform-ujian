<?php
require 'app/init.php';

use App\Core\Router;
use App\Core\View;
use App\Core\Cursor;
use Config\Env;
use App\Models\Admin;


Router::add('/', 'GET', function () { return View::set('home'); });
// Router::url('login', 'get', 'AuthController::login');

Router::run();
?>