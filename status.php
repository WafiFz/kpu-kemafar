<?php 
require 'ui.php'; 
require 'functions.php';

if(isset($_POST["cek"])){
    validasi_input($_POST["npm"]); 
    $npm = $_POST["npm"];
    $database = query("SELECT * FROM pemilih WHERE npm = '$npm'");
}

   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Status"); ?>
    <script type="text/javascript">
    window.history.forward();

    function noBack() {
        window.history.forward();
    }
    </script>
</head>

<body>
    <!-- navbar -->
    <?php navbar("");  ?>
    <!-- akhir navbar -->

    <!-- section -->
    <section id="cek" class="p-5 cont-h-100 paper-bg">
        <div class="container text-center">
            <h1 class="my-4">Cek Status Memilih Anda Disini</h1>
            <p>Mohon masukkan NPM anda pada form dibawah</p>
            <div class="row justify-content-center">
                <form class="col-12 col-md-8 col-lg-6" action="" method="POST">
                    <div class="input-group mb-3" data-aos="fade-up">
                        <input id="npm" type="text" class="form-control" placeholder="NPM" aria-label="npm"
                            aria-describedby="button-addon2" value="" name="npm" />
                        <button class=" btn btn-outline-secondary" type="submit" id="button-addon2"
                            data-bs-toggle="modal" data-bs-target="#successModal" name="cek">Cek Status</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- modal -->
    <div class="modal fade successModal" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5 text-center">
                    <h2>Anda Terdaftar!</h2>
                    <form action="validasi_pemilih.php" method="POST">
                        <p>Kode unik dikirimkan ke alamat email <?= $database[0]["email"]; ?> saat proses pemilihan.
                            Silakan masukan kode unik untuk menggukan hak pilih </p>
                        <input id="kodeunik" type="text" class="form-control mt-4" placeholder="Masukkan Kode Unik"
                            name="kode" />
                        <button type=" submit" class="btn btn-light my-3" name="validasi_pemilih">Gunakan Hak
                            Pilih</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <p>Cara memilih? <a href="Cara-Memilih">klik di sini</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="failedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <h2 class="text-center mb-3">Anda Tidak Terdaftar</h2>
                    <p>Mohon hubungi kontak di bawah ini :</p>
                    <ul>
                        <li> Priskila </li>
                        <li> <a href="https://line.me/ti/p/~priskila_ng">Line :</a> priskila_ng </li>
                        <li> <a href="https://wa.me/6282122008033">Whatsapp : 082122008033 </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Done" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #F0E68C;">
                <div class="modal-header text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <h2 class="text-center mb-3">Terimakasih,</h2>
                    <h2 class="text-center mb-3">Anda Telah Memilih</h2>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- footer -->
    <?php footer(); ?>
    <?php if(isset($_POST["cek"])) : ?>
    <?php  validasi_input($_POST["npm"]); ?>
    <?php $tujuan = cari($_POST["npm"]); ?>
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