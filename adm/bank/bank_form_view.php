<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<div class="container">
	<h1 class="text-center">Bancos</h1>
	<form class="" action="index.php" method="POST">
		<input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
	  <div class="form-group">
		<label for="">Id</label>
		<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="id_bank" value="<?php if(isset($values['id_bank'])) echo $values['id_bank']?>">
	  </div>
	  <div class="form-group">
		<label for="">Nombre</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="name" value="<?php if(isset($values['name'])) echo $values['name']?>">
		<?php if(isset($values['errors']['name']) and $values['errors']['name']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['name']?></label>
		<?php endif;?>
	  </div>
	  <div class="form-group">
		<label for="">País</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="id_country" value="<?php if(isset($values['id_country'])) echo $values['id_country']?>">
	  	<?php if(isset($values['errors']['id_country']) and $values['errors']['id_country']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['id_country']?></label>
		<?php endif;?>
		<div class="form-group">
		<label for="">Teléfono 1</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="phone1" value="<?php if(isset($values['phone1'])) echo $values['phone1']?>">
		<?php if(isset($values['errors']['phone1']) and $values['errors']['phone1']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['phone1']?></label>
		<?php endif;?>
		</div>
		<div class="form-group">
		<label for="">Teléfono 2</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="phone2" value="<?php if(isset($values['phone2'])) echo $values['phone2']?>">
		<?php if(isset($values['errors']['phone2']) and $values['errors']['phone2']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['phone2']?></label>
		<?php endif;?>
		</div>
		<div class="form-group">
		<label for="">Email 1</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email1" value="<?php if(isset($values['email1'])) echo $values['email1']?>">
		<?php if(isset($values['errors']['email1']) and $values['errors']['email1']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['email1']?></label>
		<?php endif;?>
		</div>
		<div class="form-group">
		<label for="">Email 2</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email2" value="<?php if(isset($values['email2'])) echo $values['email2']?>">
		<?php if(isset($values['errors']['email2']) and $values['errors']['email2']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['email2']?></label>
		<?php endif;?>
		</div>
		<div class="form-group">
		<label for="">Número de cuenta</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="account_number" value="<?php if(isset($values['account_number'])) echo $values['account_number']?>">
		<?php if(isset($values['errors']['account_number']) and $values['errors']['account_number']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['account_number']?></label>
		<?php endif;?>
		</div>
		<div class="form-group">
		<label for="">ABA</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="aba" value="<?php if(isset($values['aba'])) echo $values['aba']?>">
		<?php if(isset($values['errors']['aba']) and $values['errors']['aba']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['aba']?></label>
		<?php endif;?>
		</div>
		<div class="form-group">
		<label for="">SWIF</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="swif" value="<?php if(isset($values['swif'])) echo $values['swif']?>">
		<?php if(isset($values['errors']['swif']) and $values['errors']['swif']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['swif']?></label>
		<?php endif;?>
		</div>
		<div class="form-group">
		  <label class="label label-danger">
			<input type="radio" name="status" id="status" value="0" <?php if(isset($values['status']) and $values['status'] =='0' ) echo "checked=checked"?>>
			Desactivar
		  </label>
		</div>
		<div class="form-group">
		  <label class="label label-success">
			<input type="radio" name="status" id="status" value="1" <?php if(isset($values['status']) and $values['status'] =='1' ) echo "checked=checked"?>>
			Activar
		  </label>
		</div>	
	  <div class="form-group">
		<label autocomplete="off" for="">Fecha creado</label>
		<input autocomplete="off"  type="text" readonly="readonly" class="form-control input-sm" id="" placeholder="" name="date_created" value="<?php if(isset($values['date_created'])) echo $values['date_created']?>">
	  </div>
	  <div class="form-group">
		<label for="">Fecha modificado</label>
		<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="date_updated" value="<?php if(isset($values['date_updated'])) echo $values['date_updated']?>">
	  </div>

		<a class="btn btn-default"  href="<?php echo full_url."/adm/bank/index.php"?>"><i class="fa fa-arrow-left  fa-pull-left fa-border"></i> Regresar</a>
		<button type="submit" class="btn btn-default"><i class="fa fa-save fa-pull-left fa-border"></i> Guardar</button>
    <?php if(isset($values['msg']) and $values['msg']!=''):?>
        <div class="alert alert-success" role="alert"><?php echo $values['msg'];?></div>
    <?php endif;?>
	</form>
</div>
<?php include('../../view_footer.php')?>