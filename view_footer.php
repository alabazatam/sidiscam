<!-- Modal -->


			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Cuentas bancarias</h4>
				  </div>
				  <div class="modal-body">
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				  </div>
				</div>
			  </div>
			</div>

</body>
</html>
<script src="<?php echo full_url;?>/web/js/jquery.js"></script>
<script src="<?php echo full_url;?>/web/js/datatables.js"></script>
<script src="<?php echo full_url;?>/web/js/utilitarios.js"></script>
<script type="text/javascript" src="<?php echo full_url;?>/web/bootstrap/js/moment/moment.js"></script>
<script type="text/javascript" src="<?php echo full_url;?>/web/bootstrap/js/transition.js"></script>
<script type="text/javascript" src="<?php echo full_url;?>/web/bootstrap/js/collapse.js"></script>
<script type="text/javascript" src="<?php echo full_url;?>/web/bootstrap/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo full_url;?>/web/bootstrap/js/moment/locale/es.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		
		$('.datetimepicker1').datetimepicker({
			 viewMode: 'days',
			 locale: 'es',
			 format: 'DD-MM-YYYY',
			 useCurrent: true,
			 showTodayButton: true,
			 showClear: true,
			 showClose: true
			 
        });
		
	});
</script>
