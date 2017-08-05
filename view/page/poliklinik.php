<div class="col-md-6">
<div class="box">
	<div class="box-header">
		<div class="box-title">Data Poliklinik</div><hr>
		<a href="?h=poliklinik&p=insertPoli" class="btn btn-success"><i class="fa fa-plus"></i>Tambah</a>
	</div>
	<div class="box-body">
		<?php 	
		if (isset($_GET['notif']) == "suc") {
			$function->notif("success","Success ..!!!","Perubahan / Penambahan data berhasil....");
		}
      $p = $function->get('p');
			if ($p) {
				include "view/form/".$p.".php";
			}
		 ?>
		<table class="table table-bordered table-striped" id="pasien">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
					$q = $db->view("tpoli");
					while ($h=$q->fetch()) {
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h['nama'] ?></td>
								<td>
									<a href="?h=poliklinik&p=editPoli&id=<?=$h['id_poli']?>" class="btn btn-info">Edit</a>
									<a data-href="?h=poliklinik&ac=del&id=<?=$h['id_poli']?>" data-toggle="modal" data-target="#confirmDelAd" class="btn btn-danger">Hapus</a>
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

<div class="col-md-6">
<img src="logo/poli1.png" style="width: 40%; bottom: 1%;right:0;position: fixed;">
</div>

<?php
	$ac = $function->get('ac');
	if ($ac == 'del') {
	$id = $function->get('id');
		$db->delete("tpoli","id_poli = '$id'");
	$function->direct('?h=poliklinik');
	}
