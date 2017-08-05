<?php
	$ac = $function->get('ac');
	$idH = $function->get('id');

	switch ($ac) {
		case 'add':	
				$id = $function->post('obt');
				$jum = $function->post('jumlah');
				$atur = $function->post('aturDok');

				$q = $db->view("tobat WHERE id_obat='$id'");
				$h=$q->fetch();
				$stk = $h['stok'];
				$nobat = $h['nama_obat'];

				if ($jum > $stk) {
					$function->modalNotif("MAAF..!!! Stok ".$nobat." Tersisa",$stk,"Try Again");
				}
				elseif($jum < $stk)
				{
					$_SESSION['obt'][$id]=$jum."+".$atur;
					$function->direct("?h=periksaPasien&id=$idH");
				}

			
			break;
		
		case 'delO':
			if (!empty($_SESSION['obt'])) {
				$id5 = $function->get('idO');
				unset($_SESSION['obt'][$id5]);
			}
			$function->direct("?h=periksaPasien&id=$idH");
			break;
		
		case 'up':
			if (!empty($_SESSION['obt'])) {
				$att = $function->post('aturan');
				$jum = $function->post('jum');
				$stk = $function->post('stok');

				foreach ($jum as $k => $v) {
				$q = $db->view("tobat WHERE id_obat='$k'");
				$h=$q->fetch();
				$nobat = $h['nama_obat'];

				if ($jum[$k] > $stk[$k]) {
					$function->modalNotif("MAAF..!!! Stok ".$nobat." Tersisa",$stk[$k],"Try Again");
				}
				elseif($jum[$k] < $stk[$k])
				{
					$_SESSION['obt'][$k]=$v."+".$att[$k];
					//$function->direct("?h=periksaPasien&id=$idH");
				}

				}
			}
			break;
	}
