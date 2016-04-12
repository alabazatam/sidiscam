<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<div class="container">
	<h1 class="text-center">Cambio de clave</h1>
	<form class="" action="index.php" method="POST">
		<input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
		<input autocomplete="off" readonly="readonly" type="hidden" class="form-control input-sm" id="" placeholder="" name="id_user" value="<?php echo $_SESSION['id_user']?>">
	  <div class="form-group">
		<label for="">Usuario</label>
		<?php echo $_SESSION['login'];?>
	  </div>
	  <div class="form-group">
		<label for="">Clave actual</label>
		<input autocomplete="off" type="password" id="" class="form-control input-sm" name="password" value="">
	  </div>
	  <div class="form-group">
		<label for="">Clave nueva</label>
		<input autocomplete="off" type="password" id="" class="form-control input-sm" name="new_password" value="">
	  </div>
	  <div class="form-group">
		<label for="">Repetir clave nueva</label>
		<input autocomplete="off" type="password" id="" class="form-control input-sm" name="retype_password" value="">
	  </div>
		
		<button type="submit" class="btn btn-default"><i class="fa fa-save fa-pull-left fa-border"></i> Guardar</button>
    <?php if(isset($values['msg']) and $values['msg']!=''):?>
        <div class="alert alert-success" role="alert"><?php echo $values['msg'];?></div>
    <?php endif;?>
    <?php if(isset($values['error']) and $values['error']!=''):?>
        <div class="alert alert-danger" role="alert"><?php echo $values['error'];?></div>
    <?php endif;?>
	</form>
</div>
<?php include('../../view_footer.php')?>