<?php 
session_start();
require 'ui.php';
require 'functions.php';

wajib_login_panitia();
$table = "pemilih";
$database = query("SELECT * FROM $table");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Sudah Memilih"); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbarPanitia("");  ?>
    <!-- akhir navbar -->

    <section id="data-tabulasi" class="p-3 p-sm-5 cont-h-100 d-flex align-items-center paper-bg">
        <div class="container">
            <h1 class="text-center">Telah Menggunakan Hak Pilih</h1>
            <table class="table align-middle mt-4">
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
    </section>

    <!-- footer -->
    <?php footer(); ?>
    <!-- akhir footer -->
</body>

</html>