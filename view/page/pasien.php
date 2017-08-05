<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Data pasien</div><hr>
		<?php 
		if (isset($_GET['notif']) == "suc") {
            $function->notif("success","Success ..!!!","Perubahan / Penambahan / Delete data berhasil....");
          }
			if ($levelLog == "4") {
				?>
					<a href="?h=pasien&p=insertpasien" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
				<?php
			}else{
				?>
					<a href="#addPasien" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i> Pasien Baru</a>
				<?php
			}
		 ?>
	</div>
	<div class="box-body">
		<?php 
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
					<th>Alamat</th>
					<th>Tlp</th>
					<th>Kelamin</th>
					<th>Umur</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
					$q = $db->view("tpasien ORDER BY id_pasien DESC");
					while ($h=$q->fetch()) {
					$u = $h['umur'];
					$umur = $function->countAge($u);
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h['nama_pasien'] ?></td>
								<td><?=$h['alamat_pasien'] ?></td>
								<td><?=$h['hp_pasien'] ?></td>
								<td><?=$h['jk'] ?></td>
								<td><?=$umur ?></td>
								<td>
									<?php 
										switch ($levelLog) {
											case '4':
												?>
													<a href="?h=pasien&p=editpasien&id=<?=$h['id_pasien']?>" class="btn btn-info">Edit</a>
													<a data-href="?h=pasien&ac=del&id=<?=$h['id_pasien']?>" data-target="#confirmDelAd" data-toggle="modal" class="btn btn-danger">Hapus</a>
												<?php
												break;
											case '3':
												?>
													<a onclick="getData('<?=$h['id_pasien']?>')" data-toggle="modal" class="btn btn-success">Daftar</a>
												<?php
												break;
											case '1':
												?>
													<a onclick="getData1('<?=$h['id_pasien']?>')"  class="btn btn-warning">Periksa</a>
												<?php
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
		$db->delete("tpasien","id_pasien = '$id'");
	$function->direct('?h=pasien&notif=suc');
	}
