<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<?php 
	$Country = new Country();
	$list_country = $Country -> getListCountry();

?>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
<h1 class="text-center">Puertos</h1>
    <form class="form-horizontal" action="index.php" method="POST">
    <input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
        <div class="form-group">
		  <div class="col-sm-3">
			<label for="">Id.</label>
			<input readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="id_port" value="<?php if(isset($values['id_port'])) echo $values['id_port']?>">
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
<!--		<div class="col-sm-6">
				<label for="">Abreviatura</label>
				<input type="text" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="abr" value="<?php // if(isset($values['abr'])) echo $values['abr']?>">
				<?php // if(isset($values['errors']['abr']) and $values['errors']['abr']!=''):?>
					<label class="alert alert-danger"><?php // echo $values['errors']['abr']?></label>
				<?php // endif;?>
		</div>-->
            <div class="col-sm-6">
                <label for="">Código <small class="text-danger">(*)</small></label>
                <input type="text" maxlength="5" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="cod_port" value="<?php if(isset($values['cod_port'])) echo $values['cod_port']?>">
                        <?php if(isset($values['errors']['cod_port']) and $values['errors']['cod_port']!=''):?>
                                <label class="alert alert-danger"><?php echo $values['errors']['cod_port']?></label>
                        <?php endif;?>
            </div>
        </div>
<!--    <div class="form-group">
            <div class="col-sm-6">
            <label for="">Ciudad <small class="text-danger">(*)</small></label>
            <input type="text" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="description" value="<?php // if(isset($values['description'])) echo $values['description']?>">
		<?php // if(isset($values['errors']['description']) and $values['errors']['description']!=''):?>
			<label class="alert alert-danger"><?php // echo $values['errors']['description']?></label>
		<?php // endif;?>
            </div>
	</div>-->
        <div class="form-group">
            <div class="col-sm-6">
		<label for="">País <small class="text-danger">(*)</small></label>
		<select name="id_country"  class="form-control input-sm">
		<option value="">Seleccione...</option>
		<?php if(count($list_country)>0): ?>
		<?php foreach($list_country as $list): ?>
                    <option value="<?php echo $list['id_country'];?>" <?php if($list['id_country'] == @$values['id_country']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>
		<?php endforeach; ?>
		<?php endif; ?>
		</select>
		<?php if(isset($values['errors']['id_country']) and $values['errors']['id_country']!=''):?>
                    <label class="alert alert-danger"><?php echo $values['errors']['id_country']?></label>
		<?php endif;?>
            </div>
	</div>
        <div class="form-group">
            <div class="sub-seccion">Información del estatus del puerto</div>
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
                <label for="">Fecha creado</label>
                <input type="text" readonly="readonly" id="" class="form-control input-sm" name="date_created" value="<?php if(isset($values['date_created'])) echo $values['date_created']?>">
            </div>
            <div class="col-sm-6">
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
				<a class="btn btn-default"  href="<?php echo full_url."/adm/ports/index.php"?>"><i class="fa fa-arrow-left  fa-pull-left fa-border"></i> Regresar</a>
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

		
		</script>    <?php endif;?>
 </div>

<?php include('../../view_footer.php')?>