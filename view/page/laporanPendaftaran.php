<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Laporan Data Pendaftaran</div><hr>
	</div>
	<div class="box-body">
	<form method="post" action="print/printPendaftaran.php">
		<div class="form-group col-md-3">
			<label>Tanggal Awal</label>
			<input type="date" name="start" class="form-control" >
		</div>
		<div class="form-group col-md-3">
			<label>Tanggal Akhir</label>
			<input type="date" name="last" class="form-control" >
		</div>
		<div class="form-group col-md-2">
			<label>Select Poliklinik</label>
		<?php 
			$db->select("poli","tpoli","id_poli","nama","Select Poliklinik");
		 ?>
		</div>
		<div class="form-group col-md-2">
			<label><br></label><br>
			<button class="btn btn-info "> <i class="fa fa-print"></i> Print</button>
		</div>
	</form>
		<div class="form-group col-md-2">
			<a href="print/printPendaftaran.php?print=all" class="btn btn-success "> <i class="fa fa-print"></i> Print All</a>
		</div>
	<div class="col-md-12">
		<center>
			<!-- <h2>LAPORAN DATA PENDAFTARAN</h2> -->
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
					<th>Poliklinik</th>
					<th>Tgl Masuk</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
						$q = $db->view("tdaftar a, tpasien b, tpoli c WHERE a.id_pasien=b.id_pasien AND a.id_poli=c.id_poli","a.tgl_up,b.nama_pasien,b.alamat_pasien,b.hp_pasien,b.jk,c.nama");
					while ($h=$q->fetch()) {
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h['nama_pasien'] ?></td>
								<td><?=$h['alamat_pasien'] ?></td>
								<td><?=$h['hp_pasien'] ?></td>
								<td><?=$h['jk'] ?></td>
								<td><?=$h['nama'] ?></td>
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