<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
<div>
	<h1 class="text-center">Clientes</h1>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detalle</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Cuentas bancarias</a></li>
	<li role="presentation"><a href="#address" aria-controls="address" role="tab" data-toggle="tab">Direcciones de entrega</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

    <form class="form-horizontal" action="index.php" method="POST">
            <input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
      <div class="form-group">
		<div class="col-sm-3">
        <label for="">Id.</label>
        <input readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="id_client" value="<?php if(isset($values['id_client'])) echo $values['id_client']?>">
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

		<div class="col-sm-6">
		<label for="">Identificador fiscal</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="rif" value="<?php if(isset($values['rif'])) echo $values['rif']?>">
		<?php if(isset($values['errors']['rif']) and $values['errors']['rif']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['rif']?></label>
		<?php endif;?>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-6">
		<label for="">País <small class="text-danger">(*)</small></label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="id_country" value="<?php if(isset($values['id_country'])) echo $values['id_country']?>">
		<?php if(isset($values['errors']['id_country']) and $values['errors']['id_country']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['id_country']?></label>
		<?php endif;?>
		</div>
		<div class="col-sm-6">
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
		<label for="">Correo electrónico</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email1" value="<?php if(isset($values['email1'])) echo $values['email1']?>">
		<?php if(isset($values['errors']['email1']) and $values['errors']['email1']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['email1']?></label>
		<?php endif;?>
		</div>
		<div class="col-sm-6">
		<label for="">Correo electrónico secundario</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email2" value="<?php if(isset($values['email2'])) echo $values['email2']?>">
		<?php if(isset($values['errors']['email2']) and $values['errors']['email2']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['email2']?></label>
		<?php endif;?>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-4">
		<label for="">Contacto principal</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="contact1" value="<?php if(isset($values['contact1'])) echo $values['contact1']?>">
		<?php if(isset($values['errors']['contact1']) and $values['errors']['contact1']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['contact1']?></label>
		<?php endif;?>
		</div>
		<div class="col-sm-4">
		<label for="">Teléfono contacto</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="phone_contact1" value="<?php if(isset($values['phone_contact1'])) echo $values['phone_contact1']?>">
		<?php if(isset($values['errors']['phone_contact1']) and $values['errors']['phone_contact1']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['phone_contact1']?></label>
		<?php endif;?>
		</div>
		<div class="col-sm-4">
		<label for="">Correo electrónico</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email_contact1" value="<?php if(isset($values['email_contact1'])) echo $values['email_contact1']?>">
		<?php if(isset($values['errors']['email_contact1']) and $values['errors']['email_contact1']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['email_contact1']?></label>
		<?php endif;?>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-4">
		<label for="">Contacto secundario</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="contact2" value="<?php if(isset($values['contact2'])) echo $values['contact2']?>">
		<?php if(isset($values['errors']['contact2']) and $values['errors']['contact2']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['contact2']?></label>
		<?php endif;?>
		</div>
		<div class="col-sm-4">
		<label for="">Teléfono contacto</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="phone_contact2" value="<?php if(isset($values['phone_contact2'])) echo $values['phone_contact2']?>">
		<?php if(isset($values['errors']['phone_contact2']) and $values['errors']['phone_contact2']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['phone_contact2']?></label>
		<?php endif;?>
		</div>
		<div class="col-sm-4">
		<label for="">Correo electrónico</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email_contact2" value="<?php if(isset($values['email_contact2'])) echo $values['email_contact2']?>">
		<?php if(isset($values['errors']['email_contact2']) and $values['errors']['email_contact2']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['email_contact2']?></label>
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
        <label for="">Fecha creado</label>
        <input type="text" readonly="readonly" id="" class="form-control input-sm" name="date_created" value="<?php if(isset($values['date_created'])) echo $values['date_created']?>">
		</div>
		<div class="col-sm-4">
        <label for="">Fecha modificado</label>
        <input type="text" readonly="readonly" id="" class="form-control input-sm" name="date_updated" value="<?php if(isset($values['date_updated'])) echo $values['date_updated']?>">
		</div>
	   </div>
      <div class="form-group">
		<div class="col-sm-6">
			<label class="text-danger">Campos requeridos (*)</label>
			
		</div>
	  </div>
      <div class="form-group">
		<div class="col-sm-6 col-sm-offset-4">
            <a class="btn btn-default"  href="<?php echo full_url."/adm/clients/index.php"?>"><i class="fa fa-arrow-left  fa-pull-left fa-border"></i> Regresar</a>
            <button type="submit" class="btn btn-default"><i class="fa fa-save fa-pull-left fa-border"></i> Guardar</button>
			
		</div>
	  </div>
    <?php if(isset($values['msg']) and $values['msg']!=''):?>
        <div class="alert alert-success" role="alert"><?php echo $values['msg'];?></div>
    <?php endif;?>			
    </form>
	</div>
    <div role="tabpanel" class="tab-pane" id="profile">

				<div class="col-sm-12">
				<?php if(isset($values['id_client'])):?>
				<h2>Cuentas bancarias</h2>
				<button onclick="openBank(2,<?php echo $values['id_client']?>)">Asignar cuenta <i class="fa fa-plus-circle"></i></button>
				<div id="bank_list" class="col-sm-12">

				</div>
				<?php endif; ?>
				</div>
	</div>
    <div role="tabpanel" class="tab-pane" id="address">
		<?php if(isset($values['id_client'])):?>
		<h2>Direcciones de entrega</h2>
		<button onclick="openBank(2,<?php echo $values['id_client']?>)">Asignar dirección<i class="fa fa-plus-circle"></i></button>
		<?php endif; ?>
	</div>
  </div>

</div><!-- Nav tabs -->
	


		

</div>

<?php include('../../view_footer.php')?>
<?php if(isset($values['id_client'])):?>
<script type="text/javascript">

$(document).ready(function(){
	$.ajax({
		type: "POST",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "list_banks_tables",id_table: 2,id_primary:<?php echo $values['id_client']?>},
		success: function(html){
			$('#bank_list').html(html);
		}
	});	
	
});
function openBank(id_table,id_primary) {
		
	$.ajax({
		type: "POST",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "bank_list",id_table: id_table,id_primary:id_primary},
		success: function(html){
			$('.modal-body').html(html);
			$('#myModal').modal('show');
		}
	});

}
function addBank(id_bank,id_table,id_primary) {
	//alert(id_bank +"-" +id_table + "-" + id_primary);
	$.ajax({
		type: "POST",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "add_banks_tables",id_bank:id_bank,id_table: id_table,id_primary:id_primary},
		success: function(){
			$('#myModal').modal('toggle');
			$('.form-horizontal').submit();
		}
	});

}
function deleteBank(id_bank,id_table,id_primary) {
	//alert(id_bank +"-" +id_table + "-" + id_primary);
	$.ajax({
		type: "POST",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "delete_banks_tables",id_bank:id_bank,id_table: id_table,id_primary:id_primary},
		success: function(){
			
			$('.form-horizontal').submit();
		}
	});

}
</script>
<?php endif; ?>
