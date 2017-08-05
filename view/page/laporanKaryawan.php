<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Laporan Data Karyawan</div><hr>
	</div>
	<div class="box-body">
	<form method="post" action="print/printKaryawan.php">
		<div class="form-group col-md-8">
		<select name="status" placeholder="Pol Karyawan" required="" class="form-control">
			<option value="">Select Jabatan</option>
			<option value="2">Pegawai Apotek</option>
			<option value="3">Pegawai Pendaftaran</option>
			<option value="5">Kasir</option>
			<option value="4">ADMIN</option>
		</select>
		</div>
		<div class="form-group col-md-2">
			<button class="btn btn-info "> <i class="fa fa-print"></i> Print</button>
		</div>
	</form>
		<div class="form-group col-md-2">
			<a href="print/printKaryawan.php?print=all" class="btn btn-success "> <i class="fa fa-print"></i> Print All</a>
		</div>
	<div class="col-md-12">
		<center>
			<!-- <h2>LAPORAN DATA KARYAWAN</h2> -->
		</center><hr>
	</div>

		<table class="table table-bordered table-striped" id="pasien">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Tlp</th>
					<th>Jabatan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$n=1;
					$q = $db->view("tuser WHERE status=2 OR status=3 OR status=4 OR status=5 ");
					while ($h=$q->fetch()) {
						
						if ($h['status']=="2") {
							$status = "Pegawai Apotek";
						}
						elseif ($h['status']=="3") {
							$status = "Pegawai Pendaftaran";
						}
						elseif ($h['status']=="4") {
							$status = "ADMIN";
						}
						elseif ($h['status']=="5") {
							$status = "Kasir";
						}

						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h['nama_user'] ?></td>
								<td><?=$h['alamat_user'] ?></td>
								<td><?=$h['hp_user'] ?></td>
								<td><?=$status ?></td>
							</tr>
						<?php
					}
				 ?>
			</tbody>
		</table>
	</div>
</div>
</div>