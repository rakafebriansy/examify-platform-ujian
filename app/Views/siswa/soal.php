<?php 
$path = __DIR__ . '/..';
$css = '../../public/css/soal.css'; 
$js = '../../public/js/soal.js'; 
?>

<?php ob_start(); ?>
<main>
    <form class="row m-0 position-relative" action="/examify-platform-ujian/siswa/ujian/<?=$ujian['id']?>" method="POST">
        <?php if(isset($_SESSION['errors'])): ?>
            <div class="alert alert-danger position-absolute start-50 translate-middle" style="max-width:32rem; top:3rem; z-index:40 !important" role="alert">
                <?= $_SESSION['errors'];?>
            </div>
        <?php unset($_SESSION['errors']); endif ?>
        <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-primary position-absolute start-50 translate-middle" style="max-width:32rem; top:3rem; z-index:40 !important" role="alert">
            <?= $_SESSION['success'];?>
        </div>
        <?php unset($_SESSION['success']); endif ?>
        <div class="col-3 d-flex flex-column align-items-center justify-content-start position-fixed" style="background-color: #052C65; min-height:100vh !important">
            <div class="flex justify-content-start px-4 py-5" style="width: 100% !important;">
                <a href="/examify-platform-ujian/siswa/ujian">
                    <svg style="top: 2rem !important; left: 2rem !important;" width="32" height="32" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.867 34.6667L35.8003 49.6001L32.0003 53.3334L10.667 32.0001L32.0003 10.6667L35.8003 14.4001L20.867 29.3334H53.3337V34.6667H20.867Z" fill="white"/>
                    </svg>
                </a>
            </div>
            <div class="d-flex justify-content-center flex-column align-items-center" style="width: 100%;">
                <img src="../../public/images/logo-label.png" alt="">
                <div class="fs-6 rounded p-3 my-3" style="width:80%; background-color:white; color:black; font-weight:700;">
                    <input type="hidden" name="id_ujian" value="<?=$ujian['id']?>">
                    <p>Navigasi Soal</p>
                    <div style="width:100%">
                        <?php for($i = 0; $i < count($soals); $i++): ?>
                            <a class="d-inline-flex justify-content-center align-items-center px-2 py-1 rounded m-1" href="#soal-<?=$i+1?>" style="text-decoration:none; color:black; background-color:#E9ECEF !important; width:12%;"><?=$i+1?></a>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="d-flex justify-content-end" style="width: 80%;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        <div class="col-9 p-0 px-5 position-absolute" style="right:0;">
            <div id="body-soal">
                <ul class="mb-5">
                    <?php 
                        $count = 0;
                        foreach ($soals as $soal) :
                    ?>
                    <li class="row pt-5 gap-5" id="soal-<?=$count+1?>">
                        <div class="tags p-2 col-1 d-flex justify-content-center align-items-center">
                            <p class="fw-bold m-0">Soal <?= $count + 1;?></p>
                        </div>
                        <div class="card col-10">
                            <div class="card-body">
                                <p class="card-text"><?= $soal['pertanyaan'];?></p>
                                <div class="form-check">
                                    <input value="<?= $jawabans[$count][0]['opsi'];?>" class="form-check-input" type="radio" name="jawaban[<?=$soal['id']?>]" id="flexRadioDefault1-<?=$soal['id']?>">
                                    <label class="form-check-label" for="flexRadioDefault1-<?=$soal['id']?>">
                                        <?= $jawabans[$count][0]['jawaban'];?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input value="<?= $jawabans[$count][0]['opsi'];?>" class="form-check-input" type="radio" name="jawaban[<?=$soal['id']?>]" id="flexRadioDefault2-<?=$soal['id']?>">
                                    <label class="form-check-label" for="flexRadioDefault2-<?=$soal['id']?>">
                                        <?= $jawabans[$count][1]['jawaban'];?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input value="<?= $jawabans[$count][0]['opsi'];?>" class="form-check-input" type="radio" name="jawaban[<?=$soal['id']?>]" id="flexRadioDefault3-<?=$soal['id']?>">
                                    <label class="form-check-label" for="flexRadioDefault3-<?=$soal['id']?>">
                                        <?= $jawabans[$count][2]['jawaban'];?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input value="<?= $jawabans[$count][0]['opsi'];?>" class="form-check-input" type="radio" name="jawaban[<?=$soal['id']?>]" id="flexRadioDefault4-<?=$soal['id']?>">
                                    <label class="form-check-label" for="flexRadioDefault4-<?=$soal['id']?>">
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
    </form>
</main>
<?php $body = ob_get_clean(); ?>

<?php include $path . '/layout/main.php'; ?>