<?php 

session_start();
require '../functions.php';

wajib_login_panitia();

    if (isset($_GET['filename'])) {
    $back_dir    ="../img/Bukti";
    $tabel       =$_GET['tabel'];
    $filename    = $_GET['filename'];
    $file = $back_dir.'/'.$filename;
     //var_dump($file); die;
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: private');
            header('Pragma: private');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            
            exit;
        } 
        else {
            $_SESSION['pesan'] = "Oops! File - $filename - not found ...";
            header("location: Tabulasi", true, 301);
            exit();
        }
    }
?>