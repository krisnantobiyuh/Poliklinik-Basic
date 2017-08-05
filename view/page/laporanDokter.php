<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Laporan Data Dokter</div><hr>
	</div>
	<div class="box-body">
	<form method="post" action="print/printDokter.php">
		<div class="form-group col-md-8">
		<?php 
			$db->select("poli","tpoli","id_poli","nama","Select Poliklinik");
		 ?>
		</div>
		<div class="form-group col-md-2">
			<button class="btn btn-info "> <i class="fa fa-print"></i> Print</button>
		</div>
	</form>
		<div class="form-group col-md-2">
			<a href="print/printDokter.php?print=all" class="btn btn-success "> <i class="fa fa-print"></i> Print All</a>
		</div>
	<div class="col-md-12">
		<center>
			<!-- <h2>LAPORAN DATA DOKTER</h2> -->
		</center><hr>
	</div>

		<table class="table table-bordered table-striped" id="pasien">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Spesialis</th>
					<th>Tarif</th>
					<th>Poliklinik</th>
					<th>Tlp</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
					$q = $db->view("tuser a,tpoli b WHERE a.id_poli=b.id_poli AND status=1");
					while ($h=$q->fetch()) {
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h['nama_user'] ?></td>
								<td><?=$h['alamat_user'] ?></td>
								<td><?=$h['spesialis'] ?></td>
								<td><?= number_format($h['tarif']) ?></td>
								<td><?=$h['nama'] ?></td>
								<td><?=$h['hp_user'] ?></td>
							</tr>
						<?php
					}
				 ?>
			</tbody>
		</table>
	</div>
</div>
</div>