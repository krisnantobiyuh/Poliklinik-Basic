<?php
  $q = $db->view("tpoli WHERE id_poli='$poliLog'");
  $h=$q->fetch();
  if ($levelLog=="1") {
    $title ="
    <span class='logo-lg'><b>POLI </b>".$h['nama']."</span>";
    $skins ="skin-yellow";
  }
  else if ($levelLog=="2")
  {
    $title = "
    <span class='logo-lg'><b>APOTEK</b></span>";
    $skins ="skin-blue";
  }
  else if ($levelLog=="3")
  {
    $title = "
    <span class='logo-lg'><b>PENDAFTARAN</b></span>";
    $skins ="skin-green";
  }
  else if ($levelLog=="4")
  {
    $title = "
    <span class='logo-mini'><b>AD</b>Poli</span>
    <span class='logo-lg'><b>ADMIN</b>PoliKlinik</span>";
    $skins ="skin-blue";
  }
  else if ($levelLog=="5")
  {
    $title = "
    <span class='logo-lg'><b>KASIR</b></span>";
    $skins ="skin-red";
  }
  else{
    $title="
    <span class='logo-lg'><b>POLI</b>Klinik</span>";
    $skins ="skin-blue";
  }
