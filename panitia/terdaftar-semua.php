<?php 
session_start();
require 'ui.php';
require 'functions.php';
require 'kirim-email.php';

wajib_login_panitia();
$table = "pemilih";
$database = query("SELECT * FROM $table");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Semua DPT"); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbarPanitia("dpt");  ?>
    <!-- akhir navbar -->
    <section id="data-tabulasi" class="p-3 p-sm-5 cont-h-100 d-flex align-items-center paper-bg">
        <div class="container">
            <h1 class="text-center">Terdaftar Sebagai Pemilih</h1>
            <?php 
                //tombol search ditekan
                if(isset($_POST["search"])){
                    $database = search_semua_pemilih($_POST["keyword"]);
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
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
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
                            <?php $npm = $row["npm"]; $nama = $row["nama"]; $email = $row["email"];?>
                            <form action="Edit-DPT" method="POST">
                                <input type="text" name="npm" hidden value="<?= $row["npm"]; ?>">
                                <td><button type="submit" class="btn btn-primary" style="min-width: 80px;"
                                        onclick="return confirm('Edit Data\nNPM   : <?= $npm ?> \nNama  : <?= $nama; ?> \nEmail   : <?= $email; ?>\nTekan OK untuk lanjutkan')">Edit
                                    </button>
                                </td>
                            </form>

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