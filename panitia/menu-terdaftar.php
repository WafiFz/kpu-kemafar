<?php 
session_start();
require 'ui.php';
require 'functions.php';

wajib_login_panitia();

$table = "pemilih";
$jumlah_orang_2017 = get_jumlah_baris("SELECT * FROM pemilih WHERE angkatan = '2017'");
$jumlah_orang_2018 = get_jumlah_baris("SELECT * FROM pemilih WHERE angkatan = '2018'");
$jumlah_orang_2019 = get_jumlah_baris("SELECT * FROM pemilih WHERE angkatan = '2019'");
$jumlah_orang_2020 = get_jumlah_baris("SELECT * FROM pemilih WHERE angkatan = '2020'");
$jumlah_orang_2021 = get_jumlah_baris("SELECT * FROM pemilih WHERE angkatan = '2021'");

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
            <h1>Terdaftar Sebagai Pemilih</h1>
            <div class="row justify-content-center">
            <div class="col col-12 col-sm-10 col-md-6 col-lg-4 p-3">
                <div class="container p-4 p-sm-5" data-aos="flip-right">
                    <h2><span><?= $jumlah_orang_2017; ?></span><br />ORANG</h2>
                    <p class="mt-3">2017</p>
                    <a href="Terdaftar-2017" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
                <div class="col col-12 col-sm-10 col-md-6 col-lg-4 p-3">
                    <div class="container p-4 p-sm-5" data-aos="flip-right">
                        <h2><span><?= $jumlah_orang_2018; ?></span><br />ORANG</h2>
                        <p class="mt-3">2018</p>
                        <a href="Terdaftar-2018" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
                <div class="col col-12 col-sm-10 col-md-6 col-lg-4 p-3">
                    <div class="container p-4 p-sm-5" data-aos="flip-right">
                        <h2><span><?= $jumlah_orang_2019; ?></span><br />ORANG</h2>
                        <p class="mt-3">2019</p>
                        <a href="Terdaftar-2019" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
                <div class="col col-12 col-sm-10 col-md-6 col-lg-4 p-3">
                    <div class="container p-4 p-sm-5" data-aos="flip-right">
                        <h2><span><?= $jumlah_orang_2020; ?></span><br />ORANG</h2>
                        <p class="mt-3">2020</p>
                        <a href="Terdaftar-2020" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
                <div class="col col-12 col-sm-10 col-md-6 col-lg-4 p-3">
                    <div class="container p-4 p-sm-5" data-aos="flip-right">
                        <h2><span><?= $jumlah_orang_2021; ?></span><br />ORANG</h2>
                        <p class="mt-3">2021</p>
                        <a href="Terdaftar-2021" class="btn btn-primary mt-2">Detail</a>
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