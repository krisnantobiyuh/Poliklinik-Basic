
<script type="text/javascript">
function getData(a){
	$("#idP").val(a);
	$("#addDaftar").modal('show');
}
function getData1(a){
	$("#idP1").val(a);
	$("#addPeriksa").modal('show');
}

function getData2(a){
	$.ajax({
		url : '../view/ajax/detailResep.php',
		type : 'POST',
		data : {
			'idD' : a
		},
		success:function(data){
			$("#bodyView").html(data);
			$("#addDetailResep").modal('show');
		}
	});
}
</script>
