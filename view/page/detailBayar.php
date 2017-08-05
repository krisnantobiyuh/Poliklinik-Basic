<?php 
$n=1;
$tot=0;
$totH=0;
	$id = $function->get("id");
	// $ac = $function->get("byr");
	// $no = $function->get("no");
	$pas1 = $function->post("pas");
	$pol1 = $function->post("pol");
	$ppl = $function->get("pl");

	$q1 = $db->view("tdetail_resep a,tresep c, tobat b WHERE a.id_resep=c.id_resep AND a.id_obat=b.id_obat AND a.id_resep='$id'");

	$q3 = $db->view("tresep c, tdaftar b WHERE b.id_daftar=b.id_daftar AND c.id_resep='$id'");
$h3 = $q3->fetch();
$daf = $h3['id_daftar'];
$q13 = $db->view("tdaftar c, tpasien b,tpoli a WHERE c.id_pasien=b.id_pasien AND c.id_poli=a.id_poli AND c.id_daftar='$daf'");
$h13 = $q13->fetch();
$pp = $db->view("tpoli WHERE id_poli='$ppl'");
$pp1 = $pp->fetch();

	if (isset($_POST['btnBayar'])) {
		extract($POST);
			$q7 = $db->view("tbayar a WHERE a.id_resep='$idResep' AND a.id_daftar='$idDaftar'");
			if ($q7->rowCount() == 0) {
				
			if ($bayar != 0 && $bayar >= $total) {	
						$hasil = "Rp.". number_format($bayar - $total);
						
						$idByr = "Byr".rand(000000,999999);
						$p = array($idByr,$idDaftar,$idResep,$idDokter,$total);
						$s = $db->param("INSERT INTO tbayar VALUES(?,?,?,?,?,now())",$p);
					
						$pp = array($idResep);
						$db->param(" UPDATE tresep SET status_resep='3' WHERE id_resep = ?",$pp);

						foreach ($jumUp as $idOb => $val) {
							$q4 = $db->view("tobat b WHERE b.id_obat='$idOb'");
							$h4 = $q4->fetch();
							$jumOb = $h4['stok'] - $val;

							$p4 = array($jumOb,$idOb);
							$db->param(" UPDATE tobat SET stok=? WHERE id_obat = ?",$p4);

						 } 
						 
						include "../struk/receipt.php"; 

						$function->modal($hasil,"#addBayar","#bodyView1");
					}
					else
					{
						$function->modalNotif("Ups.!!!"," Nominal Tidak Sesuai","Try again");
					}

			}else{
				$function->modalNotif("Ups.!!!","Pasien Sudah Membayar","Ok");
			}


		

		}

?>

<div class="col-md-12">
<form method="post">
	<div class="col-md-6">
	<div class="box">
		<div class="box-header">
			<span class="box-title">Detail Penebusan Resep Pasien <b><?=$h13['nama_pasien']?></b></span><br>
			<span>Poli :<b><?=$pp1['nama']?></b> </span>
			<hr>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-striped" id="pasien">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Obat</th>
						<th>Jumlah</th>
						<th>Aturan Pakai</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while ($h1=$q1->fetch()) {
							$hr = $h1['harga'];
							$dftr = $h1['id_daftar'];
							$idDok = $h1['id_user'];
							$idObt = $h1['id_obat'];
							$jumlah = $h1['jumlah'];
							// var_dump($idDok);
							$totH += $jumlah*$hr;
							?>
								<tr>
				 				<input type="hidden" name="jumUp[<?=$idObt?>]" value="<?=$jumlah?> ">
									<td><?= $n++?></td>
									<td><?= $h1['nama_obat']?></td>
									<td><?= $h1['jumlah']?></td>
									<td><?= $h1['aturan']?></td>
								</tr>
							<?php	
						}
					 ?>	
				</tbody>
			</table>
		
		</div>
	</div>

	</div>

	<div class="col-md-6">
		<div class="box">
			<div class="box-header">
				<span class="box-title">Total Bayar</span><hr>
			</div>
		<div class="box-body">
			<div class="form-group">
				<b>TOTAL : Rp.<?= number_format($totH) ?></b>
			</div>

						<input type="hidden" name="idRes" value="<?=$id?>">
						<input type="hidden" name="namaKasir" value="<?=$namaLog?>">

						<input type="hidden" name="total" value="<?=$totH?>">
						<input type="hidden" name="idDaftar" value="<?=$dftr?>">
						<input type="hidden" name="idResep" value="<?=$id?>">
						<input type="hidden" name="idDokter" value="<?=$idDok?>">
			<div class="form-group">
				<input type="number" name="bayar" placeholder="Bayar" id="byr" class="form-control">
			</div>
			<div class="form-group">
				<button type="submit" name="btnBayar" class="btn btn-success btn-flat col-md-12">Bayar</button>
			</div>
		</div>
		</div>
	</div>




</form>
</div>


