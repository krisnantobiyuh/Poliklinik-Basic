<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Data pasien Daftar</div><hr>
		<?php 
		if (isset($_GET['notif']) == "suc") {
            $function->notif("success","Success ..!!!","Perubahan / Penambahan / Delete data berhasil....");
          }
			if ($levelLog == "4") 
			{
			$q = $db->view("tdaftar a ,tpoli b, tpasien c WHERE a.id_poli=b.id_poli AND a.id_pasien=c.id_pasien ");

				?>
					<!-- <a href="?h=pasien&p=insertpasien" class="btn btn-success">Tambah</a> -->
					<!-- <a href="#addPasien" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a> -->
				<?php
			}
			else
			{
			$q = $db->view("tdaftar a ,tpoli b, tpasien c WHERE a.id_poli=b.id_poli AND a.id_pasien=c.id_pasien AND a.tgl_up='$date'");

				?>
					<a href="#addPasien" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i>  Pasien Baru</a>
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
					<th>Tgl Daftar</th>
					<th>Poliklinik</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=1;
					while ($h=$q->fetch()) {
						$u = $h['umur'];
						$umur = $function->countAge($u);

						$tgl = date("Y-m-d",strtotime($h['tgl_up']));

						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h['nama_pasien'] ?></td>
								<td><?=$h['alamat_pasien'] ?></td>
								<td><?=$h['hp_pasien'] ?></td>
								<td><?=$h['jk'] ?></td>
								<td><?=$umur ?></td>
								<td><?=$tgl ?></td>
								<td><?=$h['nama'] ?></td>
								<td>
									<?php 
										if ($levelLog == "4") {
											?>
												<!-- <a href="?h=pendaftaran&p=editpasien&id=<?=$h['id_daftar']?>" class="btn btn-info">Edit</a> -->
												<a data-href="?h=pendaftaran&ac=del&id=<?=$h['id_daftar']?>" data-toggle="modal" data-target="#confirmDelAd" class="btn btn-danger">Hapus</a>
											<?php
										}else{
											?>
										 		<a class="btn btn-success disabled">Disabled</a>
											<?php
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

function getData(a){
	$("#idP").val(a);
	$("#addDaftar").modal('show');

}
</script>

<?php
	$ac = $function->get('ac');
	if ($ac == 'del') {
	$id = $function->get('id');
		$db->delete("tdaftar","id_daftar = '$id'");
	$function->direct('?h=pendaftaran&notif=suc');
	}
