<?php  
require 'ui.php';
require 'functions.php';
    session_start(); 
    $_SESSION = [];
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Terima Kasih"); ?>
    <script type="text/javascript">
    window.history.forward();

    function noBack() {
        window.history.forward();
    }
    </script>
</head>

<body class="paper-bg">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-bg">
        <div class="container-fluid">
            <div class="d-flex w-50 justify-content-between">
                <a class="navbar-brand" href="" onclick="return false;"> <img src="img/LOGO KPU 1 1.png" alt=""
                        width="auto" height="30" class="d-inline-block align-text-top" /> KPU Kemafar </a>
            </div>

            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon wheat-color"></span>
        </button> -->

            <div class="collapse navbar-collapse w-100 justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav w-100 justify-content-center">
                    <!-- <a class="nav-link" href="tabulasi.html">Tabulasi</a>
            <a class="nav-link" href="hasil.html">Hasil</a>
            <a class="nav-link" href="Laporan.html">Laporan</a> -->
                </div>
                <div class="btn-pilih d-flex w-100 justify-content-end"></div>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <section class="paper-bg"></section>
    <!-- modal -->
    <div class="modal fade successModal" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-end">
                    <a href="home" class="col align-self-end"><button type="submit" class="btn-close"
                            data-bs-dismiss="modal"></button></a>
                </div>
                <div class="modal-body px-5 text-center">
                    <h2>Pemilihan Selesai</h2>
                    <p>Terimakasih telah menggunakan hak suara anda.</p>
                    <a href="home" class="text-end"><button type="button" class="btn btn-light my-3"
                            data-bs-dismiss="modal" aria-label="Close">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="row justify-content-center p-4 g-2 m-0 w-100" style="height: 80%">
            <div class="col-12 col-md-4">
                <div class="logo-footer d-flex justify-content-center align-items-center"
                    style="height: 100%; width: 100%">
                    <img src="img/pencerdasan kpu 2021-04 1.png" alt="" style="height: 120px; width: auto" />
                </div>
            </div>
            <div class="col-12 col-md-4 text-center">
                <h3>KPU KEMAFAR 2021</h3>

            </div>
            <div class="col-12 col-md-4 text-center">
                <div class="organizer d-flex justify-content-center">
                    <img src="img/UNPADDD.png" alt="" height="100px" width="auto" />
                </div>
            </div>
        </div>
        <div class="row container-fluid text-center m-0 w-100">
            <div class="col" style="height: 20%">
                <p>©2021. Kemafar. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <!-- local script -->
    <script src="script.js"></script>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/b249d00227.js" crossorigin="anonymous"></script>
    <script>
    var myModal = new bootstrap.Modal(document.getElementById('successModal'), {
        keyboard: false
    })
    var modalToggle = document.getElementById('successModal') // relatedTarget
    myModal.show(modalToggle)
    </script>
    <?php  
    
    echo "<script>
    setInterval( () => {
        document.location.href = 'home';
     }, 4000);
    
    </script>";
    exit; 
    
    ?>