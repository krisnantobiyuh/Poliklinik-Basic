
<div class="modal fade" id="confirmDelAd">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body" >
			<center>
				<div style="font-size: 50px" ></div>
				<div  id="title" style="font-size: 30px"></div>
				<div style="font-size: 50px">
					<a data-dismiss="modal" class="btn btn-danger">Batal</a>
					<a class="btn btn-success btn-ok">Ok</a>
				</div>
			</center>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
        $('#confirmDelAd').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            // $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
            $('#title').html('Delete');
        });
</script>


<div class="modal fade" id="logout">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body" >
			<center>
				<div style="font-size: 50px" ></div>
				<div  id="title-logout" style="font-size: 30px"></div>
				<div style="font-size: 50px">
					<a data-dismiss="modal" class="btn btn-danger">Batal</a>
					<a class="btn btn-success btn-ok">Ok</a>
				</div>
			</center>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
        $('#logout').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            // $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
            $('#title-logout').html('Yakin logout');
        });
</script>

