<?php 
session_start();
require 'ui.php';
require 'functions.php';

wajib_login_panitia();

$table = "pemilih";
$terdaftar = get_jumlah_baris();
$sudah_milih = get_jumlah_baris("SELECT * FROM pemilih WHERE status = 'Done'");
$belum_milih = get_jumlah_baris("SELECT * FROM pemilih WHERE status is null");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Tabulasi"); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbarPanitia("tabulasi");  ?>
    <!-- akhir navbar -->

    <section id="tabulasi" class="py-5 px-sm-5 cont-h-100 d-flex align-items-center paper-bg">
        <div class="container text-center">
            <h1>Tabulasi Suara</h1>
            <div class="row justify-content-center">
                <div class="col col-12 col-sm-10 col-md-6 col-lg-5 p-3">
                    <div class="container p-4 p-sm-5" data-aos="flip-right">
                        <h2><span><?= $terdaftar; ?></span><br />ORANG</h2>
                        <p class="mt-3">Terdaftar Sebagai Pemilih</p>
                        <a href="Terdaftar" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-12 col-sm-10 col-md-6 col-lg-5 p-3">
                    <div class="container p-4 p-sm-5" data-aos="flip-right">
                        <h2><span><?= $sudah_milih; ?></span><br />ORANG</h2>
                        <p class="mt-3">Telah menggunakan hak pilihnya</p>
                        <a href="Sudah-Memilih" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
                <div class="col col-12 col-sm-10 col-md-6 col-lg-5 p-3">
                    <div class="container p-4 p-sm-5" data-aos="flip-right">
                        <h2><span><?= $belum_milih; ?></span><br />ORANG</h2>
                        <p class="mt-3">Belum menggunakan hak pilihnya</p>
                        <a href="Belum-Memilih" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php footer(); ?>
    <!-- akhir footer -->
</body>

</html>