<?php
require 'app/init.php';

use App\Controllers\HomeController;
use App\Core\Router;
use App\Core\View;
use App\Core\Cursor;
use App\Core\Env;
use App\Models\Admin;
use App\Models\Token;

Env::set(__DIR__);

Router::add('GET', '/examify/', HomeController::class, 'index');
Router::add('GET', '/examify/admin/login', App\Controllers\Admin\LoginController::class, 'setLogin');
Router::add('POST', '/examify/admin/login', App\Controllers\Admin\LoginController::class, 'login');

// Router::add('GET', '/users/register', UserController::class, 'register', [MustNotLoginMiddleware::class]);
// Router::add('POST', '/users/register', UserController::class, 'postRegister', [MustNotLoginMiddleware::class]);
// Router::add('GET', '/users/login', UserController::class, 'login', [MustNotLoginMiddleware::class]);
// Router::add('POST', '/users/login', UserController::class, 'postLogin', [MustNotLoginMiddleware::class]);
// Router::add('GET', '/users/logout', UserController::class, 'logout', [MustLoginMiddleware::class]);
// Router::add('GET', '/users/profile', UserController::class, 'updateProfile', [MustLoginMiddleware::class]);
// Router::add('POST', '/users/profile', UserController::class, 'postUpdateProfile', [MustLoginMiddleware::class]);
// Router::add('GET', '/users/password', UserController::class, 'updatePassword', [MustLoginMiddleware::class]);
// Router::add('POST', '/users/password', UserController::class, 'postUpdatePassword', [MustLoginMiddleware::class]);

Router::run();
?>