<?php $title = 'Contact App'; 
use App\Core\View;?>

<?php ob_start(); ?>
<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4 text-center">Welcome to Contact App</h1>
        <p class="lead text-center">A simple app to manage your contacts.</p>
        <hr class="my-4">
        <p class="text-center">Please log in or register to continue.</p>
        <div class="btns d-flex justify-content-center">
            <a class="btn btn-primary btn-lg mr-2" href="<?= View::path('/admin/login'); ?>" role="button">Login</a>
            <a class="btn btn-success btn-lg ml-2" href="<?= View::path('/admin/register'); ?>" role="button">Register</a>
        </div>
    </div>
</div>
<?php $body = ob_get_clean(); ?>

<?php include 'master.php'; ?>