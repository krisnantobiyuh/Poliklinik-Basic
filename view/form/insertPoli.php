<form method="post">
	<table class="table">
		<a href="?h=poliklinik" class="close" >&times;</a>
		<tbody>
			<tr>
				<td>
					<input data-toggle="tooltip"  type="text" name="nPoli" title="Nama poliklinik" placeholder="Nama poliklinik" required="" class="form-control" style="text-transform: uppercase;">
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
	$nPoliReplace = str_replace("poli ","", $nPoli);
	$nPoli1 = strtoupper($nPoliReplace);
	$f = $db->view("tpoli WHERE nama='$nPoli1'");
	if ( $f->rowCount() == 0) {
		// $function->modalNotif("Oops..","Poli $nPoli1 Sudah ada","try Again");
		$id = "Pol".rand(00,999);
		$p = array($id,$nPoli1);
		$s = $db->param("INSERT INTO tpoli VALUES(?,?)",$p);
		$function->direct('?h=poliklinik&notif=suc');
	}else{
		$function->Notif("danger","Poli $nPoli1 Sudah ada","try Again");
	}
}