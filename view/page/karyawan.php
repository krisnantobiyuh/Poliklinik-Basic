<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Data Karyawan</div><hr>
		<a href="?h=karyawan&p=insertkaryawan" class="btn btn-success"><i class="fa fa-plus"></i>Tambah</a>
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
					<th>Tlp</th>
					<th>Jabatan</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
					$q = $db->view("tuser WHERE status=2 OR status=3 OR status=4 OR status=5 ORDER BY id_user DESC");
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
						}
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h['nama_user'] ?></td>
								<td><?=$h['alamat_user'] ?></td>
								<td><?=$h['hp_user'] ?></td>
								<td><?=$status1 ?></td>
								<td>
									<a href="?h=karyawan&p=editkaryawan&id=<?=$h['id_user']?>" class="btn btn-info">Edit</a>
									<a data-href="?h=karyawan&ac=del&id=<?=$h['id_user']?>" data-toggle="modal" data-target="#confirmDelAd" class="btn btn-danger">Hapus</a>
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
	$function->direct('?h=karyawan&notif=suc');
	}
