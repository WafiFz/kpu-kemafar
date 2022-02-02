<?php 

function kirim_email($npm)
{
$hasil = query("SELECT * FROM pemilih WHERE npm = $npm")[0];

$emailPemilih = $hasil["email"];
$namaPemilih = $hasil["nama"];
$npmPemilih = $hasil["npm"];
$kodeUnik = $hasil["kode"];
//kirim email
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "panitia@kpukemafarunpad.com";
$to = $emailPemilih;
$subject = "NO REPLY - Kode Unik";

$message = "Halo!
Nama    : $namaPemilih 
NPM     : $npmPemilih 
Kode unik kamu pada Pemilu Kemafar 2021 adalah : 
$kodeUnik
		
Yuk gunakan hak pilihmu dengan memilih calon yang kamu inginkan!
Silakan lanjutkan proses pemilihan! 

Atau kamu bisa memilih dengan cara mengklik link berikut https://kpukemafarunpad.com/
----------------------------------------------------------------------
Cara Pemiihan : Silahkan copy kode unik lalu isi pada menu Gunakan Hak Pilih atau melalui https://kpukemafarunpad.com/Status lalu isi NPM kemudian paste atau ketik kode unik dan gunakan suara anda dengan bijak.

KODE BERSIFAT SANGAT RAHASIA, RAHASIAKAN SELALU KODE ANDA DARI SIAPAPUN!";
		
		$headers = "From:" . $from;
		mail($to,$subject,$message, $headers);
        //update status_pengiriman
        $conn = mysqli_connect("localhost", "u775055294_octoscript", "delapanIstimewa820", "u775055294_dbkemafar");
        //$conn = mysqli_connect("localhost", "root", "", "dbkpukemafar");
        $query = "UPDATE pemilih SET status_pengiriman = 'Terkirim' WHERE npm = '$npm'";
	    mysqli_query($conn, $query);
}

?>