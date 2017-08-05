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
				$q1 = $db->view("tuser a,tpoli b WHERE a.id_poli=b.id_poli AND status=1 AND b.id_poli='$poli'");
				$h1 = $q1->fetch();
					echo "<span> POLI ".$h1['nama']."</span>" ;
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
					<th>Spesialis</th>
					<th>Tarif</th>
					<th>Poliklinik</th>
					<th>Tlp</th>
				</tr>
				<?php 
					$n=1;
					$ttS=0;
					$hT=0;
					if (isset($_GET['print'])) 
					{
						$q = $db->view("tuser a,tpoli b WHERE a.id_poli=b.id_poli AND status=1");
					}
					else
					{
						$q = $db->view("tuser a,tpoli b WHERE a.id_poli=b.id_poli AND status=1 AND b.id_poli='$poli'");
					}

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
				</table>
		</center>
	</div>
</div>
</div>
<script type="text/javascript">
	window.print();
</script>

