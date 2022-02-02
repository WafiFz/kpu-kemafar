<?php 

session_start();

require 'functions.php';
if(isset($_POST["validasi_pemilih"])){
    
    $kode = $_POST["kode"];

    validasi_input($kode);
    
    $result = mysqli_query($conn, "SELECT * FROM pemilih WHERE kode = '$kode'");
    $query = "SELECT * FROM pemilih WHERE kode = '$kode'";
    $hasil = query($query);
        
    //cek username
    if(mysqli_num_rows($result) === 1){
      //cek password
      if($hasil[0]["status"] == "Done" && $hasil[0]["status_bpm"] == "Done"){
        echo "<script>
              alert('Anda Telah Memilih!');
              document.location.href = 'Status';
              </script>";
        exit;
    }
    
      $database = mysqli_fetch_assoc($result);
        //set session
        $_SESSION["kode"] = $kode;

        header("Location: Pilih-BEM", true, 301);
        exit;
    }
    
    echo "<script>
            alert('Kode Unik Salah!');
            document.location.href = 'Status';
            </script>";
  	exit;
} 
echo "<script>
        document.location.href = 'Status';
      </script>";
exit;

?>