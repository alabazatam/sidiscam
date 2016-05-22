<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<?php 
	$TypeDestiny = new TypeDestiny();
	$list_destiny = $TypeDestiny -> getListTypeDestiny();
	$Clients = new Clients();
	$list_clients = $Clients -> getListClients();
?>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
	<h1 class="text-center">Ventas</h1>
	<form class="form-horizontal" action="index.php" method="POST">

      
	  
<div>

  <!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#venta" aria-controls="venta" role="tab" data-toggle="tab">Detalle de venta</a></li>
		<li role="presentation"><a href="#productos" aria-controls="productos" role="tab" data-toggle="tab">Productos</a></li>
		<li role="presentation"><a href="#direcciones" aria-controls="direcciones" role="tab" data-toggle="tab">Datos de envio y recepción</a></li>
	</ul>

  <!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="venta">
			
					<input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="">Id</label>
							<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="id_sale" value="<?php if(isset($values['id_sale'])) echo $values['id_sale']?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<label for="">Fecha de venta<small class="text-danger">(*)</small></label>
							<input type="text" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="date_sale" value="<?php if(isset($values['date_sale'])) echo $values['date_sale']?>">
							<?php if(isset($values['errors']['date_sale']) and $values['errors']['date_sale']!=''):?>
								<label class="alert alert-danger"><?php echo $values['errors']['date_sale']?></label>
							<?php endif;?>
						</div>
					</div>
					<div class="form-group">
							<div class="col-sm-6">
								<label for="">Cliente <small class="text-danger">(*)</small></label>
										<select name="id_client"  class="form-control input-sm">
											<option value="">Seleccione...</option>
										<?php if(count($list_clients)>0): ?>
											<?php foreach($list_clients as $list): ?>

													<option value="<?php echo $list['id_client'];?>" <?php if($list['id_client'] == @$values['id_client']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>

											<?php endforeach; ?>
										<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_type_destiny']) and $values['errors']['id_type_destiny']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_type_destiny']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-6">
								<label for="">Tipo de venta <small class="text-danger">(*)</small></label>
										<select name="id_type_destiny"  class="form-control input-sm">
											<option value="">Seleccione...</option>
										<?php if(count($list_destiny)>0): ?>
											<?php foreach($list_destiny as $list): ?>

													<option value="<?php echo $list['id_type_destiny'];?>" <?php if($list['id_type_destiny'] == @$values['id_type_destiny']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>

											<?php endforeach; ?>
										<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_type_destiny']) and $values['errors']['id_type_destiny']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_type_destiny']?></label>
								<?php endif;?>
							</div>

					</div>
					<div class="form-group">
						<div class="col-sm-4">
						  <label class="label label-danger">
							<input type="radio" name="status" id="status" value="0" <?php if(isset($values['status']) and $values['status'] =='0' ) echo "checked=checked"?>>
							Desactivar
						  </label>
						</div>
						<div class="col-sm-4">
						  <label class="label label-success">
							<input type="radio" name="status" id="status" value="1" <?php if(isset($values['status']) and $values['status'] =='1' ) echo "checked=checked"?>>
							Activar
						  </label>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-sm-4">
							<label autocomplete="off" for="">Fecha creado</label>
							<input autocomplete="off"  type="text" readonly="readonly" class="form-control input-sm" id="" placeholder="" name="date_created" value="<?php if(isset($values['date_created'])) echo $values['date_created']?>">
						</div>
						<div class="col-sm-6">
							<label for="">Fecha modificado</label>
							<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="date_updated" value="<?php if(isset($values['date_updated'])) echo $values['date_updated']?>">
						</div>
					</div>			
		</div><!--Fin primer panel-->
		<div role="tabpanel" class="tab-pane" id="productos"><!--segundo panel-->
			<a onclick="openProducts();" class="btn btn-default">Agregar producto <i class="fa fa-plus-circle"></i></a>
		</div><!--Fin segundo panel-->
		<div role="tabpanel" class="tab-pane" id="direcciones"><!--tercer panel-->
			tercer panel
		</div><!--Fin tercer panel-->
	</div>

</div><!-- Fin Tab panes -->
	  
	  
					<div class="form-group">
						<div class="col-sm-6">
							<label class="text-danger">Campos requeridos (*)</label>

						</div>
					</div>	  

					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-4">		
							<a class="btn btn-default"  href="<?php echo full_url."/adm/sales/index.php"?>"><i class="fa fa-arrow-left  fa-pull-left fa-border"></i> Regresar</a>
							<button type="submit" class="btn btn-default"><i class="fa fa-save fa-pull-left fa-border"></i> Guardar</button>
						</div>
					</div>
	  
	  
	  
	<?php if(isset($values['msg']) and $values['msg']!=''):?>
        <div class="alert alert-success" role="alert"><?php echo $values['msg'];?></div>
    <?php endif;?>
	</form>
</div>
<?php include('../../view_footer.php')?>
<script>
function openProducts() {
		
	$.ajax({
		type: "GET",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "products_list"},
		success: function(html){
			$('.modal-body').html(html);
			$('.modal-title').html('Productos');
			$('#myModal').modal('show');
		}
	});

}
</script>