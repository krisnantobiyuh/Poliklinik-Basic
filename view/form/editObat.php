<?php 
	$id = $function->get('id');
	$q = $db->view("tobat WHERE id_obat = '$id'");
	$h=$q->fetch();
	$sat = explode(",",$h['nama_obat'] );
 ?>
<form method="post">
	<table class="table">
		<a href="?h=obat" class="close" >&times;</a>
		<tbody>
			<tr>
				<td><input type="text" value="<?=$sat[0]?>"  name="nobat" data-toggle="tooltip" title="Nama obat" required="" class="form-control"></td>
				<td><input type="number" min="1" value="<?=$h['harga']?>" name="hrg" data-toggle="tooltip" title="Harga obat" required="" class="form-control"></td>
				<td>
					<select name="jn" data-toggle="tooltip" title="Jenis obat" required="" class="form-control">
						<option value="">Jenis Obat</option>
						<?php 
							if ($h['jenis']=="bb") {
							?>
								<option value="bb" selected>Obat Bebas</option>
								<option value="tb">Obat Terbatas</option>
								<option value="kr">Obat Keras</option>
							<?php
							}elseif ($h['jenis']=="tb") {
							?>
								<option value="bb" >Obat Bebas</option>
								<option value="tb" selected>Obat Terbatas</option>
								<option value="kr">Obat Keras</option>
							<?php
							}elseif ($h['jenis']=="kr") {
							?>
								<option value="bb" >Obat Bebas</option>
								<option value="tb">Obat Terbatas</option>
								<option value="kr" selected>Obat Keras</option>
							<?php
							}
							
						 ?>
					</select>
				</td>
				<td>
					<select name="sat" data-toggle="tooltip" title="Satuan obat" required="" class="form-control">
						<option value="">Satuan Obat</option>
						<?php 
							include 'view/form/satuanObat.php';
						 ?>
					</select>
				</td>
				<td><input type="number" min="1" value="<?=$h['stok']?>" name="stk" data-toggle="tooltip" title="Stok obat" required="" class="form-control"></td>
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
	$name = $nobat.","."(".$sat.")";

	$p = array($name,$jn,$hrg,$stk);
	$s = $db->param("UPDATE tobat SET nama_obat=?,jenis=?,harga=?,stok=? WHERE id_obat='$id'",$p);
	$function->direct('?h=obat&notif=suc');
}