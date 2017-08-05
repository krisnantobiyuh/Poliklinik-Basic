<div class="modal fade" id="addPasien">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4 class="title">Tambah Pasien</h4>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" type="text" name="pasien" required="">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input class="form-control" type="text" name="alm" required="">
					</div>
					<div class="form-group">
						<label>Tlp</label>
						<input class="form-control" type="number" min="1" name="hp" required="">
					</div>
					<div class="form-group">
						<label>Kelamin</label>
						<select name="jk" placeholder="Pol Pasien" required="" class="form-control">
							<option value="">Select Kelamin</option>
							<option value="L">Laki-Laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Poliklinik</label>
						<select name="poli" placeholder="Pol Dokter" required="" class="form-control">
							<option values="">Select Poliklinik</option>
							<?php 
								$q = $db->view("tpoli");
								while ($h=$q->fetch()) {
									?>
										<option value="<?=$h['id_poli']?>"><?=$h['nama']?></option>
									<?php
								}
							 ?>
						</select>
					</div>
					<div class="form-group">
						<label>Tgl Lahir</label>
						<input class="form-control" type="date" name="um" required="">
					</div>
					<div class="form-group">
						<label>Tarif</label>
						<input class="form-control" type="number" min="1" name="tarif" required="" >
					</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit" name="addPasien">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['addPasien'])){
	extract($POST);
	$idP = "Pas".rand(00000,99999);
	$p = array($idP,$pasien,$alm,$hp,$jk,$um);
	$s = $db->param("INSERT INTO tpasien VALUES(?,?,?,?,?,?,now())",$p);
	
	$idD = "PeNdaf".rand(1120000,112999999);
	$pD = array($idD,$idP,$poli,$tarif);
	$s = $db->param("INSERT INTO tdaftar VALUES(?,?,?,?,now())",$pD);

	$function->direct('?h=pasien');
}
?>


<div class="modal fade" id="addDaftar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4 class="box-title">Pendaftaran</h4>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
						<label>Select Poliklinik</label>
						<select name="poli" placeholder="Pol Dokter" required="" class="form-control">
							<option value="">Select Poliklinik</option>
							<?php 
								$q = $db->view("tpoli");
								while ($h=$q->fetch()) {
									?>
										<option value="<?=$h['id_poli']?>"><?=$h['nama']?></option>
									<?php
								}
							 ?>
						</select>
					</div>
					<div class="form-group">
						<label>Tarif</label>
						<input class="form-control" type="number" min="1" name="tarif" required="">
					</div>
					<div class="form-group">
						<input class="form-control" type="hidden" name="idP1"  id="idP">
					</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit" name="addDaftar">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
if(isset($_POST['addDaftar'])){
	extract($POST);
	$q = $db->view("tdaftar a,tpasien b WHERE a.id_pasien=b.id_pasien AND a.id_pasien='$idP1' AND a.id_poli='$poli' AND a.tgl_up='$date'");
	$h = $q->fetch();
	$p = $h['nama_pasien'];
	if($q->rowCount() == 0)
	{
		$idD = "PeNdaf".rand(1120000,112999999);
	// var_dump($tarif);
		$pD = array($idD,$idP1,$poli,$tarif);
		$s = $db->param("INSERT INTO tdaftar VALUES(?,?,?,?,now())",$pD);
		$function->notif("success","Pendaftaran Pasien <u>$p</u>","Success","#");
	}
	else
	{
		$function->notif("danger","Maaf..!!! "," <u>$p</u> Sudah terdaftar Ditanggal dan Poli yang sama","#");
	}

	}
?>




<div class="modal fade" id="addPeriksa">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4 class="box-title">Keluhan Pasien</h4>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
						<label>Keluhan</label>
						<textarea  class="form-control " name="keluhan"></textarea>
					</div>
					<input class="form-control" type="hidden" name="idP2" required="" id="idP1">
					<div class="form-group">
						<button class="btn btn-success" type="submit" name="addPeriksa">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
if(isset($_POST['addPeriksa'])){
	extract($POST);
	$_SESSION['keluhan']=$keluhan;
	$function->direct("?h=periksaPasien&id=$idP2");

	}
?>


<!-- NOTIFF -->

<div class="modal fade" id="addDetailResep">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4 class="title">Detail Resep Pasien</h4>
			</div>
			<div class="modal-body" id="bodyView">
				
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="addBayar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body" >
			<center>
				<div  style="font-size: 20px">KEMBALI</div>
				<div id="bodyView1"  style="font-size: 50px"></div>
				<div style="font-size: 50px">
					<a href="?h=pembayaran" class="btn btn-warning">SELESAI</a>
				</div>
			</center>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="addNotif">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body" >
			<center>
				<div id="title-notif"  style="font-size: 25px;font-weight: bold"></div>
				<div  id="notif" style="font-size: 20px"></div>
				<div style="font-size: 50px">
					<a id="button-notif"  data-dismiss="modal" class="btn btn-warning"></a>
				</div>
			</center>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addNotif-dok">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body" >
			<center>
				<div id="title-notif-dok"  style="font-size: 25px;font-weight: bold"></div>
				<div  id="notif-dok" style="font-size: 20px"></div>
				<div style="font-size: 50px">
					<a id="button-notif-dok"  onclick="history.back()" class="btn btn-warning" ></a>
				</div>
			</center>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="confirmDel">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body" >
			<center>
				<div style="font-size: 20px" ></div>
				<div style="font-size: 30px">Pastikan Resep Obat Sudah Siap Diambil Pasien</div>
				<div style="font-size: 50px">
					<a data-dismiss="modal" class="btn btn-danger">Batal</a>
					<a class="btn btn-success btn-ok">Ok</a>
				</div>
			</center>
			</div>
		</div>
	</div>
</div>
