<?php 
	$id = $function->get('id');
	$q = $db->view("tuser a WHERE id_user = '$id' AND status !=1");
	$h=$q->fetch();
	$hi =base64_decode( $h['password']);
 ?>
<form method="post">
	<table class="table">
		<a href="?h=karyawan" class="close" >&times;</a>
		<tbody>
			<tr>
				<td>
					<input type="text" data-toggle="tooltip" title="Nama " value="<?=$h['nama_user']?>" name="user" placeholder="Nama Dokter" required="" class="form-control">
				</td>
				<td>
					<input data-toggle="tooltip" title="Alamat " type="text" value="<?=$h['alamat_user']?>"  name="alm" placeholder="Alamat Dokter" required="" class="form-control">
				</td>
				<td>
					<select data-toggle="tooltip" title="Status pegawai " name="status" placeholder="Pol Dokter" required="" class="form-control">
						<option>Select Poliklinik</option>
						<?php 
								if ($h['status']=="2") {
								?>
									<option value="2" selected>Pegawai Apotek</option>
									<option value="3" >Pegawai Pendaftaran</option>
									<option value="5">Kasir</option>
									<option value="4" >ADMIN</option>
								<?php
								}elseif ($h['status']=="3") {
								?>
									<option value="2" >Pegawai Apotek</option>
									<option value="3" selected>Pegawai Pendaftaran</option>
									<option value="5">Kasir</option>
									<option value="4" >ADMIN</option>

								<?php
								}elseif ($h['status']=="4") {
								?>
									<option value="2" >Pegawai Apotek</option>
									<option value="3" >Pegawai Pendaftaran</option>
									<option value="5">Kasir</option>
									<option value="4" selected>ADMIN</option>

								<?php
								}elseif ($h['status']=="5") {
								?>
									<option value="2" >Pegawai Apotek</option>
									<option value="3" >Pegawai Pendaftaran</option>
									<option value="5" selected>Kasir</option>
									<option value="4" >ADMIN</option>

								<?php
								}
							
						 ?>
					</select>
				</td>
				<td>
					<input data-toggle="tooltip" title="Telepone " type="number" value="<?=$h['hp_user']?>" name="hp" min="1" placeholder="Tlp Dokter" required="" class="form-control">
				</td>
				<td>
					<input data-toggle="tooltip" title="Password " type="text" value="<?= $hi ?>" title="Password" name="pass" placeholder="Password Dokter" required="" class="form-control"></td>
				<td>
					<button type="submit" class="btn btn-info" name="simpan">Edit</button>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<?php

if(isset($_POST['simpan'])){
	extract($POST);
	$pass1 = base64_encode($pass);
	$p = array($user,$alm,$hp,$pass1,$status);
	$s = $db->param("UPDATE tuser SET nama_user=?,alamat_user=?,hp_user=?,password=?,status=? WHERE id_user='$id'",$p);
	$function->direct('?h=karyawan&notif=suc');
}