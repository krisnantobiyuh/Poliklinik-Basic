<!DOCTYPE html>
<?php ob_start(); ?>
<html>
<head>

  <?php 
  session_start();
    include "library/db.php";
    include "library/js.php";
    include "view/main/head.php";

    $idLog = $function->session("id_user");
    $levelLog = $function->session("level");
    $namaLog = $function->session("nama");
    $poliLog = $function->session("poli");
    $tarifLog = $function->session("tarif");
    if (empty($idLog)) {
      $function->direct('login.php');
    }
    include "library/leyout.php";
   ?>
</head>
    
<body class="hold-transition <?=$skins?> sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <?php include "view/main/top-bar.php" ?>
  </header>
  <aside class="main-sidebar">
   <?php include "view/main/sidebar.php" ?>
  </aside>

  <div class="content-wrapper">
    <section class="content">
    <div class="row">
    <?php
      include "view/modal/modal.php";
      include "library/obat.php";
      $h = isset($_GET['h'])?$_GET['h']:'';
      if ($h) 
        {
          include "view/page/".$h.".php" ;
        }
      else
        {
        include "home.php" ;
        }
      ?>
      </div>
    </section>
  </div>

  <footer class="main-footer">
   <?php include "view/main/footer.php" ?>
  </footer>

</div>
   <?php include "library/notif.php" ?>
   <?php include "library/deleteModal.php" ?>
</body>
</html>
<?php ob_flush(); ?>
