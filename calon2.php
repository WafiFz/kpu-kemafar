<?php 
require 'ui.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Calon 2"); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbar("calon2");  ?>
    <!-- akhir navbar -->

    <!-- header -->
    <header id="calon" class="d-flex align-items-center">
        <div class="container text-center kotak-kosong-title border border-4 border-dark" data-aos="flip-left">
            <h1>Kotak Kosong</h1>
        </div>
    </header>

    <section id="desc-calon" class="paper-bg">
        <div class="container text-center py-5">
            <div class="row justify-content-center g-4">
                <div class="col-12 col-md-8" data-aos="fade-up">
                    <h2>Apa itu kotak kosong?</h2>
                    <p>
                        Menurut UU Kemafar Unpad No. 1 Tahun 2020 tentang Pemilihan Umum Pasal 21 ayat 2, 
                        Kotak Kosong adalah pilihan selain menyalurkan hak suara pada paslon yang mengajukan diri 
                        sehingga tidak ada alasan untuk melakukan golput
                    </p>
                </div>
                <div class="col-12 col-md-8" data-aos="fade-up">
                    <h2>Bagaimana jika kotak kosong menang?</h2>
                    <p>
                        Sesuai dengan UU Kemafar Unpad No. 1 Tahun 2020 tentang Pemilihan Umum Pasal 21 ayat 4,  
                        jika kotak kosong menang, pemilihan akan dilakukan melalui Kongres Kemafar dan 
                        pasangan calon sebelumnya diperbolehkan untuk mendaftar lagi
                    </p>
                </div>
                
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php footer(); ?>
    <!-- akhir footer -->
</body>

</html>