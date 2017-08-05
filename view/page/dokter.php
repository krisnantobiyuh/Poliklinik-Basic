<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Data Dokter</div><hr>
		<a href="?h=dokter&p=insertDokter" class="btn btn-success"><i class="fa fa-plus"></i>Tambah</a>
	</div>
	<div class="box-body">
		<?php 	
			if (isset($_GET['notif']) == "suc") {
				$function->notif("success","Success ..!!!","Perubahan / Penambahan / Delete data berhasil....");
			}
      $p = $function->get('p');
			if ($p) {
				include "view/form/".$p.".php";
			}
		 ?>
		<table class="table table-bordered table-striped" id="poli">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Spesialis</th>
					<th>Tarif</th>
					<th>Poliklinik</th>
					<th>Tlp</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
					$q = $db->view("tuser a,tpoli b WHERE a.id_poli=b.id_poli AND status=1  ORDER BY id_user DESC");
					while ($h=$q->fetch()) {
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h['nama_user'] ?></td>
								<td><?=$h['alamat_user'] ?></td>
								<td><?=$h['spesialis'] ?></td>
								<td><?=number_format( $h['tarif'] )?></td>
								<td><?=$h['nama'] ?></td>
								<td><?=$h['hp_user'] ?></td>
								<td>
									<a href="?h=dokter&p=editDokter&id=<?=$h['id_user']?>" class="btn btn-info">Edit</a>
									<a data-href="?h=dokter&ac=del&id=<?=$h['id_user']?>" data-toggle="modal" data-target="#confirmDelAd" class="btn btn-danger">Hapus</a>
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
	$("#poli").DataTable();
});
</script>

<?php
	$ac = $function->get('ac');
	if ($ac == 'del') {
	$id = $function->get('id');
		$db->delete("tuser","id_user = '$id'");
	$function->direct('?h=dokter&notif=suc');
	}
