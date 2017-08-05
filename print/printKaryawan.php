<?php 
    include "../library/db.php";
    include "../view/main/head2.php";
	extract($_POST);
?>

<div id="body">
<div id="cc-body">
	<div id="">
		<center>
			<h2>LAPORAN TRANSAKSI OBAT</h2>
			<?php 
				if (empty($_GET['print'])) {
					switch ($status) {
						case '5':
							echo '<span> Kasir POLIKLINIK</span>' ;
							break;
						case '2':
							echo '<span> Pegawai Apotek POLIKLINIK</span>' ;
							break;
						case '3':
							echo '<span> Pegawai Pendaftaran POLIKLINIK</span>' ;
							break;
						case '4':
							echo '<span> ADMIN POLIKLINIK</span>' ;
							break;
					}
				}

			 ?>

		</center><hr>
	</div>
		<center>
		<table id="tb" class="table table-striped table-bordered">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Tlp</th>
					<th>Jabatan</th>
				</tr>
				<?php 
					$n=1;
					$ttS=0;
					$hT=0;
					if (isset($_GET['print'])) 
					{
						$q = $db->view("tuser WHERE status=2 OR status=3 OR status=4 OR status=5 ");
					}
					else
					{
						$q = $db->view("tuser WHERE status = '$status'");
					}

					while ($h=$q->fetch()) {
						switch ($h['status']) {
							case '2':
							$status1 = "Pegawai Apotek";
								break;
							case '3':
							$status1 = "Pegawai Pendaftaran";
								break;
							case '4':
							$status1 = "ADMIN";
								break;
							case '5':
							$status1 = "Kasir";
								break;
							default:
							$status1 = $status;
							break;
						}
						
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h['nama_user'] ?></td>
								<td><?=$h['alamat_user'] ?></td>
								<td><?=$h['hp_user'] ?></td>
								<td><?=$status1 ?></td>
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

