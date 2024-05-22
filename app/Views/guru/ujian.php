<?php 
$path = __DIR__ . '/..';
$css = '../public/css/ujian.css'; 
$js = '../public/js/ujian.js'; 
?>

<?php ob_start(); ?>
<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img id="logo-label" src="../public/images/logo-label.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <form action="/examify/logout" method="post" class="navbar-nav">
        <button type="submit" class="bg-light rounded-pill p-2 border border-0">
          Logout
        </button>
      </form>
    </div>
  </div>
</nav>
<main>
  <div class="container d-flex justify-content-center flex-column align-items-center p-3">
    <h3>DAFTAR UJIAN</h3>
    <div class="table-container">
      <div class="d-flex justify-content-start mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          + Tambah
        </button>
      </div>
      <div class="d-flex justify-content-center">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tanggal Ujian</th>
              <th scope="col">Nama Ujian</th>
              <th scope="col">Mata Pelajaran</th>
              <th scope="col">Token</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              if(isset($data['ujians']) && count($data['ujians']) > 0):
                $count = 1
            ?>
              <?php foreach ($data['ujians'] as $ujian): ?>
                <tr>
                  <th scope="row"><?= $count;?></th>
                  <td><?= $ujian['tanggal_ujian'];?></td>
                  <td><?= $ujian['nama_ujian'];?></td>
                  <td><?= $ujian['mata_pelajaran'];?></td>
                  <td><?= $ujian['token'];?></td>
                  <td>
                    <form action="/examify/admin/mata-pelajaran/hapus" method="post">
                      <input type="hidden" name="id" id="" value="<?= $ujian['id'] ?>">
                      <button class="badge text-bg-danger border border-0">Hapus</button>
                    </form>
                  </td>
                </tr>
              <?php 
                $count++;
                endforeach; 
              ?>
            <?php else: ?>
            <tr>
              <td colspan="6" class="text-center">Belum ada data.</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/examify/guru/ujian" method="post" class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mata Pelajaran</h1>
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
          <input type="hidden" name="id_mata_pelajaran" id="mataPelajaranId">
          <button id="dropdownMataPelajaranBtn" class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mata Pelajaran
          </button>
          <ul class="dropdown-menu">
            <?php 
              if(isset($data['mata_pelajarans']) && count($data['mata_pelajarans']) > 0):
                $count = 1;
                foreach ($data['mata_pelajarans'] as $mata_pelajaran):
            ?>
              <li data-id="<?= $mata_pelajaran->id ?>" onclick="dropdownMataPelajaran(this)"><a class="dropdown-item" href="#"><?= $mata_pelajaran->nama ?></a></li>
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

<?php $body = ob_get_clean(); ?>

<?php include __DIR__ . '/../layout/main.php'; ?>