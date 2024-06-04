<?php 
$path = __DIR__ . '/..';
$css = '../public/css/ujian.css'; 
$js = '../public/js/ujian.js'; 
?>

<?php ob_start(); ?>
<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary small-shadow" style="background-color: white !important;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img id="logo-label" src="../public/images/logo-label.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse gap-4" id="navbarNavAltMarkup">
      <a href="/examify-platform-ujian/guru/ujian" style="text-decoration:none; color:black;">
        Ujian
      </a>
      <form action="/examify-platform-ujian/logout" method="post" class="navbar-nav">
        <button type="submit" class="rounded-pill p-2 border border-0" style="background-color: white !important;">
          Logout
        </button>
      </form>
    </div>
  </div>
</nav>
<main class="position-relative">
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
  <div class="container d-flex justify-content-center flex-column align-items-center p-3">
    <h3>LAPORAN</h3>
  <div class="table-container mt-3 d-flex justify-content-center">
    <div style="width:70%;">
      <canvas id="myChart"></canvas>
    </div>
  </div>
</main>


  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('myChart');
    let data = <?= $jumlah_dikerjakan;?>;
    let jumlah_dikerjakan = data.map((row) => {
      return row['jumlah_dikerjakan'];
    });
    let nama_ujian = data.map((row) => {
      return row['nama'];
    });

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: nama_ujian,
        datasets: [{
          label: 'Jumlah upaya pengerjaan ujian terbaru',
          data: jumlah_dikerjakan,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</div>

<?php $body = ob_get_clean(); ?>

<?php include __DIR__ . '/../layout/main.php'; ?>