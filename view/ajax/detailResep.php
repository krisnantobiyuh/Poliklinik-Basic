<?php 
include "../../library/db.php";
extract($_POST);

$q1 = $db->view("tdetail_resep a, tobat b WHERE a.id_obat=b.id_obat AND a.id_resep='$idD'");
 ?>
<table class="table table-bordered">
	<tbody>
		<?php 
		$toHrg = 0;
			while ($h1=$q1->fetch()) {
				$hrg = $h1['harga'] * $h1['jumlah'];
				?>
					<tr>
						<td data-toggle="tooltip" title="Nama Dan Satuan"><?= $h1['nama_obat']?></td>
						<td data-toggle="tooltip" title="Jumlah"><?= $h1['jumlah']?></td>
						<td data-toggle="tooltip" title="Aturan Minum"><?= $h1['aturan']?></td>
						<td>Rp.<?= number_format($hrg)?></td>
					</tr>
				<?php	
				$tt = $toHrg+=$hrg;
			}
		 ?>
		 <tr>
		 	<td><b>Total</b></td>
		 	<td></td>
		 	<td></td>
		 	<td><b>Rp.<?=number_format($tt)?></b></td>
		 </tr>
	</tbody>
</table>