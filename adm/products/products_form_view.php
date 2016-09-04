<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<?php if($_SESSION['rol'] != "ADM"):?>
<script>
    
    $(document).ready(function(){
        
        $(":radio").prop("disabled", true);        
        
    });
</script>    
<?php endif;?>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
<h1 class="text-center">Productos</h1>
    <form class="" action="index.php" method="POST">
            <input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
      <div class="form-group">
        <label for="">Id.</label>
        <input readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="id_product" value="<?php if(isset($values['id_product'])) echo $values['id_product']?>">
      </div>
      <div class="form-group">
        <label for="">Nombre <small class="text-danger">(*)</small></label>
        <input type="text" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="name" value="<?php if(isset($values['name'])) echo $values['name']?>">
		<?php if(isset($values['errors']['name']) and $values['errors']['name']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['name']?></label>
		<?php endif;?>
	  </div>
      <div class="form-group">
        <label for="">Descripción <small class="text-danger">(*)</small></label>
        <input type="text" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="description" value="<?php if(isset($values['description'])) echo $values['description']?>">
		<?php if(isset($values['errors']['description']) and $values['errors']['description']!=''):?>
			<label class="alert alert-danger"><?php echo $values['errors']['description']?></label>
		<?php endif;?>
	  </div>
            <div class="form-group">
                <div class="sub-seccion">Información del estatus del producto</div>
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
            <div class="col-sm-6 col-sm-offset-4">
                <a class="btn btn-default"  href="<?php echo full_url."/adm/products/index.php"?>"><i class="fa fa-arrow-left  fa-pull-left fa-border"></i> Regresar</a>
                <button type="submit" class="btn btn-default"><i class="fa fa-save fa-pull-left fa-border"></i> Guardar</button>
                <br><br><br>
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
	<?php if(isset($values['errors']) and count($values['errors'])>0):?>
		<?php $errors_concat = "";foreach($values['errors'] as $errors): ?>
			<?php $errors_concat.='<i class="fa fa-arrow-circle-right"></i> '.$errors."<br>";?>
		<?php endforeach;?>
		<script>
			$(document).ready(function(){
			$('.modal-body').html('<div class="alert alert-danger" role="alert"><?php echo $errors_concat;?></div>');
			$('.modal-title').html('<i class="fa fa-warning alert alert-warning"> Revise la información cargada</i>');
			$('#myModal').modal('show');	
			});

		
		</script> 
    <?php endif;?>
 </div>

<?php include('../../view_footer.php')?>
