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
<script src="<?php echo full_url;?>/web/css/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo full_url;?>/web/css/bootstrap/js/scrollSpy.js"></script>
<script src="<?php echo full_url;?>/web/js/jquery-validation-1.14.0/dist/jquery.validate.js"></script>
<script src="<?php echo full_url;?>/web/js/jquery-validation-1.14.0/dist/additional-methods.js"></script>
<script src="<?php echo full_url;?>/web/js/datatables.js"></script>
<script src="<?php echo full_url;?>/web/js/utilitarios.js"></script>
<script src="<?php echo full_url;?>/web/js/bootstrap-datepicker.min.js"></script>

    <script>
        $( document ).ready(function() {
				$(".datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val();
        });
    </script>