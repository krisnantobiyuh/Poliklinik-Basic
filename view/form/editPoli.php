<?php 
	$id = $function->get('id');
	$q = $db->view("tpoli WHERE id_poli = '$id'");
	$h=$q->fetch();
 ?>
<form method="post">
	<table class="table">
		<a href="?h=poliklinik" class="close" >&times;</a>
		<tbody>
			<tr>
				<td>
					<input data-toggle="tooltip" title="Nama " type="text" value="<?=$h['nama'] ?>" name="nPoli" placeholder="Nama poliklinik" required="" class="form-control" style="text-transform: uppercase;">
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
	$nPoliReplace = str_replace("poli ","", $nPoli);
	$nPoli1 = strtoupper($nPoliReplace);
	$f = $db->view("tpoli WHERE nama='$nPoli1'");
	if ( $f->rowCount() == 0) {
		$p = array($nPoli);
		$s = $db->param("UPDATE tpoli SET nama=? WHERE id_poli='$id'",$p);
		$function->direct('?h=poliklinik&notif=suc');
	}else{
		$function->Notif("danger","Poli $nPoli1 Sudah ada","try Again");
	}
}