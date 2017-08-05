<form method="post">
	<table class="table">
		<a href="?h=Pasien" class="close" ><i class="fa fa-window-close text-red" ></i></a>
		<tbody>
			<tr>
				<td><input type="text" name="pasien" placeholder="Nama Pasien" required="" class="form-control"></td>
				<td><input type="text" name="alm" placeholder="Alamat Pasien" required="" class="form-control"></td>
				<td><input type="number" min="1" name="hp" placeholder="Tlp Pasien" required="" class="form-control"></td>
				<td><input type="date" name="um" data-toggle="tooltip" title="Umur Pasien" required="" class="form-control"></td>
				<td>
					<select name="jk" placeholder="Pol Pasien" required="" class="form-control">
						<option value="">Select Kelamin</option>
						<option value="L">Laki-Laki</option>
						<option value="P">Perempuan</option>
						
					</select>
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
	$id = "Pas".rand(120000,12999999);
	$p = array($id,$pasien,$alm,$hp,$jk,$um);
	$s = $db->param("INSERT INTO tpasien VALUES(?,?,?,?,?,?,now())",$p);
	$function->direct('?h=pasien&notif=suc');
}