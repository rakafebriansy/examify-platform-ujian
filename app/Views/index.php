<?php $title = 'EXAMIFY';?>

<?php ob_start(); ?>
<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img id="logo-label" src="public/images/logo-label.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <div class="dropdown-center">
          <button class="btn btn-outline-primary ms-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Register
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="/siswa/register">Siswa</a></li>
            <li><a class="dropdown-item" href="/guru/register">Guru</a></li>
            <li><a class="dropdown-item" href="/admin/register">Admin</a></li>
          </ul>
        </div>
        <div class="dropdown-center">
          <button class="btn btn-primary ms-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="/siswa/login">Siswa</a></li>
            <li><a class="dropdown-item" href="/guru/login">Guru</a></li>
            <li><a class="dropdown-item" href="/admin/login">Admin</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
<main>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-touch="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="public\images\hero-1.png" class="d-block w-100" alt="...">
        <img src="public\images\hero-1-mobile.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="public\images\hero-1.png" class="d-block w-100" alt="...">
        <img src="public\images\hero-1-mobile.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="public\images\hero-1.png" class="d-block w-100" alt="...">
        <img src="public\images\hero-1-mobile.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</main>
<?php $body = ob_get_clean(); ?>

<?php include 'layout/main.php'; ?>