<?php 
$path = __DIR__ . '/..';
$css = '../../public/css/soal.css'; 
$js = '../../public/js/soal.js'; 
?>

<?php ob_start(); ?>
<main>
    <div class="row m-0">
        <?php if(isset($_SESSION['errors'])): ?>
            <?php echo $_SESSION['errors'] ?>
            <script>alert($_SESSION['errors'])</script>
        <?php unset($_SESSION['errors']); endif ?>
        <form action="/examify/guru/soal" method="POST" class="col d-flex flex-column align-items-center justify-content-center">
            <div class="mb-1 text-center">
                <h3>TAMBAH SOAL</h3>
            </div>
            <input type="hidden" name="id_ujian" value="<?=substr($_SERVER['REQUEST_URI'],-1)?>" id="">
            <div class="mb-2 text-box">
                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                <input type="text" name="pertanyaan" class="form-control" id="pertanyaan">
            </div>
            <div class="mb-2 text-box">
                <label for="opsi_a" class="form-label">Opsi A</label>
                <input type="text" name="jawaban[opsi_a]" class="form-control" id="opsi_a">
            </div>
            <div class="mb-2 text-box">
                <label for="opsi_b" class="form-label">Opsi B</label>
                <input type="text" name="jawaban[opsi_b]" class="form-control" id="opsi_b">
            </div>
            <div class="mb-2 text-box">
                <label for="opsi_c" class="form-label">Opsi C</label>
                <input type="text" name="jawaban[opsi_c]" class="form-control" id="opsi_c">
            </div>
            <div class="mb-4 text-box">
                <label for="opsi_d" class="form-label">Opsi D</label>
                <input type="text" name="jawaban[opsi_d]" class="form-control" id="opsi_d">
            </div>
            <div class="mb-2 text-box d-flex justify-content-between">
                <input type="hidden" name="kunci_jawaban" id="kunciJawaban">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jawaban
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="dropdownKunciJawaban(this)">A</a></li>
                        <li><a class="dropdown-item" href="#" onclick="dropdownKunciJawaban(this)">B</a></li>
                        <li><a class="dropdown-item" href="#" onclick="dropdownKunciJawaban(this)">C</a></li>
                        <li><a class="dropdown-item" href="#" onclick="dropdownKunciJawaban(this)">D</a></li>
                    </ul>
                </div>
                <button class="btn btn-primary" type="submit">TAMBAH</button>
            </div>
        </form>
        <div class="col-9 p-0">
            <input type="hidden" name="" value="0" id="count">
            <div class="container">
                <div class=""></div>
                <div class="">
                    <ul>
                        <li class="row p-5 gap-5">
                            <div class="tags p-2 col-1 d-flex justify-content-center align-items-center">
                                <p class="fw-bold m-0">Soal 1</p>
                            </div>
                            <div class="card col-10">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                           A. Default radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            B. Default radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            C. Default radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            D. Default radio
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $body = ob_get_clean(); ?>

<?php include $path . '/layout/main.php'; ?>