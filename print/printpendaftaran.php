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
			<h2>LAPORAN DAFTAR PENDAFTARAN </h2>
			<?php 
				if (empty($_GET['print'])) {
					$start1 = date("Y-M-d",strtotime($start));
					$last1 = date("Y-M-d",strtotime($last));
					if (empty($poli) && !empty($start) && !empty($last)) {
					echo '<span>Daftar Pendaftaran Pasien <b>'.$start1.'</b>  Sampai  <b>'.$last1.'</b></span>';
					}
					elseif (!empty($poli) && empty($start) && empty($last)) {
						$d = $db->view("tpoli WHERE id_poli='$poli'");
						$p = $d->fetch();
						echo '<span>Daftar Pendaftaran Pasien Poli <b>'.$p['nama'].'</b>';
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
					<th>Telepone</th>
					<th>Jk</th>
					<th>Poliklinik</th>
					<th>Tgl Masuk</th>
				</tr>
				<?php 
					$n=1;
					$ttS=0;
					$hT=0;
					if (isset($_GET['print'])) 
					{
						$q = $db->view("tdaftar a, tpasien b, tpoli c WHERE a.id_pasien=b.id_pasien AND a.id_poli=c.id_poli","a.tgl_up,b.nama_pasien,b.alamat_pasien,b.hp_pasien,b.jk,c.nama");
					}
					else if(empty($poli) && !empty($start) && !empty($last))
					{
						$q = $db->view("tdaftar a, tpasien b, tpoli c WHERE a.id_pasien=b.id_pasien AND a.id_poli=c.id_poli AND a.tgl_up >= '$start' AND a.tgl_up <='$last'");
					}
					elseif (!empty($poli) && empty($start) && empty($last)) {
						$q = $db->view("tdaftar a, tpasien b, tpoli c WHERE a.id_pasien=b.id_pasien AND a.id_poli=c.id_poli AND a.id_poli='$poli'");
					}
					elseif (!empty($poli) && !empty($start) && !empty($last)) {
						$q = $db->view("tdaftar a, tpasien b, tpoli c WHERE a.id_pasien=b.id_pasien AND a.id_poli=c.id_poli AND a.id_poli='$poli' AND a.tgl_up >= '$start' AND a.tgl_up <='$last'");
					}else{
						$q1 = "<center><h2>Data Tidak di temukan</h2></center>";
					}

					if (!isset($q1)) {
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
					}

					if (isset($q1)) {
						echo $q1;
					}elseif ($q->rowCount() == 0) {
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

