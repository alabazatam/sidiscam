	<form class="form-horizontal" action="index.php" method="POST">
		<input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
	  <div class="form-group">
		<div class="col-sm-3">
			<label for="">Id</label>
			<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="id_broker" value="<?php if(isset($values['id_broker'])) echo $values['id_broker']?>">
		</div>
	</div>
      <div class="form-group">
		  <div class="col-sm-6">
			<label for="">Nombre <small class="text-danger">(*)</small></label>
			<input type="text" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="name" value="<?php if(isset($values['name'])) echo $values['name']?>">
			<?php if(isset($values['errors']['name']) and $values['errors']['name']!=''):?>
				<label class="alert alert-danger"><?php echo $values['errors']['name']?></label>
			<?php endif;?>
		  </div>
<!--		  <div class="col-sm-6">
			<label for="">Abreviatura</label>
			<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="abr" value="<?php // if(isset($values['abr'])) echo $values['abr']?>">
			<?php // if(isset($values['errors']['abr']) and $values['errors']['abr']!=''):?>
				<label class="alert alert-danger"><?php // echo $values['errors']['abr']?></label>
			<?php // endif;?>
		  </div>-->
	  </div>	
	  <div class="form-group">
		  <div class="col-sm-12">
			<label for="">Dirección <small class="text-danger">(*)</small></label>
			<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="address" value="<?php if(isset($values['address'])) echo $values['address']?>">
			<?php if(isset($values['errors']['address']) and $values['errors']['address']!=''):?>
				<label class="alert alert-danger"><?php echo $values['errors']['address']?></label>
			<?php endif;?>
		  </div>
	  </div>
	  <div class="form-group">
		  <div class="col-sm-6">
			<label for="">Teléfono principal <small class="text-danger">(*)</small></label>
			<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="phone1" value="<?php if(isset($values['phone1'])) echo $values['phone1']?>">
			<?php if(isset($values['errors']['phone1']) and $values['errors']['phone1']!=''):?>
				<label class="alert alert-danger"><?php echo $values['errors']['phone1']?></label>
			<?php endif;?>
		  </div>
		  <div class="col-sm-6">
			<label for="">Teléfono secundario</label>
			<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="phone2" value="<?php if(isset($values['phone2'])) echo $values['phone2']?>">
			<?php if(isset($values['errors']['phone2']) and $values['errors']['phone2']!=''):?>
				<label class="alert alert-danger"><?php echo $values['errors']['phone2']?></label>
			<?php endif;?>
		  </div>
	  </div>
	  <div class="form-group">
		  <div class="col-sm-6">
			<label for="">Correo electrónico <small class="text-danger">(*)</small></label>
			<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email1" value="<?php if(isset($values['email1'])) echo $values['email1']?>">
			<?php if(isset($values['errors']['email1']) and $values['errors']['email1']!=''):?>
				<label class="alert alert-danger"><?php echo $values['errors']['email1']?></label>
			<?php endif;?>
		  </div>
		  <div class="col-sm-6">
		<label for="">Correo electrónico alternativo</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email2" value="<?php if(isset($values['email2'])) echo $values['email2']?>">
		<?php if(isset($values['errors']['email2']) and $values['errors']['email2']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['email2']?></label>
		<?php endif;?>
		  </div>
	  </div>
	  
		<div class="form-group">
                    <div class="sub-seccion">Información del estatus del broker</div>
			<div class="col-sm-6">
		  <label class="label label-danger">
			<input type="radio" name="status" id="status" value="0" <?php if(isset($values['status']) and $values['status'] =='0' ) echo "checked=checked"?>>
			Inactivo
		  </label>
			</div>
			<div class="col-sm-6">
		  <label class="label label-success">
			<input type="radio" name="status" id="status" value="1" <?php if(isset($values['status']) and $values['status'] =='1' ) echo "checked=checked"?>>
			Activo
		  </label>
			</div>
		</div>	
	  <div class="form-group">
		  <div class="col-sm-6">
			<label autocomplete="off" for="">Fecha creado</label>
			<input autocomplete="off"  type="text" readonly="readonly" class="form-control input-sm" id="" placeholder="" name="date_created" value="<?php if(isset($values['date_created'])) echo $values['date_created']?>">
		  </div>
		  <div class="col-sm-6">
			<label for="">Fecha modificado</label>
			<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="date_updated" value="<?php if(isset($values['date_updated'])) echo $values['date_updated']?>">
		  </div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-6">
			<label class="text-danger">Campos requeridos (*)</label>
			
		</div>
	  </div>
      <div class="form-group">
		<div class="col-sm-6 col-sm-offset-4">		
		<a class="btn btn-default"  href="<?php echo full_url."/adm/brokers/index.php"?>"><i class="fa fa-arrow-left  fa-pull-left fa-border"></i> Regresar</a>
		<button type="submit" class="btn btn-default"><i class="fa fa-save fa-pull-left fa-border"></i> Guardar</button>
		<br><br><br>
                </div>
	  </div>

	</form>
	<?php if(isset($values['msg']) and $values['msg']!=''):?>
        <script>
			$(document).ready(function(){
			$('.modal-body').html('<div class="alert alert-success" role="alert"><?php echo $values['msg'];?></div>');
			$('.modal-title').html('');
			$('#myModal').modal('show');	
			});

		
		</script>
    <?php endif;?>