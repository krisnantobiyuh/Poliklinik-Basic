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
			<h2>LAPORAN TRANSAKSI OBAT</h2>
			<?php 
				if (empty($_GET['print'])) {
					$start1 = date("Y-M-d",strtotime($start));
					$last1 = date("Y-M-d",strtotime($last));
					echo '<span>Transaksi Obat <b>'.$start1.'</b> Sampai <b>'.$last1.'</b> POLIKLINIK</span>';
				}

			 ?>

		</center><hr>
	</div>
		<center>
		<table id="tb" class="table table-striped table-bordered">
				<tr>
					<th>No</th>
					<th>Nama Obat</th>
					<th>Satuan</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Total</th>
				</tr>
				<?php 
					$n=1;
					$ttS=0;
					$hT=0;
					if (isset($_GET['print'])) 
					{
						$q = $db->view("tdetail_resep a, tobat b,tresep c WHERE a.id_obat=b.id_obat AND a.id_resep=c.id_resep ","a.jumlah,a.harga,b.nama_obat,c.tgl_up");
					}
					else
					{
						$q = $db->view("tdetail_resep a, tobat b,tresep c WHERE a.id_obat=b.id_obat AND a.id_resep=c.id_resep AND c.tgl_up >='$start' AND c.tgl_up <= '$last' ","a.jumlah,a.harga,b.nama_obat,c.tgl_up");
					}

					while ($h=$q->fetch()) {
						$sat = explode(",",$h['nama_obat'] );
						$total =$h['jumlah'] * $h['harga'] ;
						
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$sat[0] ?></td>
								<td><?=$sat[1] ?></td>
								<td><?=$h['jumlah'] ?></td>
								<td>Rp.<?=number_format( $h['harga'] )?></td>
								<td>Rp.<?=number_format($total)?></td>
							</tr>
						<?php
						$hT = $ttS+=$total;
					}
				 ?>
				 <tr>
					<td></td>
					<td></td>
					<td></td>
					<td><b>TOTAL</b></td>
					<td></td>
					<td><b>Rp.<?=number_format($hT) ?></b></td>
				 	
				 </tr>
				</table>
		</center>
	</div>
</div>
</div>
<script type="text/javascript">
	window.print();
</script>

