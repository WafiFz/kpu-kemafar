<?php 
session_start();
require 'ui.php';
require 'functions.php';

//wajib_login();
$kode = $_SESSION["kode"];

$database = query("SELECT * FROM pemilih WHERE kode = '$kode'")[0];

if($database["status"] == "Done"){
    $tujuan = "Pilih-BPM" . $database['angkatan'];
    echo "<script>
              alert('Anda sudah memilih BEM!');
              document.location.href = '$tujuan';
            </script>";
    exit;
}

if(isset($_POST["coblos"])){
    //cek berhasil atau tidak
    if(coblos($_POST) > 0 && edit_status($_POST) > 0){
        $tujuan = "Pilih-BPM" . $database['angkatan'];
        if($database['angkatan'] == "2017" || $database['angkatan'] == "2018"){
            $tujuan = "logoutpemilih.php";
        }
        echo "<script>
              alert('Pemilihan BEM berhasil!');
              document.location.href = '$tujuan';
            </script>";
        exit;
    }else{
        echo "<script>
              alert('Pemilihan BEM gagal!');
              document.location.href = '';
            </script>";
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Pilih Paslon BEM"); ?>
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
    <section id="pilih" class="py-5 px-sm-5 cont-h-100 d-flex align-items-center">
        <div class="container text-center">
            <h1>Pilih Calon</h1>
            <div class="row justify-content-center">
                <div class="col col-12 col-sm-10 col-md-10 col-lg-5 p-3">
                    <div class="card p-4 p-sm-5 h-100">
                        <div class="card-body">
                            <a href="pilih-calon.php?pilih=1" style="color:black; text-decoration:none;">
                                <div class=" row g-2">
                                    <div class="col-6">
                                        <img src="img/bem/kabem.png" alt="" class="img-fluid"
                                            style="border-radius: 50%;" />
                                    </div>
                                    <div class="col-6">
                                        <img src="img/bem/wakabem.png" alt="" class="img-fluid"
                                            style="border-radius: 50%;" />
                                    </div>
                                    <div class="col-6">
                                        <h3>Ketua</h3>
                                        <p>Zulvan Syahriar</p>
                                    </div>
                                    <div class="col-6">
                                        <h3>Wakil</h3>
                                        <p>Andhara Marsha Belinda</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-sm-10 col-md-10 col-lg-5 p-3">
                    <div class="card p-4 p-sm-5 h-100">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <a href="pilih-calon.php?pilih=2" style="color:black; text-decoration:none;">
                                <h2>Kotak Kosong</h2>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- modal 1-->
    <div class="modal fade successModal" id="pilih1" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5 text-center">
                    <p>Konfirmasi</p>
                    <h2>Anda Memilih Calon 1</h2>
                    <form action="" method="POST">
                        <input type="text" name="kode" value="<?= $database['kode'] ?>" hidden />
                        <input type="text" name="angkatan" value="<?= $database['angkatan'] ?>" hidden />
                        <input type="text" name="npm" value="<?= $database['npm'] ?>" hidden />
                        <input type="text" name="pilihan" value="1" hidden />
                        <button type=" submit" class="btn btn-light my-3" name="coblos">Konfirmasi
                            Pilihan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal 1-->
    <div class=" modal fade successModal" id="pilih2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5 text-center">
                    <p>Konfirmasi</p>
                    <h2>Anda Memilih Kotak Kosong</h2>
                    <form action="" method="POST">
                        <input type="text" name="kode" value="<?= $database['kode'] ?>" hidden />
                        <input type="text" name="angkatan" value="<?= $database['angkatan'] ?>" hidden />
                        <input type="text" name="npm" value="<?= $database['npm'] ?>" hidden />
                        <input id="pilihan" type="text" class="form-control mt-4" placeholder="Masukkan Kode Unik"
                            name="pilihan" value="2" hidden />

                        <button type="submit" class="btn btn-light my-3" name="coblos">Konfirmasi
                            Pilihan</button>
                    </form>
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
    <?php if(isset($_GET["pilih"])) : ?>
    <?php $pilihan = $_GET["pilih"]; $tujuan = $pilihan == "1" ? "pilih1" : "pilih2";  ?>
    <script>
    var myModal = new bootstrap.Modal(document.getElementById('<?= $tujuan; ?>'), {
        keyboard: false
    })
    var modalToggle = document.getElementById('<?= $tujuan; ?>') // relatedTarget
    myModal.show(modalToggle)
    </script>
    <?php endif; ?>
</body>

</html>