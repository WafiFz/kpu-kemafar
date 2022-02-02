<?php 
session_start();
require 'ui.php';
require 'functions.php';

wajib_login_panitia();
$table = "pemilih";
$database = query("SELECT * FROM $table WHERE status is NULL AND angkatan = '2021'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Belum Memilih 2021"); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbarPanitia("");  ?>
    <!-- akhir navbar -->

    <section id="data-tabulasi" class="p-3 p-sm-5 cont-h-100 d-flex align-items-center paper-bg">
        <div class="container">
            <h1 class="text-center">Belum Menggunakan Hak Pilih</h1>
            <?php 
                //tombol search ditekan
                if(isset($_POST["search"])){
                    $database = search_pemilih_belum($_POST["keyword"], "2021");
                } 
            ?>
            <form action="" method="post">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3 ms-auto">
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Keyword" aria-label="Keyword"
                            aria-describedby="basic-addon1" name="keyword" autofocus>
                        <button type="submit" class="btn btn-primary" name="search">Search</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table align-middle text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($database as $row) : ?>
                        <tr>

                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row["npm"]; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["angkatan"]; ?></td>
                            <td><?= $row["email"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                        <?php  endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php footer(); ?>
    <!-- akhir footer -->
</body>

</html>