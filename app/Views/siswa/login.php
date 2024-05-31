<?php 
$path = __DIR__ . '/..';
$css = '../public/css/auth.css'; 
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
        <form action="/examify/siswa/login" method="POST" class="col d-flex flex-column align-items-center justify-content-center">
            <div class="mb-1 text-center">
                <h3>LOG IN</h3>
                <p>Silahkan isi NIS dan Kata Sandi anda untuk Login</p>
            </div>
            <div class="mb-2 text-box">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" id="nis">
            </div>
            <div class="mb-4 text-box">
                <label for="kata_sandi" class="form-label">Kata Sandi</label>
                <input type="password" name="kata_sandi" class="form-control" id="kata_sandi">
            </div>
            <div class="mb-2 text-box d-grid col-12">
                <button class="btn btn-primary" type="submit">LOG IN</button>
            </div>
            <p class="fs-6">Belum memiliki akun? <a href="/examify/siswa/register">Daftar disini!</a></p>
        </form>
        <div class="col-9 p-0">
            <img class="hero-auth" src="../public/images/hero-1.png" alt="">
        </div>
    </div>
</main>
<?php $body = ob_get_clean(); ?>

<?php include $path . '/layout/main.php'; ?>