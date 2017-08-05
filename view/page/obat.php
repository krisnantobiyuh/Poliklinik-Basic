<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Data Obat</div><hr>
		<a href="?h=obat&p=insertobat" class="btn btn-success"><i class="fa fa-plus"></i>Tambah</a>
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
					<th>Jenis</th>
					<th>Satuan</th>
					<th>Harga</th>
					<th>Stok</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
					$q = $db->view("tobat ORDER BY id_obat DESC");
					while ($h=$q->fetch()) {
						$sat = explode(",",$h['nama_obat'] );
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$sat[0] ?></td>
								<td><?=$h['jenis'] ?></td>
								<td><?=$sat[1] ?></td>
								<td><?=$h['harga'] ?></td>
								<td><?=$h['stok'] ?></td>
								<td>
									<a href="?h=obat&p=editobat&id=<?=$h['id_obat']?>" class="btn btn-info">Edit</a>
									<a data-href="?h=obat&ac=del&id=<?=$h['id_obat']?>" data-target="#confirmDelAd" data-toggle="modal" class="btn btn-danger">Hapus</a>
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
		$db->delete("tobat","id_obat = '$id'");
	$function->direct('?h=obat&notif=suc');
	}
