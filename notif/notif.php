<?php
    include "../library/db.php";
    $date = date("Y-m-d");
    $poli = $function->get('po');
    $ac = $function->get('ac');
$q = $db->view("tdaftar a WHERE a.tgl_up='$date' AND id_poli='$poli'");
$count = $q->rowCount();
if ($count != 0) {
echo $count;
}
switch ($ac) {
	case 'apotek':
		$q = $db->view("tresep a WHERE a.tgl_up='$date' OR a.status_resep='1'");
		$count = $q->rowCount();
		if ($count != 0) {
		echo $count;
		}
		break;
	case 'kasir':
		$q = $db->view("tresep a WHERE a.status_resep='2' OR a.tgl_up='$date'");
		$count = $q->rowCount();
		if ($count != 0) {
		echo $count;
		}
		break;
	
}