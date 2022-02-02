<?php 
session_start();
require 'ui.php';
require 'functions.php';

wajib_login_panitia();

if(isset($_POST["edit"])){
    if(edit_data($_POST) > 0){
        //echo "test";
        $tujuan = "DPT";
        echo "<script>
                alert('Edit berhasil!');
                document.location.href = '$tujuan';
                </script>";
        exit;
    }else{
        echo "<script>
                alert('Edit gagal!');
                document.location.href = '';
                </script>";
        exit;
    }
}

if($_POST == []){header("location: DPT", true, 301);exit;}
$npm = $_POST["npm"];
$database = query("SELECT * FROM pemilih WHERE npm = '$npm'")[0];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Edit DPT"); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbarPanitia("dpt");  ?>
    <!-- akhir navbar -->

    <!-- container -->
    <section class="py-5 paper-bg">
        <section id="form-box" class="py-5">
            <div class="container form-container">
                <div class="row justify-content-center">
                    <div class="col col-8 col-md-6 col-lg-4 p-4">
                        <h1 class="text-center mb-4">Form Edit Pendataan Pemilih</h1>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="text" class="form-control" id="npm" name="key"
                                        value="<?= $database['npm']; ?>" disabled />
                                    <input type="text" class="form-control" id="npm" name="key"
                                        value="<?= $database['npm']; ?>" hidden />
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="<?= $database['nama']; ?>" />
                                </div>
                                <div class="mb-3">
                                    <label for="angkatan" class="form-label">Angkatan</label>
                                    <input type="text" class="form-control" id="angkatan" name="angkatan"
                                        value="<?= $database['angkatan']; ?>" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?= $database['email']; ?>" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary d-block ms-auto mt-4" name="edit">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- akhir container -->

    <!-- footer -->
    <?php footer(); ?>
    <!-- akhir footer -->
</body>

</html>