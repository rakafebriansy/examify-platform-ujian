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
      <form action="/examify/logout" method="post" class="navbar-nav">
        <button type="submit" class="rounded-pill p-2 border border-0" style="background-color: white !important;">
          Logout
        </button>
      </form>
    </div>
  </div>
</nav>
<main>
  <div class="container d-flex justify-content-center flex-column align-items-start" style="width:100%">
    <h3>Halo <?= $siswa->nama;?>, Selamat Datang Kembali!</h3>
    <div class="table-container mt-3 rounded">
      <h4>DAFTAR UJIAN YANG SEDANG BERLANGSUNG</h4>
      <form action="/examify/siswa/search-ujian" method="GET" class="input-group mb-4">
        <input type="text" class="form-control" placeholder="Cari.." aria-label="Cari.." aria-describedby="button-addon2">
        <button class="btn btn-outline-primary d-flex align-items-center py-2 px-4 m-0" type="button" id="button-addon2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
          </svg>
        </button>
      </form>
      <div class="row justify-content-around gap-4">
        <?php if(count($ujians)): ?>
          <?php foreach($ujians as $ujian): ?>
            <div class="card col-4 px-0 position-relative small-shadow" style="width:30%;">
              <img src="../public/images/ujian-1.png" style="width:100%;" class="card-img-top" alt="ujian-<?=$i+1?>">
              <div class="card-body">
                <p class="card-text"><a href="/examify/siswa/ujian/<?=$ujian['id']?>" style="color: #052C65; text-decoration:none;"><?= $ujian['nama_ujian'];?></a></p>
              </div>
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

<div class="modal fade" id="buatModal" tabindex="-1" aria-labelledby="buatModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/examify/guru/ujian" method="post" class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="buatModalLabel">Tambah Mata Pelajaran</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama Ujian</label>
          <input type="text" name="nama" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput2" class="form-label">Tanggal Ujian</label>
          <input type="date" name="tanggal_ujian" class="form-control" id="exampleFormControlInput2">
        </div>
        <div class="dropdown">
          <input type="hidden" name="id_mata_pelajaran" id="mapelBuatId">
          <button id="dropdownBuatBtn" class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mata Pelajaran
          </button>
          <ul class="dropdown-menu">
            <?php 
              if(isset($data['mata_pelajarans']) && count($data['mata_pelajarans']) > 0):
                $count = 1;
                foreach ($data['mata_pelajarans'] as $mata_pelajaran):
            ?>
              <li data-id="<?= $mata_pelajaran->id ?>" onclick="dropdownBuat(this)"><a class="dropdown-item" href="#"><?= $mata_pelajaran->nama ?></a></li>
            <?php 
                $count++;
                endforeach;
              endif;
            ?>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>
  </div>
</div>
<div class="modal fade" id="ubahModal" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/examify/guru/ujian/ubah" method="post" class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ubahModalLabel">Ubah Ujian</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="ubahId">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama Ujian</label>
          <input value="" type="text" name="nama" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput2" class="form-label">Tanggal Ujian</label>
          <input value="" type="date" name="tanggal_ujian" class="form-control" id="exampleFormControlInput2">
        </div>
        <div class="dropdown">
          <button id="dropdownUbahBtn" class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mata Pelajaran
          </button>
          <ul class="dropdown-menu">
            <?php 
              if(isset($data['mata_pelajarans']) && count($data['mata_pelajarans']) > 0):
                $count = 1;
                foreach ($data['mata_pelajarans'] as $mata_pelajaran):
            ?>
                <li data-id="<?= $mata_pelajaran->id ?>" onclick="dropdownUbah(this)"><a class="dropdown-item" href="#"><?= $mata_pelajaran->nama ?></a></li>
            <?php 
                $count++;
              endforeach;
            endif;
            ?>
          </ul>
          <input type="hidden" name="id_mata_pelajaran" id="mapelUbahId">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
    </form>
  </div>
</div>

<?php $body = ob_get_clean(); ?>

<?php include __DIR__ . '/../layout/main.php'; ?>