<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<span class="box-title">Data Penebusan Resep pasien</span><hr>
	</div>
	<div class="box-body">
		<table class="table table-bordered table-striped" id="pasien">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Tlp</th>
					<th>Poliklinik</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
					$q = $db->view("tresep a WHERE a.status_resep='2' OR a.tgl_up='$date'");
					while ($h=$q->fetch()) {
					$idre = $h['id_daftar'];
					$statusResep = $h['status_resep'];

					$q1 = $db->view("tdaftar a,tpasien b,tpoli c WHERE a.id_pasien=b.id_pasien AND a.id_poli=c.id_poli AND a.id_daftar = '$idre'");
					$h1=$q1->fetch();

						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h1['nama_pasien'] ?></td>
								<td><?=$h1['alamat_pasien'] ?></td>
								<td><?=$h1['hp_pasien'] ?></td>
								<td><?=$h1['nama'] ?></td>
								<td>
									<?php 
										switch ($levelLog) {
											case '5':
											if ($statusResep == "3") {
												?>
												<a class="btn btn-danger disabled">Sudah di bayar</a>
												<?php
											}else{	
												?>
													<a href="?h=detailbayar&id=<?=$h['id_resep']?>&pl=<?=$h['id_poli']?>" class="btn btn-danger">Detail</a>
												<?php
											}
												break;
											case '4':
												?>
													<a href="?h=reseppasien&ac=del&id=<?=$h1['id_daftar']?>" class="btn btn-danger">Hapus</a>
												<?php
												break;
											case '2':
											if ($statusResep == "1") {
												?>
													<a onclick="getData2('<?=$h['id_resep']?>')" data-toggle="modal" class="btn btn-info">Detail</a>
													<a href="?h=reseppasien&ac=upRes&id=<?=$h['id_resep']?>"  class="btn btn-success">Selesai</a>
												<?php
											}else{
												?>
													<a onclick="getData2('<?=$h['id_resep']?>')" data-toggle="modal" class="btn btn-info">Detail</a>
													<a class="btn btn-danger disabled">Obat sudah di ambilkan</a>
												<?php
											}
												break;
										}
									 ?>
								</td>
							</tr>
						<?php
					}
				 ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<script type="text/javascript">
$(function(){
	$("#pasien").dataTable();
});



</script>

<?php
	$ac = $function->get('ac');
	if ($ac == 'del') {
	$id = $function->get('id');
		$db->delete("tresep","id_resep = '$id'");
	$function->direct('?h=reseppasien');
	}

	if ($ac == 'upRes') {
	$id = $function->get('id');
	$pp = array($id);
		$db->param(" UPDATE tresep SET status_resep='2' WHERE id_resep = '$id'",$pp);
	$function->direct('?h=reseppasien');
	}
