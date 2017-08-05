<?php 
	$id = $function->get('id');
	$q = $db->view("tdaftar b,tpasien a WHERE b.id_pasien = a.id_pasien AND b.id_daftar='$id'");
	$h=$q->fetch();
	$idPasien = $h['id_pasien'];
	$kel = $function->session('keluhan');
	$na =$h['nama_pasien'];
 ?>
 <div class="col-md-12">
 <div class="col-md-6">
	<div class="box">
		<div class="box-header"></div>
		<div class="box-body">
			<h5>Pasien : <b><?=$na?></b></h5>
			<h5>Dokter : <b><?=$namaLog?></b></h5>
			<h5>Keluhan : </h5>
			<textarea  class="form-control " readonly> <?= $kel  ?></textarea>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box">
		<div class="box-header">
			<h5><b>Tambah Obat Untuk Pasien</b></h5><hr>
		</div>
		<div class="box-body">
			<form method="post" action="?h=periksaPasien&id=<?=$id?>&ac=add">
				<div class="form-group col-md-12">
				<?php 
					$db->select("obt","tobat","id_obat","nama_obat");
				?>
			</div>
			<div class="form-group col-md-4">
				<input type="number" min="1" name="jumlah" class="form-control" placeholder="Jumlah Obat" required>
			</div>
			<div class="form-group col-md-5">
				<input type="text" name="aturDok" class="form-control" placeholder="Aturan pakai" required>
			</div>
			<div class="col-md-3">
				<button class="btn btn-info" type="submit">Tambah</button>
			</div>
			</form>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h5><b>Data Resep Pasien</b></h5><hr>
		</div>
		<div class="box-body">
			<form method="post" action="?h=periksaPasien&id=<?=$id?>&ac=up">
				<button type="submit" class="btn btn-info">Ubah</button><hr>
				<table class="table " id="obt12">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Obat</th>
							<th>Jumlah</th>
							<th>Aturan Pakai</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (!empty($_SESSION['obt'])) {
							$n=1;
							foreach ($_SESSION['obt'] as $key => $value) {
								$q = $db->view("tobat WHERE id_obat='$key'");
								$h=$q->fetch();
								$ex = explode("+", $value);
								?>
								<tr>
									<td><?= $n++?></td>
									<td><?=$h['nama_obat'] ?></td>
									<td>
										<input type="number" min="1" title="Stok tersisa <?=$h['stok']?>" name="jum[<?=$key?>]" class="form-control" value="<?=$ex[0]?>">
									</td>
									<td>
										<input type="hidden" name="stok[<?=$key?>]" class="form-control" value="<?=$h['stok']?>">
										<input type="text" name="aturan[<?=$key?>]" class="form-control" value="<?=$ex[1]?>">
									</td>
									<td>
									<a href="?h=periksaPasien&id=<?=$id?>&idO=<?=$h['id_obat'] ?>&ac=delO" class="btn btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa fa-remove"></i></a>
									</td>
								</tr>

								<?php
							}
						}
							
						 ?>
						
					</tbody>
				</table>
			</form>

			<?php
			if (!empty($_SESSION['obt'])) 
			{
				?>
					<form method="post"> 
						<div class="from-group">
							<label>Tarif dokter</label>
							<input type="text"  class="form-control" readonly="" value="Rp.<?=number_format($tarifLog)?>">
							<input type="hidden" name="tarif" class="form-control" readonly="" value="<?=$tarifLog?>">
						</div>
						<hr>
						<div class="from-group">
						<button type="submit" name="simpanPeriksa" class="btn btn-info ">Simpan</button><br>
						<span style="color: red;font-weight: bold">
						)* Pastikan Resep Benar sebelum Click tombol Simpan
						</span>
						</div>
					</form>
				<?php
			}
			?>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">

	$("#obt12").dataTable();
</script>


<?php
if (isset($_POST['simpanPeriksa'])) {
	extract($POST);

	$idRes = "Resp".rand(00000,99999);
	$p12 = array($idRes,$id,$idLog,$poliLog,$tarif,$kel);
	$s = $db->param("INSERT INTO tresep VALUES(?,?,?,?,?,?,'1',now())",$p12);

	foreach ($_SESSION['obt'] as $i => $v) {
		$e = explode("+", $v);
		$jj = $e[0];
		$att = $e[1];

		$q = $db->view("tobat WHERE id_obat='$key'");
		$h=$q->fetch();
		$hargaObt =$h['harga'];

	$idDetRes = "DetResp".rand(0000000,9999999);
	$p13 = array($idDetRes,$idRes,$i,$jj,$hargaObt,$att);
	$s = $db->param("INSERT INTO tdetail_resep VALUES(?,?,?,?,?,?)",$p13);
	}
	unset($_SESSION['keluhan']);
	unset($_SESSION['obt']);
	$function->direct("?h=daftarpasien");
}