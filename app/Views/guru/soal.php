<?php 
$path = __DIR__ . '/..';
$css = '../../public/css/soal.css'; 
$js = '../../public/js/soal.js'; 
?>

<?php ob_start(); ?>
<main>
    <div class="row m-0 position-relative">
        <?php if(isset($_SESSION['errors'])): ?>
            <div class="alert alert-danger position-absolute start-50 translate-middle" style="max-width:32rem; top:3rem; z-index:40 !important" role="alert">
                <?= $_SESSION['errors'];?>
            </div>
        <?php unset($_SESSION['errors']); endif ?>
        <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-primary position-absolute start-50 translate-middle" style="max-width:32rem; top:3rem" role="alert">
            <?= $_SESSION['success'];?>
        </div>
        <?php unset($_SESSION['success']); endif ?>
        <form action="/examify-platform-ujian/guru/soal" method="POST" class="col-3 d-flex flex-column align-items-center justify-content-start">
            <div class="flex justify-content-start px-4 py-5" style="width: 100% !important;">
                <a href="/examify-platform-ujian/guru/ujian">
                    <svg style="top: 2rem !important; left: 2rem !important;" width="32" height="32" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.867 34.6667L35.8003 49.6001L32.0003 53.3334L10.667 32.0001L32.0003 10.6667L35.8003 14.4001L20.867 29.3334H53.3337V34.6667H20.867Z" fill="white"/>
                    </svg>
                </a>
            </div>
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
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
        <div class="col-9 p-0 px-5">
            <div id="body-soal">
                <ul>
                    <?php 
                        $count = 0;
                        foreach ($soals as $soal) :
                    ?>
                    <li class="row pt-5 gap-5">
                        <div class="tags p-2 col-1 d-flex justify-content-center align-items-center">
                            <p class="fw-bold m-0">Soal <?= $count + 1;?></p>
                        </div>
                        <div class="card col-10">
                            <div class="card-body">
                                <p class="card-text"><?= $soal['pertanyaan'];?></p>
                                <div class="form-check">
                                    <input value="<?= $jawabans[$count][0]['opsi'];?>" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <?= $jawabans[$count][0]['jawaban'];?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input value="<?= $jawabans[$count][0]['opsi'];?>" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <?= $jawabans[$count][1]['jawaban'];?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input value="<?= $jawabans[$count][0]['opsi'];?>" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <?= $jawabans[$count][2]['jawaban'];?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input value="<?= $jawabans[$count][0]['opsi'];?>" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <?= $jawabans[$count][3]['jawaban'];?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php $count++;endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</main>
<?php $body = ob_get_clean(); ?>

<?php include $path . '/layout/main.php'; ?>