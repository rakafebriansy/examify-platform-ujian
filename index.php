<?php
require 'app/init.php';

use App\Controllers\AjaxController;
use App\Controllers\HomeController;
use App\Core\Router;
use App\Core\Env;

Env::set(__DIR__);

Router::add('GET', '/examify-platform-ujian/', HomeController::class, 'index');
Router::add('GET', '/examify-platform-ujian/admin/login', App\Controllers\Admin\LoginController::class, 'setLogin');
Router::add('POST', '/examify-platform-ujian/admin/login', App\Controllers\Admin\LoginController::class, 'login');
Router::add('GET', '/examify-platform-ujian/admin/mata-pelajaran', App\Controllers\Admin\MataPelajaranController::class, 'setMataPelajaran');
Router::add('POST', '/examify-platform-ujian/admin/mata-pelajaran', App\Controllers\Admin\MataPelajaranController::class, 'buatMataPelajaran');
Router::add('POST', '/examify-platform-ujian/admin/mata-pelajaran/hapus', App\Controllers\Admin\MataPelajaranController::class, 'hapusMataPelajaran');
Router::add('GET', '/examify-platform-ujian/guru/login', App\Controllers\Guru\LoginController::class, 'setLogin');
Router::add('POST', '/examify-platform-ujian/guru/login', App\Controllers\Guru\LoginController::class, 'login');
Router::add('GET', '/examify-platform-ujian/guru/register', App\Controllers\Guru\RegisterController::class, 'setRegister');
Router::add('POST', '/examify-platform-ujian/guru/register', App\Controllers\Guru\RegisterController::class, 'register');
Router::add('GET', '/examify-platform-ujian/guru/ujian', App\Controllers\Guru\UjianController::class, 'setUjian');
Router::add('POST', '/examify-platform-ujian/guru/ujian', App\Controllers\Guru\UjianController::class, 'buatUjian');
Router::add('POST', '/examify-platform-ujian/guru/ujian/hapus', App\Controllers\Guru\UjianController::class, 'hapusUjian');
Router::add('POST', '/examify-platform-ujian/guru/ujian/ubah', App\Controllers\Guru\UjianController::class, 'ubahUjian');
Router::add('POST', '/examify-platform-ujian/guru/soal', App\Controllers\Guru\UjianController::class, 'buatSoal');
Router::add('GET', '/examify-platform-ujian/guru/soal/([0-9a-zA-Z]*)', App\Controllers\Guru\UjianController::class, 'setSoal');
Router::add('GET', '/examify-platform-ujian/siswa/login', App\Controllers\Siswa\LoginController::class, 'setLogin');
Router::add('POST', '/examify-platform-ujian/siswa/login', App\Controllers\Siswa\LoginController::class, 'login');
Router::add('GET', '/examify-platform-ujian/siswa/register', App\Controllers\Siswa\RegisterController::class, 'setRegister');
Router::add('POST', '/examify-platform-ujian/siswa/register', App\Controllers\Siswa\RegisterController::class, 'register');
Router::add('GET', '/examify-platform-ujian/siswa/ujian', App\Controllers\Siswa\UjianController::class, 'setUjian');
Router::add('GET', '/examify-platform-ujian/siswa/ujian/([0-9a-zA-Z]*)', App\Controllers\Siswa\UjianController::class, 'ujian');
Router::add('POST', '/examify-platform-ujian/siswa/ujian/([0-9a-zA-Z]*)', App\Controllers\Siswa\UjianController::class, 'submitUjian');
Router::add('GET', '/examify-platform-ujian/siswa/riwayat-ujian', App\Controllers\Siswa\UjianController::class, 'setRiwayatUjian');
Router::add('GET', '/examify-platform-ujian/siswa-ujian/([0-9a-zA-Z]*)', App\Controllers\Siswa\UjianController::class, 'findUjian');

Router::add('POST', '/examify-platform-ujian/ajax/ubah-ujian', App\Controllers\Guru\UjianController::class, 'ajaxUbahUjian');

Router::add('POST', '/examify-platform-ujian/logout', App\Controllers\HomeController::class, 'logout');
Router::add('GET', '/examify-platform-ujian/fresh', App\Controllers\HomeController::class, 'fresh');

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