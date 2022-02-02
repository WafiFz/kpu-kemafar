<?php 
session_start();
require 'ui.php';
require 'functions.php';

wajib_login_panitia();
$table = "laporan";
$database = query("SELECT * FROM $table");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Laporan"); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbarPanitia("laporan");  ?>
    <!-- akhir navbar -->

    <section id="laporan" class="p-3 p-sm-5 cont-h-100 d-flex align-items-center paper-bg">
        <div class="container">
            <h1 class="text-center">Tabel Laporan</h1>
            <div class="table-responsive mt-4">
                <table class="table align-middle">
                    <thead>
                        <tr class="">
                            <th scope="col">No</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Platform</th>
                            <th scope="col">Terlapor</th>
                            <th scope="col">Laporan</th>
                            <th scope="col">Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($database as $row) : ?>
                        <tr>

                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row["npm"]; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["waktu"]; ?></td>
                            <td><?= $row["platform"]; ?></td>
                            <td><?= $row["terlapor"]; ?></td>
                            <td><?= $row["laporan"]; ?></td>
                            <td>
                                <a href="panitia/download.php?tabel=laporan&filename=<?= $row["bukti"]; ?>"
                                    target="_new"><button type="button" class="btn btn-primary">Download</button></a>
                            </td>
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