<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Laporan Data Pasien</div><hr>
	</div>
	<div class="box-body">
	<form method="post" action="print/printPasien.php">
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
			<a href="print/printPasien.php?print=all" class="btn btn-success "> <i class="fa fa-print"></i> Print All</a>
		</div>
	<div class="col-md-12">
		<center>
			<!-- <h2>LAPORAN DATA PASIEN</h2> -->
		</center><hr>
	</div>

		<table class="table table-bordered table-striped" id="pasien">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Telepone</th>
					<th>Jk</th>
					<th>Tgl Masuk</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
						$q = $db->view("tpasien");
					while ($h=$q->fetch()) {
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h['nama_pasien'] ?></td>
								<td><?=$h['alamat_pasien'] ?></td>
								<td><?=$h['hp_pasien'] ?></td>
								<td><?=$h['jk'] ?></td>
								<td><?=date("Y M d",strtotime($h['tgl_up']))?></td>
								
							</tr>
						<?php
					}
				 ?>
			</tbody>
		</table>
	</div>
</div>
</div>