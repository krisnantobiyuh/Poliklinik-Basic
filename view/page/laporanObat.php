<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Laporan Data Transaksi Obat</div><hr>
	</div>
	<div class="box-body">
	<form method="post" action="print/printObat.php">
		<div class="form-group col-md-4">
			<label>Tanggal Awal</label>
			<input type="date" name="start" class="form-control" required="">
		</div>
		<div class="form-group col-md-4">
			<label>Tanggal Akhir</label>
			<input type="date" name="last" class="form-control" required="">
		</div>
		<div class="form-group col-md-2">
			<label><br></label><br>
			<button class="btn btn-info "> <i class="fa fa-print"></i> Print</button>
		</div>
	</form>
		<div class="form-group col-md-2">
			<a href="print/printObat.php?print=all" class="btn btn-success "> <i class="fa fa-print"></i> Print All</a>
		</div>
	<div class="col-md-12">
		<center>
			<!-- <h2>LAPORAN TRANSAKSI OBAT</h2> -->
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
					<th>Tgl Transaksi</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
						$q = $db->view("tdetail_resep a, tobat b,tresep c WHERE a.id_obat=b.id_obat AND a.id_resep=c.id_resep ","a.jumlah,a.harga,b.nama_obat,c.tgl_up");
					while ($h=$q->fetch()) {
						$sat = explode(",",$h['nama_obat'] );
						$total =number_format($h['jumlah'] * $h['harga']) ;
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$sat[0] ?></td>
								<td><?=$sat[1] ?></td>
								<td><?=$h['jumlah'] ?></td>
								<td>Rp.<?=number_format( $h['harga'] )?></td>
								<td><?=date("Y-M-d",strtotime($h['tgl_up']))?></td>
								<td>Rp.<?=$total?></td>
								
							</tr>
						<?php
					}
				 ?>
			</tbody>
		</table>
	</div>
</div>
</div>