<?php 
session_start();
require 'ui.php';
require 'functions.php';

wajib_login_panitia();
if(isset($_POST["submit"])){
    if(submit_form($_POST) > 0){
        //echo "test";
        $tujuan = "Pendataan-Pemilih";
        echo "<script>
                alert('Pendataan berhasil!');
                document.location.href = '$tujuan';
                </script>";
        exit;
    }else{
        echo "<script>
                alert('Pendataan gagal!');
                document.location.href = '';
                </script>";
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Pendataan Pemilih"); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbarPanitia("form");  ?>
    <!-- akhir navbar -->

    <!-- container -->
    <section class="py-5 paper-bg">
        <section id="form-box" class="py-5">
            <div class="container form-container">
                <div class="row justify-content-center">
                    <div class="col col-8 col-md-6 col-lg-4 p-4">
                        <h1 class="text-center mb-4">Form Pendataan Pemilih</h1>
                        <form action="Pendataan-Pemilih" method="POST">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="text" class="form-control" id="npm" name="npm" />
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" />
                                </div>
                                <div class="mb-3">
                                    <label for="angkatan" class="form-label">Angkatan</label>
                                    <input type="text" class="form-control" id="angkatan" name="angkatan" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary d-block ms-auto mt-4"
                                name="submit">Submit</button>
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