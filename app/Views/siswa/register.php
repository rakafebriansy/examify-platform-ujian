<?php 
$path = __DIR__ . '/..';
$css = '../public/css/auth.css'; 
$js = '../public/js/register.js'; 
?>

<?php ob_start(); ?>
<main>
    <div class="row m-0 position-relative">
        <?php if(isset($_SESSION['errors'])): ?>
            <div class="alert alert-danger position-absolute start-50 translate-middle" style="max-width:32rem; top:3rem" role="alert">
                <?= $_SESSION['errors'];?>
            </div>
        <?php unset($_SESSION['errors']); endif ?>
        <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-primary position-absolute start-50 translate-middle" style="max-width:32rem; top:3rem" role="alert">
            <?= $_SESSION['success'];?>
        </div>
        <?php unset($_SESSION['success']); endif ?>
        <form action="/examify/siswa/register" method="POST" class="col d-flex flex-column align-items-center position-relative justify-content-center">
            <div class="flex justify-content-start px-4 py-5 position-absolute top-0" style="width: 100% !important;">
                <a href="/examify/">
                    <svg style="top: 2rem !important; left: 2rem !important;" width="32" height="32" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.867 34.6667L35.8003 49.6001L32.0003 53.3334L10.667 32.0001L32.0003 10.6667L35.8003 14.4001L20.867 29.3334H53.3337V34.6667H20.867Z" fill="white"/>
                    </svg>
                </a>
            </div>
            <div class="mb-1 text-center">
                <h3>REGISTRASI</h3>
                <p>Silahkan isi Data berikut untuk registrasi</p>
            </div>
            <div class="mb-2 text-box">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" id="nis">
            </div>
            <div class="mb-2 text-box">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama">
            </div>
            <div class="mb-4 text-box">
                <label for="kata_sandi" class="form-label">Kata Sandi</label>
                <input type="password" name="kata_sandi" class="form-control" id="kata_sandi">
            </div>
            <div class="mb-4 text-box d-flex justify-content-between">
                <div id="dropdowns" class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group kelas" role="group">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kelas
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">10</a></li>
                            <li><a class="dropdown-item" href="#">11</a></li>
                            <li><a class="dropdown-item" href="#">12</a></li>
                        </ul>
                        <input type="hidden" name="kelas" id="input-kelas">
                    </div>
                    <div class="btn-group jurusan" role="group">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Jurusan
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">MIPA</a></li>
                            <li><a class="dropdown-item" href="#">IPS</a></li>
                        </ul>
                        <input type="hidden" name="jurusan" id="input-jurusan">
                    </div>
                </div>
            </div>
            <div class="mb-2 text-box d-grid col-12">
                <button class="btn btn-primary" type="submit">REGISTER</button>
            </div>
            <p>Sudah memiliki akun? <a href="/examify/siswa/login">Klik disini!</a></p>
        </form>
        <div class="col-9 p-0">
            <img class="hero-auth" src="../public/images/hero-1.png" alt="">
        </div>
    </div>
</main>
<?php $body = ob_get_clean(); ?>

<?php include $path . '/layout/main.php'; ?>