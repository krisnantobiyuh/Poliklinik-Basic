<form method="post">
	<table class="table">
		<a href="?h=dokter" class="close" >&times;</a>
		<tbody>
			<tr>
				<td>
					<input  type="text" data-toggle="tooltip" name="user" placeholder="Nama Dokter" title="Nama Dokter" required="" class="form-control">
				</td>
				<td>
					<input type="text" data-toggle="tooltip" name="alm" placeholder="Alamat Dokter" title="Alamat Dokter" required="" class="form-control">
				</td>
				<td>
					<input type="text" data-toggle="tooltip" name="spe" placeholder="Dokter Spesialis " title="Dokter Spesialis " required="" class="form-control">
				</td>
				<td>
					<input type="number" min="1" data-toggle="tooltip" name="tar" placeholder="tarif Dokter" title="tarif Dokter" required="" class="form-control">
				</td>
				<td>
				<?php 
					$db->select("poli","tpoli","id_poli","nama","Select Poli..");
				?>
					
				</td>
				<td>
					<input type="number" min="1" data-toggle="tooltip" name="hp" placeholder="Tlp Dokter" title="Tlp Dokter" required="" class="form-control">
				</td>
				<td>
					<input type="password" data-toggle="tooltip" name="pass" placeholder="Password Dokter" title="Password Dokter" required="" class="form-control">
				</td>
				<td>
					<button type="submit" class="btn btn-info" name="simpan">Tambah</button>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<?php


if(isset($_POST['simpan'])){
	extract($POST);
	$pass1 = base64_encode($pass);
	$f = $db->view("tuser WHERE password='$pass1'");
	$f1 = $db->view("tuser WHERE id_poli='$poli'");
	if ( $f->rowCount() != 0) {
		$function->modalNotifDok("Oops..","Password Sudah di gunakan","try Again");
	}elseif ($f1->rowCount() != 0) {
		$function->modalNotifDok("Oops..","Poli Yang Sama Sudah Ada Dokter","try Again");
	}else{
		$id = "Dok".rand(1000,9999);
		$p = array($id,$user,$alm,$spe,$tar,$poli,$hp,$pass1);
		$s = $db->param("INSERT INTO tuser VALUES(?,?,?,?,?,?,?,?,'1')",$p);
		$function->direct('?h=dokter&notif=suc');
	}
}