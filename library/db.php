<?php 
	/**
	* 
	*/
	$date= date("Y-m-d");
	$dateTime= date("Y-m-d h:m");
	$POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$db = new db();
	$function = new php();
	class db
	{
		
		function __construct()
		{
			$this->db = new PDO("mysql:host=localhost;dbname=db_krisukk","root","");
		}
		public function param($a,$b)
		{
			$a = $this->db->prepare($a);
			$a->execute($b);
			return $a;
		}
		public function view($a,$b="*")
		{
			$a = $this->db->prepare("SELECT $b FROM $a");
			$a->execute();
			return $a;
		}
		public function delete($a,$b)
		{
			$a = $this->db->prepare("DELETE FROM $a WHERE $b");
			$a->execute();
			return $a;
		}

		public function select($a,$b,$c,$d,$e="")
		{
			?>
			<select name="<?=$a?>" class="form-control" id="obat">
				<option value=""><?=$e?></option>
				<?php 
					$q = $this->db->query(" SELECT * FROM $b");
					while ($h=$q->fetch()) {
						?>
							<option value="<?=$h[$c]?>"><?=$h[$d]?></option>
						<?php
					}
			 ?>
			</select>
			<?php
		}
	}



class php
	{
		
		public function get($a)
		{
			$a = isset($_GET[$a])?$_GET[$a]:'';
			return $a;
		}
		public function post($a)
		{
			$a = isset($_POST[$a])?$_POST[$a]:'';
			return $a;
		}
		public function session($a)
		{
			$a = isset($_SESSION[$a])?$_SESSION[$a]:'';
			return $a;
		}
		public function direct($a)
		{
			echo "<script>location.href='$a'</script>";
		}
		public function alert($a)
		{
			echo "<script>alert('$a')</script>";
		}
		public function modal($a,$b,$c)
		{
			echo 
			"
			<script>
				$('$c').html('$a');
				$('$b').modal('show');
			</script>
			";
		}
		public function modalNotif($a,$b,$c)
		{
			echo 
			"
			<script>
				$('#title-notif').html('$a');
				$('#notif').html('$b');
				$('#button-notif').html('$c');
				$('#addNotif').modal('show');
			</script>
			";
		}
		public function modalNotifDok($a,$b,$c)
		{
			echo 
			"
			<script>
				$('#title-notif-dok').html('$a');
				$('#notif-dok').html('$b');
				$('#button-notif-dok').html('$c');
				$('#addNotif-dok').modal('show');
			</script>
			";
		}
		public function notif($jenis,$a,$b,$c="")
		{
			echo  
			'
			<div class="alert alert-'.$jenis.'">
  				<button href="'.$c.'" class="close" data-dismiss="alert"  aria-label="close">&times;</button>
			  	<strong>'.$a.'</strong> '.$b.'.
			</div>

		    ';
		}
		public function countAge($a)
		{
			$birthDt = new DateTime($a);
			$today = new DateTime('today');
			$y = $today->diff($birthDt)->y;	
			return $y;
		}

	}
 ?>