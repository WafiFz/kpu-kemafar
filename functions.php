<?php 

$conn = mysqli_connect("localhost", "root", "", "dbkpukemafar");
$conn = mysqli_connect("localhost", "u775055294_octoscript", "delapanIstimewa820", "u775055294_dbkemafar");

//query
function query($query){
	global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];

	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function wajib_login($page = "Status"){
	global $conn;
	if(isset($_SESSION["kode"])){
		$kode = $_SESSION["kode"];
		$result = mysqli_query($conn, "SELECT * FROM pemilih WHERE kode = '$kode'");
		if(mysqli_num_rows($result) === 1){	
		}else{
			echo "<script>
			alert('Masukkan Kode dahulu!');
			document.location.href = '$page';
			</script>";
			exit;
		}
	}else{
		echo "<script>
			alert('Masukkan Kode dahulu!');
			document.location.href = '$page';
			</script>";
		exit;
	}
}

function wajib_login_panitia($page = "inirahasia"){	
	global $conn;
	if(isset($_SESSION["login_panitia"])){
		$username_panitia = $_SESSION["login_panitia"];
		$result = mysqli_query($conn, "SELECT * FROM panitia WHERE username_panitia = '$username_panitia'");
		if(mysqli_num_rows($result) === 1){	
		}else{
			echo "<script>
			alert('Login terlebih dahulu!');
			document.location.href = '$page';
			</script>";
			exit;
		}
	}else{
		echo "<script>
			alert('Login terlebih dahulu!');
			document.location.href = '$page';
			</script>";
		exit;
	}
}

function wajib_pilih_sesuai_angkatan($user_angkatan, $angkatan){
	if($user_angkatan != $angkatan){
		$tujuan = "Pilih-BPM" . $user_angkatan;
		echo "<script>
		alert('Hanya dapat memilih BPM sesuai angkatan!');
		document.location.href = '$tujuan';
		</script>";
	exit;}
}

function cari($kata_kunci){
	$query = "SELECT * FROM pemilih
			  WHERE npm = '$kata_kunci'
			  ";
	$hasil = query($query);
	
	if($hasil === []){
		return "failedModal";
	}
	if($hasil[0]["status"] == "Done" && $hasil[0]["status_bpm"] == "Done"){
		return "Done";
	}else{
		$tujuan = $hasil === [] ? "failedModal" : "successModal";
		return $tujuan; 	
	}
}

function validasi_input($input){
	if (!preg_match("/^[a-zA-Z .0-9]*$/",$input)) {  
		echo "<script>
            alert('Input tidak boleh ada simbol!');
            document.location.href = '';
        	</script>";
  		exit;	
	}
}

