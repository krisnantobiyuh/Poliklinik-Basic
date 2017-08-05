<form method="post">
	<table class="table">
		<a href="?h=obat" class="close" >&times;</a>
		<tbody>
			<tr>
				<td><input type="text" name="nobat" placeholder="Nama obat" required="" class="form-control"></td>
				<td><input type="number" min="1" name="hrg" placeholder="Harga obat" required="" class="form-control"></td>
				<td>
					<select name="jn" placeholder="Pol obat" required="" class="form-control">
						<option value="">Jenis Obat</option>
						<option value="bb">Obat Bebas</option>
						<option value="tb">Obat Terbatas</option>
						<option value="kr">Obat Keras</option>
					</select>
				</td>
				<td>
					<select name="sat" placeholder="Pol obat" required="" class="form-control">
						<option value="">Satuan Obat</option>
						<option value="STRP">Strip</option>
						<option value="BTL">Botol</option>
						<option value="SRBK">Serbuk</option>
						<option value="KPSL">Kapsul</option>
						<option value="SRUP">Sirup</option>
					</select>
				</td>
				<td><input type="number" min="1" name="stk" placeholder="Stok obat" required="" class="form-control"></td>
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
	$id = "Obt".rand(11000,99999);
	$name = $nobat.","."(".$sat.")";
	$p = array($id,$name,$jn,$hrg,$stk);
	$s = $db->param("INSERT INTO tobat VALUES(?,?,?,?,?)",$p);
	$function->direct('?h=obat&notif=suc');
}