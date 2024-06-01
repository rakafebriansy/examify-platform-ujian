<?php $title = 'examify-platform-ujian';
$css = 'public/css/index.css';
$js = 'public/js/index.js';
?>

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
            <li><a class="dropdown-item" href="/examify-platform-ujian/siswa/register">Siswa</a></li>
            <li><a class="dropdown-item" href="/examify-platform-ujian/guru/register">Guru</a></li>
          </ul>
        </div>
        <div class="dropdown-center">
          <button class="btn btn-primary ms-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="/examify-platform-ujian/siswa/login">Siswa</a></li>
            <li><a class="dropdown-item" href="/examify-platform-ujian/guru/login">Guru</a></li>
            <li><a class="dropdown-item" href="/examify-platform-ujian/admin/login">Admin</a></li>
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
        <img src="public/images/hero-1.png" class="d-block w-100" alt="...">
        <img src="public/images/hero-1-mobile.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="public/images/hero-1.png" class="d-block w-100" alt="...">
        <img src="public/images/hero-1-mobile.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="public/images/hero-1.png" class="d-block w-100" alt="...">
        <img src="public/images/hero-1-mobile.png" class="d-block w-100" alt="...">
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
<footer>
  <div class="row p-3">
    <div class="col-8">
      <h4 class="mb-4"><a href="#">Kantor kami</a></h4>
      <table>
        <tbody>
          <tr>
            <td>
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28 19.3499L22.1138 16.7112L22.0913 16.7012C21.7086 16.5362 21.2908 16.4698 20.8759 16.5081C20.461 16.5463 20.0623 16.6879 19.7163 16.9199C19.6677 16.9524 19.621 16.9875 19.5763 17.0249L16.7875 19.3999C15.1625 18.5187 13.4838 16.8537 12.6013 15.2487L14.9838 12.4162C15.022 12.3704 15.0575 12.3224 15.09 12.2724C15.316 11.9276 15.4532 11.5323 15.4894 11.1216C15.5256 10.711 15.4597 10.2977 15.2975 9.91869C15.2937 9.91143 15.2903 9.90391 15.2875 9.89619L12.65 3.99994C12.4335 3.50684 12.064 3.09655 11.5962 2.82978C11.1284 2.563 10.5871 2.45393 10.0525 2.51869C8.23797 2.75706 6.57225 3.64778 5.36643 5.02451C4.16062 6.40123 3.49717 8.16982 3.50001 9.99994C3.50001 20.2012 11.7988 28.4999 22 28.4999C23.8301 28.5028 25.5987 27.8393 26.9754 26.6335C28.3522 25.4277 29.2429 23.762 29.4813 21.9474C29.546 21.4128 29.4369 20.8715 29.1702 20.4037C28.9034 19.9359 28.4931 19.5664 28 19.3499ZM22 25.4999C17.8907 25.495 13.9511 23.8604 11.0453 20.9546C8.1396 18.0489 6.50497 14.1093 6.50001 9.99994C6.49715 8.96431 6.84874 7.95887 7.49636 7.15071C8.14398 6.34255 9.04864 5.78032 10.06 5.55744L12.4125 10.8074L10.0175 13.6599C9.9788 13.7061 9.9429 13.7545 9.91001 13.8049C9.67395 14.1656 9.53516 14.5812 9.50712 15.0114C9.47909 15.4416 9.56276 15.8717 9.75001 16.2599C10.9275 18.6699 13.3538 21.0799 15.7888 22.2599C16.1796 22.4452 16.6119 22.526 17.0433 22.4942C17.4747 22.4624 17.8905 22.3193 18.25 22.0787C18.2983 22.046 18.3446 22.0105 18.3888 21.9724L21.1925 19.5887L26.4425 21.9399C26.2196 22.9513 25.6574 23.856 24.8492 24.5036C24.0411 25.1512 23.0356 25.5028 22 25.4999Z" fill="white"/>
              </svg>
              <p class="ms-2">Nomor Telepon</p>
            </td>
            <td>
              <p class="ms-3">: (0323) 12891</p>
            </td>
          </tr>
          <tr>
            <td>
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M26.667 5.33337H5.33366C3.8609 5.33337 2.66699 6.52728 2.66699 8.00004V24C2.66699 25.4728 3.8609 26.6667 5.33366 26.6667H26.667C28.1397 26.6667 29.3337 25.4728 29.3337 24V8.00004C29.3337 6.52728 28.1397 5.33337 26.667 5.33337Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M29.3337 9.33337L17.3737 16.9334C16.962 17.1913 16.4861 17.3281 16.0003 17.3281C15.5146 17.3281 15.0386 17.1913 14.627 16.9334L2.66699 9.33337" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <p class="ms-2">Email</p>
            </td>
            <td>
              <p class="ms-3">: examify-platform-ujian@gmail.co.id</p>
            </td>
          </tr>
          <tr>
            <td>
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 20C18.1217 20 20.1566 19.1571 21.6569 17.6569C23.1571 16.1566 24 14.1217 24 12C24 9.87827 23.1571 7.84344 21.6569 6.34315C20.1566 4.84286 18.1217 4 16 4C13.8783 4 11.8434 4.84286 10.3431 6.34315C8.84286 7.84344 8 9.87827 8 12C8 14.1217 8.84286 16.1566 10.3431 17.6569C11.8434 19.1571 13.8783 20 16 20ZM16 20V28M12.6667 12C12.6667 11.1159 13.0179 10.2681 13.643 9.64298C14.2681 9.01786 15.1159 8.66667 16 8.66667" 
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <p class="ms-2">Alamat</p>
            </td>
            <td>
              <p class="ms-3">: Jl. Kalimantan Tegalboto No.37, Krajan Timur, Sumbersari, Kec. Sumbersari, Kabupaten Jember</p>
            </td>
          </tr>
        </tbody>
      </table>
      <iframe id="map-canvas" class="map_part"  frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%&amp;height=100%&amp;hl=en&amp;q=Jl. Kalimantan Tegalboto No.37, Krajan Timur, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">Powered by <a href="https://embedgooglemaps.com">embed google maps</a> and <a href="https://unoregler.se/">uno regler</a></iframe>
    </div>
    <form id="hubungiKami" method="GET" class="col-4">
      <h5 class="text-center">Hubungi Kami</h5>
      <div class="mb-2 text-box">
        <label for="subjek" class="form-label">Subjek</label>
        <input type="subjek" name="subjek" class="form-control" id="subjek" placeholder="">
      </div>
      <div class="mb-2">
        <label for="pesan" class="form-label">Pesan</label>
        <textarea class="form-control" id="pesan" rows="3"></textarea>
      </div>
      <button type="button" onclick="sendEmail()" class="btn btn-primary mt-2">Submit</button>
    </form>
  </div>
</footer>
<?php $body = ob_get_clean(); ?>

<?php include __DIR__ . '/layout/main.php'; ?>