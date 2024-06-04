<?php 
$path = __DIR__ . '/..';
$css = '../public/css/berlangsung.css'; 
$js = '../public/js/berlangsung.js'; 
?>

<?php ob_start(); ?>
<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary" style="background-color: white !important;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img id="logo-label" src="../public/images/logo-label.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <form action="/examify-platform-ujian/logout" method="post" class="navbar-nav">
        <button type="submit" class="rounded-pill p-2 border border-0" style="background-color: white !important;">
          Logout
        </button>
      </form>
    </div>
  </div>
</nav>
<main class="position-relative">
  <div class="container d-flex justify-content-center flex-column align-items-start" style="width:100%">
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
    <h3>Halo <?= $siswa->nama;?>, Selamat Datang Kembali!</h3>
    <div class="table-container mt-3 rounded">
      <h4>DAFTAR UJIAN YANG SEDANG BERLANGSUNG</h4>
      <form id="formCari" method="GET" class="input-group mb-4">
        <input type="text" id="searching" class="form-control" placeholder="Cari.." aria-label="Cari.." aria-describedby="button-addon2">
        <button class="btn btn-outline-primary d-flex align-items-center py-2 px-4 m-0" type="button" onclick="cariUjian()" id="button-addon2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
          </svg>
        </button>
      </form>
      <div class="row justify-content-around gap-4">
        <?php if(count($ujians)): ?>
          <?php foreach($ujians as $i => $ujian): ?>
            <div class="card col-4 px-0 position-relative small-shadow" style="width:30%;">
              <img src="../public/images/ujian-1.png" style="width:100%;" class="card-img-top" alt="ujian-<?=$i+1?>">
              <pp class="card-body">
                <?php if(isset($ujian['skor'])): ?>
                  <div class="d-flex justify-content-between">
                    <p class="card-text m-0"><?= $ujian['nama_ujian'];?></p>
                    <p class="border-success border m-0 px-1 py-1 rounded" style="font-size: 0.7rem;">Skor: <?= $ujian['skor'];?></p>
                  </div>
                <?php else: ?>
                    <p class="card-text"><a href="/examify-platform-ujian/siswa/ujian/<?=$ujian['id']?>" style="color: #052C65; text-decoration:none;"><?= $ujian['nama_ujian'];?></a></p>
                <?php endif; ?>
              </pp>
              <div class="position-absolute p-2 fs-6 rounded bg-primary" style="color:white; top:0.6rem; left:0.6rem;"><?= $ujian['mata_pelajaran'];?></div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-center">Data tidak tersedia.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>


<?php $body = ob_get_clean(); ?>

<?php include __DIR__ . '/../layout/main.php'; ?>