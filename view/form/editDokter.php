<?php 
	$id = $function->get('id');
	$q = $db->view("tuser a,tpoli b WHERE id_user = '$id' AND status=1 AND a.id_poli=b.id_poli");
	$h=$q->fetch();
 ?>
<form method="post">
	<table class="table">
		<a href="?h=dokter" class="close" >&times;</a>
		<tbody>
			<tr>
				<td>
					<input data-toggle="tooltip" title="Nama " type="text" value="<?=$h['nama_user']?>" name="user" placeholder="Nama Dokter" required="" class="form-control">
				</td>
				<td>
					<input data-toggle="tooltip" title="Alamat " type="text" value="<?=$h['alamat_user']?>"  name="alm" placeholder="Alamat Dokter" required="" class="form-control">
				</td>
				<td>
					<input data-toggle="tooltip" title="Spesialis " type="text" value="<?=$h['spesialis']?>" name="spe" placeholder="Dokter Spesialis " required="" class="form-control">
				</td>
				<td>
					<input data-toggle="tooltip" title="Tarif " type="number" value="<?=$h['tarif']?>" name="tar" placeholder="tarif Dokter" required="" class="form-control">
				</td>
				<td>
					<select name="poli" placeholder="Pol Dokter" required="" class="form-control" data-toggle="tooltip" title="Poliklinik">
						<option>Select Poliklinik</option>
						<?php 
							$q1 = $db->view("tpoli");
							while ($h1=$q1->fetch()) {
								if ($h['id_poli']==$h1['id_poli']) {
								?>
									<option value="<?=$h['id_poli']?>" selected><?=$h['nama']?></option>
								<?php
								}else{
								?>
									<option value="<?=$h1['id_poli']?>" ><?=$h1['nama']?></option>
								<?php
								}
							}
						 ?>
					</select>
				</td>
				<td>
					<input data-toggle="tooltip" title="Telepone" type="number" value="<?=$h['hp_user']?>" name="hp" placeholder="Tlp Dokter" required="" class="form-control">
				</td>
				<td>
					<input data-toggle="tooltip" title="Password" type="text" value="<?= base64_decode( $h['password'])?>" name="pass" title="Password" placeholder="Password Dokter" required="" class="form-control">
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
	$pass1 = base64_encode($pass);	

	// $f = $db->view("tuser WHERE password='$pass1'");
	// $f1 = $db->view("tuser WHERE id_poli='$poli'");
	// if ( $f1->rowCount() == 1 && $f->rowCount() == 0) {
	// 	$p = array($user,$alm,$spe,$tar,$poli,$hp,$pass1);
	// 	$s = $db->param("UPDATE tuser SET nama_user=?,alamat_user=?,spesialis=?,tarif=?,id_poli=?,hp_user=?,password=? WHERE id_user='$id'",$p);
	// 	$function->direct('?h=dokter&notif=suc');
	// }
	// elseif ( $f1->rowCount() == 0 && $f->rowCount() == 1) {
	// 	$p = array($user,$alm,$spe,$tar,$poli,$hp,$pass1);
	// 	$s = $db->param("UPDATE tuser SET nama_user=?,alamat_user=?,spesialis=?,tarif=?,id_poli=?,hp_user=?,password=? WHERE id_user='$id'",$p);
	// 	$function->direct('?h=dokter&notif=suc');
	// }
	// elseif ( $f1->rowCount() == 0 && $f->rowCount() == 0) {
		$p = array($user,$alm,$spe,$tar,$poli,$hp,$pass1);
		$s = $db->param("UPDATE tuser SET nama_user=?,alamat_user=?,spesialis=?,tarif=?,id_poli=?,hp_user=?,password=? WHERE id_user='$id'",$p);
		$function->direct('?h=dokter&notif=suc');
	// }
	// elseif ( $f1->rowCount() == 1 && $f->rowCount() == 1) {
	// 	$function->modalNotif("Oops..","Perubahan data gagal, mungkin Password / poli yang sama","try Again");
	// }else{
	// 	$function->modalNotif("Oops..","Perubahan data gagal, mungkin Password / poli yang sama","try Again");
	// }
}