function coblos($data){
	global $conn;
	date_default_timezone_set("Asia/Jakarta");
	$timestamp = date("d/m/Y H:i:s");
	//ambil data dari tiap elemen dalam form
	$kode = htmlspecialchars($data["kode"]);
	$pilihan = htmlspecialchars($data["pilihan"]);
	$npm = htmlspecialchars($data["npm"]);
	$table = "kotak_suara";

	//insert kotak suara
	$query = "INSERT INTO $table VALUES ('$timestamp', '$kode', '$pilihan', '$npm')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function edit_status($data){
	global $conn;
	//ambil data dari tiap elemen dalam form
	$npm = htmlspecialchars($data["npm"]);
	$table = "pemilih";
	$status = "Done";

	//update pemilih
	$query = "UPDATE $table 
			  SET status = '$status' WHERE npm = '$npm'";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function edit_status_bpm($data){
	global $conn;
	//ambil data dari tiap elemen dalam form
	$npm = htmlspecialchars($data["npm"]);
	$table = "pemilih";
	$status = "Done";

	//update pemilih
	$query = "UPDATE $table 
			  SET status_bpm = '$status' WHERE npm = '$npm'";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function coblos2($data, $table){
	global $conn;
	date_default_timezone_set("Asia/Jakarta");
	$timestamp = date("d/m/Y H:i:s");
	//ambil data dari tiap elemen dalam form
	$kode = htmlspecialchars($data["kode"]);
	$pilihan = htmlspecialchars($data["pilihan"]);
	$npm = htmlspecialchars($data["npm"]);
	$nomor_urut = htmlspecialchars($data["nomor_urut"]);

	//insert kotak suara
	$query = "INSERT INTO $table VALUES ('$timestamp', '$kode', '$nomor_urut' , '$pilihan', '$npm')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload(){
	$nama_file = $_FILES["bukti"]["name"];
	$ukuran_file = $_FILES["bukti"]["size"];
	$error = $_FILES["bukti"]["error"];
	$temp = $_FILES["bukti"]["tmp_name"];

	//cek gambar dipuload

	if($error === 4){
		echo "<script>
				alert('Harus Ada Screenshot Bukti!');
			  </script>";
		return false;
	}

	//cek yg diupload harus gambar
	$ekstensi_valid = ['jpg', 'jpeg', 'png'];
	//split nama file
	$ekstensi_file = explode('.', $nama_file);
	//amnil ektensi
	$ekstensi_file = strtolower(end($ekstensi_file));
	//cek ekstensi valid
	if(!in_array($ekstensi_file, $ekstensi_valid)){
		echo "<script>
				alert('Yang diupload bukan gambar!');
			  </script>";
		return false;
	}

	//cek ukuran
	if($ukuran_file > 5000000){
		echo "<script>
				alert('Ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	//lolos cek, gambar diumpload

	//buat nama baru
	$nama_file_baru = uniqid();
	$nama_file_baru .= '.';
	$nama_file_baru .= $ekstensi_file;
	
	//upload ke directory
	move_uploaded_file($temp, 'img/Bukti/' . $nama_file_baru);

	//return nama file baru untuk diinsert
	return $nama_file_baru;
}

function lapor($data){
	global $conn;
	//ambil data dari tiap elemen dalam form
	$npm = htmlspecialchars($data["npm"]);
	$nama = htmlspecialchars($data["nama"]);
	$waktu = htmlspecialchars($data["waktu"]);
	$platform = htmlspecialchars($data["platform"]);
	$terlapor = htmlspecialchars($data["terlapor"]);
	$laporan = htmlspecialchars($data["laporan"]);

	//upload gambar
	$bukti = upload();

	if(!$bukti){return false;}

	//query insert data ke tabel buku
	$query = "INSERT INTO laporan VALUES ('', '$npm', '$nama', '$waktu', '$platform', '$terlapor', '$laporan', '$bukti')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function get_jumlah_baris($query = "SELECT * FROM pemilih"){
	global $conn;
	mysqli_query($conn, "$query");
	$jumlah_baris = mysqli_affected_rows($conn);

	return $jumlah_baris;
}

function submit_form($data){
	global $conn;
	//ambil data dari tiap elemen dalam form
	$nama = htmlspecialchars($data["nama"]);
	$angkatan = htmlspecialchars($data["angkatan"]);
	$npm = htmlspecialchars($data["npm"]);
	$email = htmlspecialchars($data["email"]);
	$kode = hash("sha256", uniqid(htmlspecialchars($data["nama"])));
	$table = "pemilih";

	//insert data pemilih
	$query = "INSERT INTO $table VALUES ('$angkatan', '$nama', '$npm',  '$email',  '$kode', null, null, null)";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function edit_data($data){
	global $conn;
	//ambil data dari tiap elemen dalam form
	$nama = htmlspecialchars($data["nama"]);
	$angkatan = htmlspecialchars($data["angkatan"]);
	$npm = htmlspecialchars($data["key"]);
	$email = htmlspecialchars($data["email"]);
	
	$table = "pemilih";

	//insert data pemilih
	$query = "UPDATE $table SET 
	angkatan = '$angkatan', 
	nama = '$nama', 
	email = '$email'
	WHERE npm = '$npm'";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function search_semua_pemilih($kata_kunci){
	$query = "SELECT * FROM pemilih
			  WHERE angkatan LIKE '%$kata_kunci%' 
			  OR nama LIKE '%$kata_kunci%'
			  OR npm LIKE '%$kata_kunci%'
			  OR email LIKE '%$kata_kunci%'
			";

	return query($query);
}

function search_pemilih($kata_kunci, $angkatan){
	$query = "SELECT * FROM pemilih
			  WHERE angkatan LIKE '$angkatan' 
			  AND ( nama LIKE '%$kata_kunci%'
			  OR npm LIKE '%$kata_kunci%'
			  OR email LIKE '%$kata_kunci%'
			  ) ";

	return query($query);
}

function search_pemilih_belum($kata_kunci, $angkatan){
	$query = "SELECT * FROM pemilih
			  WHERE status is NULL AND angkatan LIKE '$angkatan' 
			  AND ( nama LIKE '%$kata_kunci%'
			  OR npm LIKE '%$kata_kunci%'
			  OR email LIKE '%$kata_kunci%'
			  ) ";

	return query($query);
}

function search_pemilih_sudah($kata_kunci, $angkatan){
	$query = "SELECT * FROM pemilih
			  WHERE status = 'Done' AND angkatan LIKE '$angkatan' 
			  AND ( nama LIKE '%$kata_kunci%'
			  OR npm LIKE '%$kata_kunci%'
			  OR email LIKE '%$kata_kunci%'
			  ) ";

	return query($query);
}

// function edit_kode($data){
// 	global $conn;
// 	//ambil data dari tiap elemen dalam form
// 	$npm = htmlspecialchars($data["npm"]);
// 	$kode = hash("sha256", uniqid(htmlspecialchars($data["nama"])));
// 	$table = "pemilih";
// 	echo "\n" . $kode;
// 	//update pemilih
// 	$query = "UPDATE $table 
// 			  SET kode = '$kode' WHERE npm = '$npm'";
// 	mysqli_query($conn, $query);

// 	return mysqli_affected_rows($conn);
// }

?>