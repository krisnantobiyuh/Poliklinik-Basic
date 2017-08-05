<?php 
	$id = $function->get('id');
	$q = $db->view("tpasien a WHERE id_pasien = '$id'");
	$h=$q->fetch();
		$u = $h['umur'];
		$umur = $function->countAge($u);

 ?>
<form method="post">
	<table class="table">
		<a href="?h=dokter" class="close" >&times;</a>
		<tbody>
			<tr>
				<td>
					<input data-toggle="tooltip" title="Nama " type="text" value="<?=$h['nama_pasien']?>" name="pasien" placeholder="Nama Dokter" required="" class="form-control">
				</td>
				<td>
					<input data-toggle="tooltip" title="Alamat " type="text" value="<?=$h['alamat_pasien']?>"  name="alm" placeholder="Alamat Dokter" required="" class="form-control">
				</td>
				
				<td>
					<input data-toggle="tooltip" title="Telepone " type="number" min="1" value="<?=$h['hp_pasien']?>" name="hp" placeholder="Tlp Dokter" required="" class="form-control">
				</td>
				<td>
					<input data-toggle="tooltip" title="Tgl Lahir " type="date" value="<?=$u?>" name="um" placeholder="Tlp Dokter" required="" class="form-control">
				</td>
				<td>
					<select data-toggle="tooltip" title="Jenis Kelamin" name="jk" placeholder="Pol Dokter" required="" class="form-control">
						<option>Select Kelamin</option>
						<?php 
								if ($h['jk']=="L") {
								?>
									<option value="L" selected>Laki-Laki</option>
									<option value="P">Perempuan</option>
								<?php
								}elseif ($h['jk']=="P") {
								?>
									<option value="L">Laki-Laki</option>
									<option value="P" selected>Perempuan</option>
								<?php
								}
							
						 ?>
					</select>
				</td>
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
	$p = array($pasien,$alm,$hp,$um,$jk);
	$s = $db->param("UPDATE tpasien SET nama_pasien=?,alamat_pasien=?,hp_pasien=?,umur=?,jk=? WHERE id_pasien='$id'",$p);
	$function->direct('?h=pasien&notif=suc');
}