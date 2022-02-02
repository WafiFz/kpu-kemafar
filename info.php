<?php 
require 'ui.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Info Pemilu"); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbar("info");  ?>
    <!-- akhir navbar -->

    <section id="timeline" class="paper-bg">
        <div class="judul text-center w-100 mb-5 py-3 px-2">
            <h1>INFO PEMILU</h1>
        </div>
        <ul>
            <li>
                <div data-aos="fade-left">
                    <time>8-17 Desember 2021</time>
                    Masa Kampanye <br />
                    - Kampanye tertutup <br />
                    - Kampanye mandiri <br />
                    - kampanye terbuka
                </div>
            </li>
            <li>
                <div data-aos="fade-right">
                    <time>18-19 Desember 2021</time>
                    Masa tenang
                </div>
            </li>
            <li>
                <div data-aos="fade-left">
                    <time>20-24 Desember 2021</time>
                    Pemungutan suara
                </div>
            </li>
            <li>
                <div data-aos="fade-right">
                    <time>25 Desember 2021</time>
                    Perhitungan suara
                </div>
            </li>
        </ul>
    </section>

    <!-- footer -->
    <?php footer(); ?>
    <!-- akhir footer -->
</body>

</html>