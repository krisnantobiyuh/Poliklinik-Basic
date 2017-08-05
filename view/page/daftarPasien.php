<div class="col-md-12">
<div class="box">
	<div class="box-header">
		<div class="box-title">Daftar pasien</div><hr>
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
					$q = $db->view("tdaftar a,tpasien b WHERE a.id_pasien=b.id_pasien AND a.tgl_up='$date' AND a.id_poli='$poliLog'");
					while ($h=$q->fetch()) {
						$idDaf = $h['id_daftar'];
							$qRe = $db->view("tresep WHERE id_daftar='$idDaf'");
							$umur = $h['umur'];
							$umur = $function->countAge($umur);
						?>
							<tr>
								<td><?=$n++?></td>
								<td><?=$h['nama_pasien'] ?></td>
								<td><?=$h['alamat_pasien'] ?></td>
								<td><?=$h['hp_pasien'] ?></td>
								<td><?=$h['jk'] ?></td>
								<td><?=$umur?></td>
								<td>
									<?php 
									if ($qRe->rowCount() == 0) {
										?>
											<a onclick="getData1('<?=$idDaf?>')"  class="btn btn-warning">Periksa</a>
										<?php	
										}else{

										?>
											<a   class="btn btn-warning disabled">Sudah di Periksa</a>
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



</script>

<?php
	$ac = $function->get('ac');
	if ($ac == 'del') {
	$id = $function->get('id');
		$db->delete("tpasien","id_pasien = '$id'");
	$function->direct('?h=dokter');
	}
