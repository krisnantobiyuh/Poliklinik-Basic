<!DOCTYPE html>
<html>
<head>
 <?php 
  session_start();
    include "../library/db.php";
    include "../library/js.php";
    include "../view/main/head2.php";

    $idLog = $function->session("id_user");
    $levelLog = $function->session("level");
    $namaLog = $function->session("nama");
    $poliLog = $function->session("poli");
    $tarifLog = $function->session("tarif");
    if (empty($idLog)) {
      $function->direct('login.php');
    }
    include "../library/leyout.php";
   ?>
</head>

<body class="hold-transition <?=$skins?> layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <?php include "../view/main/top-bar2.php" ?>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
    <section class="content-header">
        <h1>
          Poliklinik 
          <small>Husada Indah</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
          <!-- <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li> -->
        </ol>
      </section>
      <section class="content">
        <?php
          include "../view/modal/modal.php";
          include "../library/obat.php";
         

          $h = isset($_GET['h'])?$_GET['h']:'';
            switch ($levelLog) {
              case '1':
              if ($h) 
                    {
                      include "../view/page/".$h.".php" ;
                    }
                  else
                    {
                    include "../view/page/daftarpasien.php" ;
                    }
                break;
              
              case '2':
              if ($h) 
                    {
                      include "../view/page/".$h.".php" ;
                    }
                  else
                    {
                    include "../view/page/reseppasien.php" ;
                    }
                break;
              
              case '3': 
                  if ($h) 
                    {
                      include "../view/page/".$h.".php" ;
                    }
                  else
                    {
                      include "../view/page/pasien.php" ; 
                    }
                break;
              case '5':
                  if ($h) 
                    {
                      include "../view/page/".$h.".php" ;
                    }
                  else
                    {
                      include "../view/page/pembayaran.php" ;
                    }
                break;
              
              default:
                # code...
                break;
            }
        ?>
      </section>

    </div>

  </div>

  <footer class="main-footer">
   <?php include "../library/notif.php" ?>
   <?php include "../library/deleteModal.php" ?>
   <?php include "../view/main/footer.php" ?>
  </footer>
</div>
<!-- ./wrapper -->

</body>
</html>
