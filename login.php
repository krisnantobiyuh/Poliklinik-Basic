<!DOCTYPE html>
<html>
  <head>  
    <?php 
    include "library/db.php";

if (isset($_POST['login'])) {
  extract($_POST);
  $pass1 = base64_encode($pass);
  $a = $db->view("tuser WHERE  password='$pass1'");
  if ($a->rowCount() != 0) {
    session_start();

    $h = $a->fetch();  
    $_SESSION['id_user']=$h['id_user'];
          $_SESSION['level']=$h['status'];
          $_SESSION['nama']=$h['nama_user'];
          $_SESSION['poli']=$h['id_poli'];
          $_SESSION['tarif']=$h['tarif'];

    $status = $h['status'];
    switch ($status) {
      case '1':
          $function->direct('karyawan/');
        break;
      
      case '2':
          $function->direct('karyawan/');
        break;
      
      case '3':
          $function->direct('karyawan/');
        break;
      case '4':
          $function->direct('./');
        break;

      case '5':
          $function->direct('karyawan/');
        break;
      
      default:
        # code...
        break;
    }

  
  }
    else
  {
    echo  ' 
    <center>
      <div class="callout callout-danger lead">
        <h2>UPS !!!</h2>
        <p>
         Pasword failed. Try again.!!
        </p>
      </div>
    </center>
    ';
  }
}
   ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Poliklinik</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="icon" type="image/png" href="logo/logo-1.png">

 
  </head>
  <body class="hold-transition login-page">
 

    <div class="login-box">
      <div class="login-logo"><b class="text-blue">FORM</b><b class="text-yellow"> LOGIN</b></div>
      <div class="login-box-body">
        <p class="login-box-msg">Login your session</p>
        <form method="post">
          <!-- <div class="form-group has-feedback">
          <input type="text" class="form-control" name="user">
          </div> -->
          <div class="form-group">
          <input type="password" class="form-control" name="pass" placeholder="Entry your access rights">
        </div>
          <button name="login" type="submit" class="btn btn-warning btn-flat col-md-12 center text-white"><b>LOGIN</b></button>
        <div class="row ">
          <div class="form-group">
         </div>
         </div>
        </form>
      </div>
    </div>
        


  </body>
    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
    <script src="docs.js"></script>
  </body>
</html>