<?php 
require 'ui.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(""); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbar("", true);  ?>
    <!-- akhir navbar -->

    <!-- background video -->
    <section id="teaser">
        <div id="video-teaser" class="player"
            data-property="{ videoURL:'https://www.youtube.com/watch?v=6TbAyrB-89w', containment:'body', autoPlay:true, mute:true, startAt:0, opacity:1, optimizeDisplay:true, addRaster:true, abundance: 0 }">
        </div>
        <div id="info" class="flex">
            <i id="volume" class="fas fa-volume-mute"></i>
        </div>
    </section>
    <!-- akhir background video -->

    <!-- about -->
    <section id="about" class="py-4">
        <div class="container" data-aos="zoom-out">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-10 p-4"
                    style="background-color: rgba(250, 248, 212, 0.6); border-radius: 30px">
                    <div class="row">
                        <div class="col-12 col-lg-4 text-center">
                            <h1>KPU KEMAFAR 2021</h1>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 text-center">
                            <img width="50%" src="img/pencerdasan kpu 2021-04 1.png" alt="" />
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 text-center">
                            <p class="mt-3">Komisi Pemilihan Umum atau selanjutnya KPU adalah lembaga penyelenggara
                                pemilihan umum yang bersifat independen yang bertugas melaksanakan pemilihan umum di
                                Kemafar Unpad</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- akhir about -->

    <!-- sekilas calon -->
    <section id="landing-calon">
        <div class="row">
            <div class="landing-calon1 col-12 col-md-6 text-center p-5" data-aos="fade-right">
                <div class="row">
                    <div class="col-6">
                        <img src="img/bem/zul.png" alt="" class="img-fluid" />
                    </div>
                    <div class="col-6">
                        <img src="img/bem/bella.png" alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="row mt-3">
                    <h2>Calon 1</h2>
                </div>
                <a href="Calon1" class="btn btn-outline-dark mt-3">Kenali Calon</a>
            </div>
            <div class="landing-calon2 col-12 col-md-6 text-center p-5 my-auto" data-aos="fade-left">
                <div class="">
                    <h2>Kotak Kosong</h2>
                    <a href="Calon2" class="btn btn-outline-dark mt-3">Kenali Kotak Kosong</a>
                </div>
            </div>
        </div>
    </section>
    <!-- akhir sekilas calon -->

    <!-- Tombol Pilih -->
    <section id="pilih-sekarang" class="paper-bg">
        <div data-aos="fade-up">
            <h1>Pilih Sekarang!</h1>
            <a href="Status" class="btn btn-outline-dark btn-lg mt-3">Gunakan Hak Pilih</a>
        </div>
    </section>
    <!-- akhir tombol pilih -->

    <!-- footer -->
    <?php footer(); ?>
    <!-- akhir footer -->
    <script>
    muteVideo();
    navbarbg();
    </script>
</body>

</html>