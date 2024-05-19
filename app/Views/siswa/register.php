<?php 
$path = __DIR__ . '/..';
$css = '../public/css/auth.css'; 
$js = '../public/js/admin-register.js'; 
?>

<?php ob_start(); ?>
<main>
    <div class="row m-0">
        <?php if(isset($_SESSION['errors'])): ?>
            <?php echo $_SESSION['errors'] ?>
            <script>alert($_SESSION['errors'])</script>
        <?php unset($_SESSION['errors']); endif ?>
        <form action="/examify/siswa/register" method="POST" class="col d-flex flex-column align-items-center justify-content-center">
            <div class="mb-1 text-center">
                <h3>REGISTRASI</h3>
                <p>Silahkan isi Data berikut untuk registrasi</p>
            </div>
            <div class="mb-2 text-box">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" id="nis">
            </div>
            <div class="mb-2 text-box">
                <label for="kata_sandi" class="form-label">Kata Sandi</label>
                <input type="password" name="kata_sandi" class="form-control" id="kata_sandi">
            </div>
            <div class="mb-4 text-box">
                <label for="token" class="form-label">Token</label>
                <input type="text" name="token" class="form-control" id="token">
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