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
			<h2>LAPORAN DAFTAR PASIEN </h2>
			<?php 
				if (empty($_GET['print'])) {
					$start1 = date("Y-M-d",strtotime($start));
					$last1 = date("Y-M-d",strtotime($last));
					echo '<span>Daftar Pasien <b>'.$start1.'</b>  Sampai  <b>'.$last1.'</b> POLIKLINIK</span>';
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
					<th>Telepone</th>
					<th>Jk</th>
					<th>Tgl Masuk</th>
				</tr>
				<?php 
					$n=1;
					$ttS=0;
					$hT=0;
					if (isset($_GET['print'])) 
					{
						$q = $db->view("tpasien");
					}
					else
					{
						$q = $db->view("tpasien c WHERE  c.tgl_up >='$start' AND c.tgl_up <= '$last' ");
					}

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
					
				if ($q->rowCount() <= 0) {
					echo "<center><h2>Data Tidak di temukan</h2></center>";
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

