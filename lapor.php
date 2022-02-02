<?php 
require 'ui.php';
require 'functions.php';
if(isset($_POST["submit"])){
    if(lapor($_POST) > 0){
        //echo "test";
        $tujuan = "home";
        echo "<script>
                alert('Laporan berhasil!');
                document.location.href = '$tujuan';
                </script>";
        exit;
    }else{
        echo "<script>
                alert('Laporan gagal!');
                document.location.href = '';
                </script>";
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Lapor"); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbar("lapor");  ?>
    <!-- akhir navbar -->

    <!-- container -->
    <section class="py-5 paper-bg">
        <section id="lapor-box" class="py-5">
            <div class="container lapor-container" data-aos="zoom-in">
                <div class="row justify-content-center">
                    <div class="col col-10 col-md-9 p-4">
                        <h1 class="text-center mb-3">Laporan Pelanggaran Pemilu</h1>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="npm" class="form-label">NPM</label>
                                        <input type="text" class="form-control" id="npm" name="npm"
                                            placeholder="Contoh : 260110210035" required />
                                    </div>
                                    <div class="mb-2">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Contoh : Maritsa Widati Aqila Rumawan" required />
                                    </div>
                                    <div class="mb-2">
                                        <label for="waktu" class="form-label">Waktu</label>
                                        <input type="date" class="form-control" id="waktu" name="waktu" required />
                                    </div>
                                    <div class="mb-2">
                                        <label for="platform" class="form-label">Platform</label>
                                        <input type="text" class="form-control" id="platform" name="platform"
                                            placeholder="Contoh : Instagram" required />
                                    </div>
                                    <div class="mb-2">
                                        <label for="terlapor" class="form-label">Nama Pihak Terlapor</label>
                                        <input type="text" class="form-control" id="terlapor" name="terlapor"
                                            placeholder="Contoh : Alifia" required />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="laporan" class="form-label">Isi Laporan</label>
                                        <textarea name="laporan" id="laporan" cols="30" rows="8" class="form-control"
                                            placeholder="Contoh : Placeholder laporan" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bukti" class="form-label">Bukti Pelanggaran</label>
                                        <input type="file" name="bukti" id="bukti" class="form-control" required />
                                    </div>
                                    <button type="submit" class="btn btn-primary d-block ms-auto mt-4" name="submit"
                                        onclick="return confirm('Buat Laporan?')">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <p class="text-center">Data pelapor dilindungi oleh KPU.</p>
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