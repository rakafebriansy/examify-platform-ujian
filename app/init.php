<?php
session_start();

require 'vendor/autoload.php';
require 'app/Contracts/Model.php';
require 'app/Core/Env.php';
require 'app/Core/Database.php';
require 'app/Core/Cursor.php';
require 'app/Core/Seeder.php';
require 'app/Core/Model.php';
require 'app/Core/Request.php';
require 'app/Core/Router.php';
require 'app/Core/View.php';
require 'app/Models/Admin.php';
require 'app/Models/DetailSoal.php';
require 'app/Models/DetailUjian.php';
require 'app/Models/Guru.php';
require 'app/Models/Jawaban.php';
require 'app/Models/MataPelajaran.php';
require 'app/Models/Siswa.php';
require 'app/Models/Soal.php';
require 'app/Models/Token.php';
require 'app/Models/Ujian.php';
require 'app/Requests/AdminLoginRequest.php';
require 'app/Requests/AdminMataPelajaranRequest.php';
require 'app/Requests/GuruBuatSoalRequest.php';
require 'app/Requests/GuruLoginRequest.php';
require 'app/Requests/GuruRegisterRequest.php';
require 'app/Requests/SiswaLoginRequest.php';
require 'app/Requests/SiswaRegisterRequest.php';
require 'app/Controllers/HomeController.php';
require 'app/Controllers/Admin/RegisterController.php';
require 'app/Controllers/Admin/LoginController.php';
require 'app/Controllers/Admin/MataPelajaranController.php';
// require 'app/Controllers/Admin/DashboardController.php';
require 'app/Controllers/Guru/RegisterController.php';
require 'app/Controllers/Guru/LoginController.php';
require 'app/Controllers/Guru/DashboardController.php';
require 'app/Controllers/Guru/UjianController.php';
require 'app/Controllers/Siswa/RegisterController.php';
require 'app/Controllers/Siswa/LoginController.php';
// require 'app/Controllers/Siswa/DashboardController.php';
// require 'app/Controllers/Siswa/UjianController.php';

?>