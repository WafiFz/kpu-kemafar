<?php 
session_start();
require 'ui.php';
require 'functions.php';


//cek session
if(isset($_SESSION["login_panitia"])){
    echo "<script>
              alert('Anda telah login');
          </script>";
    header("Location: Tabulasi",  true, 301);      
    exit;
  } 
  
  if(isset($_POST["login_panitia"])){
    
    $username_panitia = $_POST["username_panitia"];
    $password_panitia = $_POST["password_panitia"];

    validasi_input($username_panitia);
    validasi_input($password_panitia);
    
    $result = mysqli_query($conn, "SELECT * FROM panitia WHERE username_panitia = '$username_panitia'");

    $result2 = mysqli_query($conn, "SELECT * FROM panitia WHERE password_panitia = '$password_panitia'");
  
    //cek username
    if(mysqli_num_rows($result) === 1 && mysqli_num_rows($result2) === 1){
      //cek password
      $database = mysqli_fetch_assoc($result);
      //if(password_verify($password_panitia, $database["password_panitia"])){
        
        //set session
        $_SESSION["login_panitia"] = $username_panitia;
  
        //cek tetap masuk
        if(isset($_POST["keep_login"])){
          //buat cookie
          setcookie('username', $database['username_panitia'], time()+300);
          setcookie('key', hash('sha256', $database['username_panitia']), time()+300);
        }
  
        header("Location: Tabulasi",  true, 301);
        exit;
      //}
    }
    
    $error = true;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php header_html(" - Login Panitia"); ?>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-bg navbar-dark">
        <div class="container-fluid">
            <div class="d-flex w-50 justify-content-between">
                <a class="navbar-brand" href=""> <img src="/img/LOGO KPU 1 1.png" alt="" width="auto" height="30"
                        class="d-inline-block align-text-top" /> KPU Kemafar </a>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <section id="panit-login" class="px-3 py-4 cont-h-100 d-flex align-items-center">
        <div class="container">
            <!-- apabila error -->
            <?php if(isset($error)) : ?>
            <p class="text-center" style="color:red; font-style: italic;">username / password salah</p>
            <?php endif; ?>
            <!-- akhir apabila error -->
            <div class="row justify-content-center">
                <div class="col col-12 col-sm-8 col-md-6 col-lg-4 px-4 py-5">
                    <form action="" method="post">
                        <div class="">
                            <h2 class="text-center">LOG IN</h2>
                            <label for="usernameInput" class="form-label mt-3 mb-1">Username</label>
                            <input type="text" class="form-control" id="usernameInput" placeholder="Masukkan Usename"
                                name="username_panitia"
                                value="<?php if(isset($_POST["login_panitia"])){ echo $_POST['username_panitia']; }?>"
                                required />
                            <label for="passwordInput" class="form-label mt-2 mb-1">Password</label>
                            <input type="password" class="form-control" id="passwordInput"
                                placeholder="Masukkan Password" name="password_panitia"
                                value="<?php if(isset($_POST["login_panitia"])){ echo $_POST['password_panitia']; }?>"
                                required />
                            <!-- <div class="form-check mt-1">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                    name="keep_login" />
                                <label class="form-check-label" for="defaultCheck1"> Ingat Saya </label>
                            </div> -->
                            <div class="sign-button text-center">
                                <button class="btn btn-primary mt-4" type="submit" name="login_panitia">LOG IN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php footer(); ?>
    <!-- akhir footer -->
</body>

</html>