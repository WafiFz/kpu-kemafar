<?php
// Define your location project directory in htdocs (EX THE FULL PATH: D:\xampp\htdocs\x-kang\simple-routing-with-php)
$project_location = "/kpu-kemafar-web";
$project_location = "";
$me = $project_location;

$request = $_SERVER['REQUEST_URI'];


switch ($request) {
    case $me . '/':
        require "home.php";
        break;
    case $me . '/home':
        require "home.php";
        break;
    case $me . '/Cara-Memilih':
        require "guide.php";
        break;
    case $me . '/Info-Pemilu':
        require "info.php";
        break;
    case $me . '/Lapor':
        require "lapor.php";
        break;
    case $me . '/Calon1':
        require "calon1.php";
        break;
    case $me . '/Calon2':
        require "calon2.php";
        break;
    case $me . '/Status':
        require "status.php";
        break;
    case $me . '/Tabulasi':
        require "panitia/tabulasi.php";
        break;
    case $me . '/Hasil-Pemilu':
        require "panitia/hasil.php";
        break;
    case $me . '/Laporan':
        require "panitia/laporan.php";
        break;
    case $me . '/Laporan':
        require "panitia/form.php";
        break;
    case $me . '/Terdaftar':
        require "panitia/menu-terdaftar.php";
        break;
    case $me . '/Terdaftar-2017':
        require "panitia/terdaftar-2017.php";
        break;
    case $me . '/Terdaftar-2018':
        require "panitia/terdaftar-2018.php";
        break;
    case $me . '/Terdaftar-2019':
        require "panitia/terdaftar-2019.php";
        break;
    case $me . '/Terdaftar-2020':
        require "panitia/terdaftar-2020.php";
        break;
    case $me . '/Terdaftar-2021':
        require "panitia/terdaftar-2021.php";
        break;             
    case $me . '/Sudah-Memilih':
        require "panitia/menu-sudah-memilih.php";
        break;
    case $me . '/Sudah-Memilih-2017':
        require "panitia/sudah-milih-2017.php";
        break;
    case $me . '/Sudah-Memilih-2018':
        require "panitia/sudah-milih-2018.php";
        break;
    case $me . '/Sudah-Memilih-2019':
        require "panitia/sudah-milih-2019.php";
        break;
    case $me . '/Sudah-Memilih-2020':
        require "panitia/sudah-milih-2020.php";
        break;
    case $me . '/Sudah-Memilih-2021':
        require "panitia/sudah-milih-2021.php";
        break;             
    case $me . '/inirahasia':
        require "panitia/panit-login.php";
        break;
    case $me . '/Belum-Memilih':
        require "panitia/menu-belum-memilih.php";
        break;
    case $me . '/Belum-Memilih-2017':
        require "panitia/belum-milih-2017.php";
        break;
    case $me . '/Belum-Memilih-2018':
        require "panitia/belum-milih-2018.php";
        break;
    case $me . '/Belum-Memilih-2019':
        require "panitia/belum-milih-2019.php";
        break;
    case $me . '/Belum-Memilih-2020':
        require "panitia/belum-milih-2020.php";
        break;
    case $me . '/Belum-Memilih-2021':
        require "panitia/belum-milih-2021.php";
            break;
    case $me . '/Pendataan-Pemilih':
        require "panitia/form.php";
        break;    
    case $me . '/Pilih-BEM':
        require "pilih-calon.php";
        break;
    case $me . '/Pilih-BPM2020':
        require "pilih-bpm-20.php";
        break;
    case $me . '/Pilih-BPM2019':
        require "pilih-bpm-19.php";
        break;                               
    case $me . '/Pilih-BPM2021':
        require "pilih-bpm-21.php";
        break;
    case $me . '/Calon-BPM2019':
        require "calon-bpm19.php";
        break;
    case $me . '/Calon-BPM2020':
        require "calon-bpm20.php";
        break;
    case $me . '/Calon-BPM2021':
        require "calon-bpm21.php";
        break;
    case $me . '/Pilih-BPM2017':
        require "logout.php";
        break;
    case $me . '/Pilih-BPM2018':
        require "logout.php";
        break;                        
    case $me . '/Logout':
        require "logout.php";
        break;
    case $me . '/hasilmasihrahasia':
        require "panitia/hasil.php";
        break;
    case $me . '/DPT':
        require "panitia/terdaftar-semua.php";
        break;
    case $me . '/Edit-DPT':
        require "panitia/edit-data.php";
        break;                     
    default:
        http_response_code(404);
        echo "404 Page Not Found";
        break;
}