<?php 

function header_html($title){
    echo '<!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- local css -->
    <link rel="stylesheet" href="style2.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />

    <!-- icon -->
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- AoS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <title>KPU Kemafar'; echo $title; echo '</title>';
}

function footer(){
    echo '<footer>
    <div class="row justify-content-center p-4 g-2 m-0 w-100" style="height: 80%">
        <div class="col-12 col-md-4">
            <div class="logo-footer d-flex justify-content-center align-items-center"
                style="height: 100%; width: 100%">
                <img src="img/pencerdasan kpu 2021-04 1.png" alt="" style="height: 120px; width: auto" />
            </div>
        </div>
        <div class="col-12 col-md-4 text-center">
            <h3>KPU KEMAFAR 2021</h3>
            <h5 class="mb-3">Stay in touch</h5>
            <div class="sosmed mx-auto d-flex justify-content-evenly">
                <a href="https://timeline.line.me/user/_db721gm4iuIF5_IdWeD1ciprD2HWrHKWgVHiS1E" target="_blank">
                    <i class="fab fa-line"></i>
                </a>    
                <a href="https://www.instagram.com/kpukemafar2021/" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCB5eBab6yesUYlikg79Sjxw" target="_blank">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-4 text-center">
            <div class="organizer d-flex justify-content-center">
                <img src="img/UNPADDD.png" alt="" height="100px" width="auto" />
            </div>
        </div>
    </div>
    <div class="row container-fluid text-center m-0 w-100">
        <div class="col" style="height: 20%">
            <p>©2021. KPU Kemafar. All Rights Reserved. Created by <a href="https://wa.me/6289656377911">Octoscript</a></p>
        </div>
    </div>
</footer> 
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <!-- background video -->
    <script src="jquery.mb.YTPlayer.js"></script>
    <!-- local script -->
    <script src="script.js"></script>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/b249d00227.js" crossorigin="anonymous"></script>
    <!-- AoS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    ';
}

function navbar($page, $home = false){
    
$blank = "";
$active = " active";

if($home){
    echo '<nav class="navbar navbar-expand-lg fixed-top">';
}else{
    echo '<nav class="navbar navbar-expand-xl navbar-bg">';
}

echo '
    <div class="container-fluid">
        <div class="d-flex w-50 justify-content-between">
            <a class="navbar-brand" href="home"> <img src="img/LOGO KPU 1 1.png" alt="" width="auto" height="30"
                    class="d-inline-block align-text-top" /> KPU Kemafar </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon wheat-color"></span>
        </button>

        <div class="collapse navbar-collapse w-100 justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav w-100 justify-content-center">
                <a class="nav-link'; echo ($page == 'guide') ? $active : $blank; echo'" href="Cara-Memilih">Cara Memilih</a>
                <a class="nav-link'; echo ($page == 'info') ? $active : $blank; echo'" href="Info-Pemilu">Info Pemilu</a>
                <a class="nav-link'; echo ($page == 'lapor') ? $active : $blank; echo'" href="Lapor">Lapor</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"> Kenali Calon </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item'; echo ($page == 'calon1') ? $active : $blank; echo'" href="Calon1">Paslon 1</a>
                        <a class="dropdown-item'; echo ($page == 'calon2') ? $active : $blank; echo'" href="Calon2">Kotak Kosong</a>
                        <a class="dropdown-item'; echo ($page == 'calonBPM19') ? $active : $blank; echo'" href="Calon-BPM2019">Calon BPM 2019</a>
                        <a class="dropdown-item'; echo ($page == 'calonBPM20') ? $active : $blank; echo'" href="Calon-BPM2020">Calon BPM 2020</a>
                        <a class="dropdown-item'; echo ($page == 'calonBPM21') ? $active : $blank; echo'" href="Calon-BPM2021">Calon BPM 2021</a>
                    </div>
                </div>
            </div>
            <div class="btn-pilih d-flex w-100 justify-content-end">
                <a class="btn btn-outline-primary" type="button" href="Status">Gunakan Hak Pilih</a>
            </div>
        </div>
    </div>
</nav>
';
}

