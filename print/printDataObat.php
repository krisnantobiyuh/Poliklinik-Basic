<?php 
    include "../library/db.php";
    include "../view/main/head2.php";
	extract($_POST);
?>
<style type="text/css">
	#tb{
		background: ;
	}
	#tb tr{
		padding: 30px;
	}
</style>
<div id="body">
<div id="cc-body">
	<div id="">
		<center>
			<h2>LAPORAN DATA OBAT</h2>
		</center><hr>
	</div>
		<center>
		<table id="tb" class="table table-striped table-bordered">
				<tr>
					<th>No</th>
					<th>Nama Obat</th>
					<th>Satuan</th>
					<th>Jumlah</th>
					<th>Harga</th>
				</tr>
				<?php 
					$n=1;
					$ttS=0;
					$hT=0;

						$q = $db->view("tobat");

					while ($h=$q->fetch()) {
						$sat = explode(",",$h['nama_obat'] );						
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$sat[0] ?></td>
								<td><?=$sat[1] ?></td>
								<td><?=$h['stok'] ?></td>
								<td>Rp.<?=number_format( $h['harga'] )?></td>
							</tr>
						<?php
					}
				 ?>
				</table>
		</center>
	</div>
</div>
</div>
<script type="text/javascript">
	window.print();
</script>

