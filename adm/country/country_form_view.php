<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<?php 
	$Regions = new Regions();
	$list_regions = $Regions -> getListRegions();

?>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
		<h1 class="text-center">Paises</h1>
	<form class="form-horizontal" action="index.php" method="POST">
		<input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
	  <div class="form-group">
		<div class="col-sm-3">
		<label for="">Id</label>
		<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="id_country" value="<?php if(isset($values['id_country'])) echo $values['id_country']?>">
		</div>
	  </div>
	  <div class="form-group">
		  <div class="col-sm-6">
		<label for="">Región <small class="text-danger">(*)</small></label>
				<select name="id_region"  class="form-control input-sm">
					<option value="">Seleccione...</option>
				<?php if(count($list_regions)>0): ?>
					<?php foreach($list_regions as $list): ?>

                                    <option value="<?php echo $list['id_region'];?>" <?php if($list['id_region'] == $values['id_region']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>
						
					<?php endforeach; ?>
				<?php endif; ?>
				</select>
		<?php if(isset($values['errors']['id_region']) and $values['errors']['id_region']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['id_region']?></label>
		<?php endif;?>
		  </div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-6">
		<label for="">Nombre <small class="text-danger">(*)</small></label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="name" value="<?php if(isset($values['name'])) echo $values['name']?>">
		<?php if(isset($values['errors']['name']) and $values['errors']['name']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['name']?></label>
		<?php endif;?>
		</div>
		<div class="col-sm-6">
		<label for="">Abreviatura <small class="text-danger">(*)</small></label>
                <input autocomplete="off" type="text" maxlength="2" class="form-control input-sm" id="" placeholder="" name="abr" value="<?php if(isset($values['abr'])) echo $values['abr']?>">
		<?php if(isset($values['errors']['abr']) and $values['errors']['abr']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['abr']?></label>
		<?php endif;?>
		</div>
	  </div>
		<div class="form-group">
                        <div class="sub-seccion">Información del estatus del país</div>
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
		<a class="btn btn-default"  href="<?php echo full_url."/adm/country/index.php"?>"><i class="fa fa-arrow-left  fa-pull-left fa-border"></i> Regresar</a>
		<button type="submit" class="btn btn-default"><i class="fa fa-save fa-pull-left fa-border"></i> Guardar</button>
		<br><br><br>
                </div>
	  </div>
	<?php if(isset($values['msg']) and $values['msg']!=''):?>
        <div class="alert alert-success" role="alert"><?php echo $values['msg'];?></div>
    <?php endif;?>
	</form>
</div>
<?php include('../../view_footer.php')?>