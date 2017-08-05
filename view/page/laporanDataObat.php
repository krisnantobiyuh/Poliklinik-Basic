<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Laporan Data Obat</div><hr>
	</div>
	<div class="box-body">
	<form method="post" action="print/printDataObat.php">
		
		<div class="form-group col-md-12">
			<button class="btn btn-success col-md-2 pull-right"><i class="fa fa-print"></i> Print All</button>
		</div>
	</form>

	<div class="">
		<center>
			<!-- <h2>LAPORAN DATA OBAT</h2> -->
		</center><hr>
	</div>

		<table class="table table-bordered table-striped" id="pasien">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Obat</th>
					<th>Satuan</th>
					<th>Jumlah</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
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
			</tbody>
		</table>
	</div>
</div>
</div>