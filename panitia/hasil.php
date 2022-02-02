<?php 
    session_start();
    require 'ui.php';
    require 'functions.php';

    wajib_login_panitia();
    $kotak_suara = query("SELECT * FROM kotak_suara");
    $bpm19 = query("SELECT nomor_pilihan, pilihan, count(kode) FROM bpm19 group by nomor_pilihan");
    $bpm20 = query("SELECT * FROM bpm20");
    $bpm21 = query("SELECT * FROM bpm21");
    $kotak_suara = query("SELECT * FROM kotak_suara");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Hasil"); ?>
</head>

<body>
    <!-- navbar -->
    <?php navbarPanitia("hasil");  ?>
    <!-- akhir navbar -->

    <section id="hasil" class="p-3 p-sm-5 cont-h-100 paper-bg">
        <div class="container">
            <h1 class="text-center">Hasil Perolehan Suara Akhir BEM</h1>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="table-container">
                        <table class="table">
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Suara Masuk</th>
                                <th scope="col">Paslon 1</th>
                                <th scope="col">Paslon 2</th>
                            </tr>
                            <?php $total_jumlah_pemilih_paslon1 = 0 ?>
                            <?php $total_jumlah_pemilih_paslon2 = 0 ?>
                            <?php for($i=0; $i < 5; $i++ ): ?>
                            <?php  $tanggal = '2' . $i . '/12/2021%'; ?>
                            <?php $jumlah_pemilih_paslon1 = get_jumlah_baris("SELECT * FROM kotak_suara WHERE timestamp like '$tanggal' AND pilihan = '1'");?>
                            <?php $jumlah_pemilih_paslon2 = get_jumlah_baris("SELECT * FROM kotak_suara WHERE timestamp like '$tanggal' AND pilihan = '2'");?>
                            <?php $suara_masuk = $jumlah_pemilih_paslon1 + $jumlah_pemilih_paslon2;?>
                            <?php $total_jumlah_pemilih_paslon1 += $jumlah_pemilih_paslon1;?>
                            <?php $total_jumlah_pemilih_paslon2 += $jumlah_pemilih_paslon2;?>
                            <tr>
                                <td scope="row"><?= '2' . $i . '/12/2021'; ?></td>
                                <td><?= $suara_masuk; ?></td>
                                <td><?= $jumlah_pemilih_paslon1; ?></td>
                                <td><?= $jumlah_pemilih_paslon2; ?></td>
                            </tr>
                            <?php endfor; ?>
                            <?php $total_jumlah_suara_masuk = $total_jumlah_pemilih_paslon1 + $total_jumlah_pemilih_paslon2 ?>
                            <tr>
                                <th>TOTAL</th>
                                <th><?= $total_jumlah_suara_masuk; ?></th>
                                <th><?= $total_jumlah_pemilih_paslon1; ?></th>
                                <th><?= $total_jumlah_pemilih_paslon2; ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <h1 class="text-center">Presentase Suara</h1>
            <div class="col-12">
                <div id="pieChart"></div>
            </div>
        </div>
        <div class="container py-4 px-2">
            <h1 class="text-center mb-4">Hasil Perhitungan BPM</h1>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="table-container">
                        <caption><strong>BPM 2019</strong></caption>
                        <table class="table">
                            <tr>
                                <th scope="col">No. Urut</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Perolehan Suara</th>
                            </tr>
                            <?php $total_jumlah_pemilih_bpm19 = 0 ?>
                            <?php for($i=1; $i <= 8; $i++ ): ?>
                            <?php $jumlah_pemilih_bpm19 = get_jumlah_baris("SELECT * FROM bpm19 WHERE nomor_pilihan = '$i'");?>
                            <?php $total_jumlah_pemilih_bpm19 += $jumlah_pemilih_bpm19;?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?php nama_bpm19($i); ?></td>
                                <td><?= $jumlah_pemilih_bpm19; ?></td>
                            </tr>
                            <?php endfor; ?>
                            <tr>
                                <th>TOTAL</th>
                                <th>=</th>
                                <th><?= $total_jumlah_pemilih_bpm19; ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="table-container">
                        <caption><strong>BPM 2020</strong></caption>
                        <table class="table">
                            <tr>
                                <th scope="col">No. Urut</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Perolehan Suara</th>
                            </tr>
                            <?php $total_jumlah_pemilih_bpm20 = 0 ?>
                            <?php for($i=1; $i <= 8; $i++ ): ?>
                            <?php $jumlah_pemilih_bpm20 = get_jumlah_baris("SELECT * FROM bpm20 WHERE nomor_pilihan = '$i'");?>
                            <?php $total_jumlah_pemilih_bpm20 += $jumlah_pemilih_bpm20;?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?php nama_bpm20($i); ?></td>
                                <td><?= $jumlah_pemilih_bpm20; ?></td>
                            </tr>
                            <?php endfor; ?>
                            <tr>
                                <th>TOTAL</th>
                                <th>=</th>
                                <th><?= $total_jumlah_pemilih_bpm20; ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="table-container">
                        <caption><strong>BPM 2021</strong></caption>
                        <table class="table">
                            <tr>
                                <th scope="col">No. Urut</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Perolehan Suara</th>
                            </tr>
                            <?php $total_jumlah_pemilih_bpm21 = 0 ?>
                            <?php for($i=1; $i <= 8; $i++ ): ?>
                            <?php $jumlah_pemilih_bpm21 = get_jumlah_baris("SELECT * FROM bpm21 WHERE nomor_pilihan = '$i'");?>
                            <?php $total_jumlah_pemilih_bpm21 += $jumlah_pemilih_bpm21;?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?php nama_bpm21($i); ?></td>
                                <td><?= $jumlah_pemilih_bpm21; ?></td>
                            </tr>
                            <?php endfor; ?>
                            <tr>
                                <th>TOTAL</th>
                                <th>=</th>
                                <th><?= $total_jumlah_pemilih_bpm21; ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- footer -->
    <?php footer(); ?>
    <!-- akhir footer -->

    <!-- pie -->
    <script src=" https://canvasjs.com/assets/script/canvasjs.min.js">
    </script>
    <script>
    <?php $jumlah_pemilih_calon1 = get_jumlah_baris("SELECT * FROM kotak_suara WHERE pilihan = '1'");?>
    <?php $jumlah_pemilih_calon2 = get_jumlah_baris("SELECT * FROM kotak_suara WHERE pilihan = '2'");?>
    <?php $jumlah_pemilih_golput = get_jumlah_baris("SELECT * FROM pemilih") - ($jumlah_pemilih_calon1 + $jumlah_pemilih_calon2);?>
    window.onload = function() {
        var chart = new CanvasJS.Chart("pieChart", {
            backgroundColor: "rgba(0,0,0,0.0)",
            animationEnabled: true,
            title: {
                text: "",
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: '##0 "orang"',
                toolTipContent: "{label} : {y} (#percent%)",
                indexLabel: "{label} ({y})",
                dataPoints: [{
                        y: <?= $jumlah_pemilih_calon2; ?>,
                        label: "Kotak Kosong"
                    },
                    {
                        y: <?= $jumlah_pemilih_golput; ?>,
                        label: "Golput"
                    },
                    {
                        y: <?= $jumlah_pemilih_calon1; ?>,
                        label: "Paslon 1"

                    },
                ],
            }, ],
        });
        chart.render();
    };
    </script>
</body>

</html>