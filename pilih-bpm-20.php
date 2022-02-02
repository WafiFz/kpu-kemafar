<?php 
session_start();
require 'ui.php';
require 'functions.php';

wajib_login();
$kode = $_SESSION["kode"];

$database = query("SELECT * FROM pemilih WHERE kode = '$kode'")[0];

wajib_pilih_sesuai_angkatan($database["angkatan"], "2020");

if(isset($_POST["coblos"])){
    if(coblos2($_POST, "bpm20") > 0 && edit_status_bpm($_POST) > 0){
        $tujuan = "logoutpemilih.php";
        echo "<script>
                alert('Pemilihan BPM berhasil!');
                document.location.href = '$tujuan';
                </script>";
        exit;
    }else{
        echo "<script>
                alert('Pemilihan BPM gagal!');
                document.location.href = '';
                </script>";
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Pilih BPM 2020"); ?>
    <script type="text/javascript">
    window.history.forward();

    function noBack() {
        window.history.forward();
    }
    </script>
</head>

<body class="paper-bg2">
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
            <h1>Pilih BPM 2020</h1>
            <div class="row justify-content-center">
                <?php for($i=1; $i<=8; $i++) : ?>
                <div class="container col col-10 col-lg-3 col-sm-6 col-md-4 p-3 item-center" data-aos="fade-up">
                    <div class="card p-3 h-100">
                        <div class="card-body">
                            <a href="pilih-bpm-20.php?pilih=<?= $i; ?>" style="color:black; text-decoration:none;">
                                <div class="row g-2  justify-content-center">
                                    <div class="no-urut" style="width: 38px; height:38px;"><?= $i; ?></div>
                                    <img src="img/bpm/20/<?= $i; ?>.png" alt="" class="img-fluid"
                                        style="border-radius:50%" />
                                    <h2 style=" font-size:large;"><?= nama_bpm20($i); ?></h2>
                                    <p><?= keterangan_bpm20($i); ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- modal 1-->
    <?php if(isset($_GET["pilih"])) : ?>
    <?php $pilihan = $_GET['pilih']; ?>
    <?php 
        if($pilihan > 8 || $pilihan < 1){
            echo "<script>
                    document.location.href = 'Pilih-BPM2020';
                </script>";
            exit;
        } 
    ?>
    <div class="modal fade successModal" id="<?= $pilihan; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5 text-center">
                    <p>Konfirmasi</p>
                    <h5>Anda Memilih Calon <?= $pilihan; ?>:<br> <?= nama_bpm20($pilihan); ?></h5>
                    <form action="" method="POST">
                        <input type="text" name="kode" value="<?= $database['kode'] ?>" hidden />
                        <input type="text" name="angkatan" value="<?= $database['angkatan'] ?>" hidden />
                        <input type="text" name="npm" value="<?= $database['npm'] ?>" hidden />
                        <input type="text" name="nomor_urut" value="<?= $pilihan ?>" hidden />
                        <input type="text" name="pilihan" value="<?php nama_bpm20($pilihan); ?>" hidden />
                        <button type=" submit" class="btn btn-light my-3" name="coblos">Konfirmasi
                            Pilihan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

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
    <!-- AoS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <?php if(isset($_GET["pilih"])) : ?>
    <script>
    var myModal = new bootstrap.Modal(document.getElementById('<?= $pilihan; ?>'), {
        keyboard: false
    })
    var modalToggle = document.getElementById('<?= $pilihan; ?>') // relatedTarget
    myModal.show(modalToggle)
    </script>
    <?php endif; ?>
    <?php if(isset($_POST["coblos"])){
      var_dump($_POST);
      die;
    } ?>
</body>

</html>