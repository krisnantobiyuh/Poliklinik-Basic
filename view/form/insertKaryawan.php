<form method="post">
	<table class="table">
		<a href="?h=karyawan" class="close" >&times;</a>
		<tbody>
			<tr>
				<td>
					<input type="text" data-toggle="tooltip" name="user" title="Nama Karyawan" placeholder="Nama Karyawan" required="" class="form-control">
				</td>
				<td>
					<input type="text" data-toggle="tooltip"  name="alm" title="Alamat Karyawan" placeholder="Alamat Karyawan" required="" class="form-control">
				</td>
				<td>
					<input type="number" min="1" data-toggle="tooltip"  name="hp" title="Tlp Karyawan" placeholder="Tlp Karyawan" required="" class="form-control">
				</td>
				<td>
					<input type="password" data-toggle="tooltip"  name="pass" title="Password Karyawan" placeholder="Password Karyawan" required="" class="form-control">
				</td>
				<td>
					<select name="status" placeholder="Pol Karyawan" required="" class="form-control">
						<option value="">Select Jabatan</option>
						<option value="2">Pegawai Apotek</option>
						<option value="3">Pegawai Pendaftaran</option>
						<option value="5">Kasir</option>
						<option value="4">ADMIN</option>
						
					</select>
				</td>
				<td>
					<button type="submit" class="btn btn-info" name="simpanU">Tambah</button>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<?php

if(isset($_POST['simpanU'])){
	extract($POST);
	$pass1 = base64_encode($pass);

	$f = $db->view("tuser WHERE password='$pass1'");
	$k =  $f->rowCount();
	if ( $f->rowCount() == 0) {
		$idk = "Kary".rand(10000,999999);
		$p1 = array($idk,$user,$alm,$hp,$pass1,$status);
		$s = $db->param("INSERT INTO tuser VALUES(?,?,?,'NULL','0','NULL',?,?,?)",$p1);
		$function->direct('?h=karyawan&notif=suc');
	}else{
		$function->modalNotifDok("Oops..","Password sudah digunakan","try Again");
	}

}