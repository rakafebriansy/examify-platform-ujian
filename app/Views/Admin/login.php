<?php 
$path = __DIR__ . '/..';
$css = '../public/css/login.css'; 
?>

<?php ob_start(); ?>
<main>
    <div class="row m-0">
        <?php if(isset($_SESSION['errors'])): ?>
            <?php echo $_SESSION['errors'] ?>
            <script>alert($_SESSION['errors'])</script>
        <?php unset($_SESSION['errors']); endif ?>
        <form action="/examify/admin/login" method="POST" class="col d-flex flex-column align-items-center justify-content-center">
            <div class="mb-1 text-center">
                <h3>LOG IN</h3>
                <p>Silahkan isi Nama Pengguna dan Kata Sandi anda untuk Login</p>
            </div>
            <div class="mb-2 text-box">
                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna">
            </div>
            <div class="mb-4 text-box">
                <label for="kata_sandi" class="form-label">Kata Sandi</label>
                <input type="password" name="kata_sandi" class="form-control" id="kata_sandi">
            </div>
            <div class="mb-2 text-box d-grid col-12">
                <button class="btn btn-primary" type="submit">LOG IN</button>
            </div>
        </form>
        <div class="col-9 p-0">
            <img class="hero-auth" src="../public/images/hero-1.png" alt="">
        </div>
    </div>
</main>
<?php $body = ob_get_clean(); ?>

<?php include $path . '/layout/main.php'; ?>