function navbarPanitia($page)
{
    $blank = "";
    $active = " active";
    echo '
    <nav class="navbar navbar-expand-lg navbar-bg">
        <div class="container-fluid">
            <div class="d-flex w-50 justify-content-between">
                <a class="navbar-brand" href="Tabulasi"> <img src="img/LOGO KPU 1 1.png" alt="" width="auto" height="30" class="d-inline-block align-text-top" /> KPU Kemafar </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon wheat-color"></span>
            </button>

            <div class="collapse navbar-collapse w-100 justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav w-100 justify-content-center">
                <a class="nav-link'; echo ($page == 'dpt') ? $active : $blank; echo'" href="DPT">DPT</a>
                <a class="nav-link'; echo ($page == 'tabulasi') ? $active : $blank; echo'" href="Tabulasi">Tabulasi</a>
                <a class="nav-link'; echo ($page == 'hasil') ? $active : $blank; echo'" href="Hasil-Pemilu">Hasil</a>
                <a class="nav-link'; echo ($page == 'laporan') ? $active : $blank; echo'" href="Laporan">Laporan</a>
                <a class="nav-link'; echo ($page == 'form') ? $active : $blank; echo'" href="Pendataan-Pemilih">Form</a>
                <a class="nav-link" href="Logout">Logout</a>
                </div>
                <div class="btn-pilih d-flex w-100 justify-content-end"></div>
            </div>
        </div>
    </nav>
  ';
}

function nama_bpm19($i){
    switch ($i) {
        case 1: echo "Aisyah Safira Mulia"; break;
        case 2: echo "Niky Murdaya"; break;
        case 3: echo "Shannon Maidelaine P"; break;
        case 4: echo "Angela Alysia Elaine"; break;
        case 5: echo "Savira Dwi Utami"; break;
        case 6: echo "Erlangga Ramadan"; break;
        case 7: echo "M. Fadhil Ghassani P"; break;
        case 8: echo "Jacko Abiwaqash H"; break;
        default:
        echo "Error!";
    }
}

function keterangan_bpm19($i){
    switch ($i) {
        case 1: echo "260110190027"; break;
        case 2: echo "260110190043"; break;
        case 3: echo "260110190071"; break;
        case 4: echo "260110190003"; break;
        case 5: echo "260110190046"; break;
        case 6: echo "260110190047"; break;
        case 7: echo "260110190070"; break;
        case 8: echo "260110190021"; break;
        default:
        echo "Error!";
    }
}

function nama_bpm20($i){
    switch ($i) {
        case 1: echo "Shafira Anastya Putri"; break;
        case 2: echo "Fajar Oktavian Muljono"; break;
        case 3: echo "Aisha Putri Maharani"; break;
        case 4: echo "Azahrah Gowrizki"; break;
        case 5: echo "Farhah Az-Zahra"; break;
        case 6: echo "Ariani Insyirah"; break;
        case 7: echo "Gylbran Alghifari"; break;
        case 8: echo "Annisa Muthmainnah"; break;
        default:
          echo "Error!";
      }
}

function keterangan_bpm20($i){
    switch ($i) {
        case 1: echo "260110200061"; break;
        case 2: echo "260110200102"; break;
        case 3: echo "260110200063"; break;
        case 4: echo "260110200064"; break;
        case 5: echo "260110200033"; break;
        case 6: echo "260110200062"; break;
        case 7: echo "260110200099"; break;
        case 8: echo "260110200067"; break;
        default:
          echo "Error!";
      }
}

function nama_bpm21($i){
    switch ($i) {
        case 1: echo "N. Anna Sakinah Liana Rahmawati"; break;
        case 2: echo "Anisa Oktariani"; break;
        case 3: echo "Nindita Hadi Ramadhani"; break;
        case 4: echo "Cut Reyna Ananda Keumaladewi"; break;
        case 5: echo "Andi Ervina Subekti"; break;
        case 6: echo "Syifanindya Andari Surya"; break;
        case 7: echo "Shannon Patricia"; break;
        case 8: echo "Prodio Efa Gaharani"; break;
        default:
          echo "Error!";
      }
}

function keterangan_bpm21($i){
    switch ($i) {
        case 1: echo "260110210050"; break;
        case 2: echo "260110210040"; break;
        case 3: echo "260110210096"; break;
        case 4: echo "260110210069"; break;
        case 5: echo "260110210065"; break;
        case 6: echo "260110210098"; break;
        case 7: echo "260110210091"; break;
        case 8: echo "260110210024"; break;
        default:
          echo "Error!";
      }
}

?>