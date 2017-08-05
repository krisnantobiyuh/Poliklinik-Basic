<?php 
$id = $function->get("id");
$notif = $function->get("notif");
$q1 = $db->view("tdetail_resep a, tobat b WHERE a.id_obat=b.id_obat AND a.id_resep='$id'");

if (isset($_POST['btnUbhResepApotek'])) {
	extract($POST);
	foreach ($jum as $key => $value) {

		$q2 = $db->view("tdetail_resep a, tobat b WHERE a.id_obat=b.id_obat AND a.id_det_resep='$key'","b.nama_obat,b.stok");
		$h2=$q2->fetch();
		$nobat = $h2['nama_obat']; 

		if ($jum[$key] > $stok[$key]) 
		{
			// $function->notif("danger","Danger..!!.","Pastikan jumlah obat kurang dari stok yang tersedia");
			// $function->direct("?h=ubahresepapotek&id=$id&notif=er");
			$function->direct("?h=ubahresepapotek&id=$id&notif=error");
		}

		if ($jum[$key] <= $stok[$key]) 
		{
			$par = array($value,$key);
			$db->param("UPDATE tdetail_resep SET jumlah=? WHERE id_det_resep=? ",$par);
			// $function->notif("success","Success..!!.","Ubah jumlah <b>$nobat</b>.  Click Refresh untuk lihat perubahan");
			$function->direct("?h=ubahresepapotek&id=$id&notif=success");
  			// header("Location:?h=ubahresepapotek&id=$id ");
		}
	}
}

?>
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<a href="?h=reseppasien" class="close"> <i class="fa fa-remove"></i></a>

			<h5><b>Data Resep Pasien</b></h5><hr>
		</div>
		<div class="box-body">
			<?php 
				switch ($notif) {
					case 'success':
						$function->notif("success","Success..!!.","Jumlah obat berasil diubah.");
						break;
					
					case 'error':
							$function->notif("danger","Danger..!!.","Pastikan jumlah obat kurang dari stok yang tersedia");
						break;
					default:
						echo "<div class='alert alert-warning'><span><strong>Warning.</strong>Pastikan jumlah obat kurang dari stok yang tersedia</span></div>";
					break;
				}
			 ?>
			<form method="post" action="?h=ubahresepapotek&id=<?=$id?>">
				<button type="submit" class="btn btn-info btn-flat" name="btnUbhResepApotek"> Ubah</button>

				<a href="?h=reseppasien" class="btn btn-success btn-flat"> Selesai</a><hr>
				<table class="table table-bordered table-striped" id="pasien">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Obat</th>
							<th>Jumlah</th>
							<th>Stok Tersedia</th>
							<th>Aturan Pakai</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							while ($h=$q1->fetch()) {
								$jum = $h['jumlah'];
								$idDet = $h['id_det_resep'];
								$idObt = $h['id_obat'];
								?>
								<tr>
									<td><?= $n++?></td>
									<td><?=$h['nama_obat'] ?></td>
									<td>
										<input data-toggle="tooltip" type="number"  title="Stok tersisa <?=$h['stok']?>" name="jum[<?=$idDet?>]" class="form-control" value="<?=$jum?>">
									</td>
									<td>
										<input readonly="" type="text" name="stok[<?=$idDet?>]" class="form-control" value="<?=$h['stok']?>">
									</td>
									<td>									
										<input type="text" readonly="" name="aturan[<?=$idDet?>]" class="form-control" value="<?=$h['aturan']?>">
									</td>
								</tr>

								<?php
						}
						?>
						
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>



