<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<h1 class="text-center"><label class="label label-default">Usuarios</label></h1>
<form class="" action="index.php" method="POST">
	<input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
  <div class="form-group">
    <label for="">Id.</label>
    <input readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="id_farm" value="<?php if(isset($values['id_farm'])) echo $values['id_farm']?>">
  </div>
  <div class="form-group">
    <label for="">Nombre</label>
    <input type="text" class="form-control input-sm" id="" placeholder="" name="name" value="<?php if(isset($values['name'])) echo $values['name']?>">
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
    <label for="">Fecha creado</label>
    <input type="text" id="" class="form-control input-sm" name="date_created" value="<?php if(isset($values['date_created'])) echo $values['date_created']?>">
  </div>
  <div class="form-group">
    <label for="">Fecha modificado</label>
    <input type="text" id="" class="form-control input-sm" name="date_updated" value="<?php if(isset($values['date_updated'])) echo $values['date_updated']?>">
  </div>
	<a class="btn btn-default"  href="<?php echo full_url."/adm/farms/index.php"?>"><i class="fa fa-arrow-left  fa-pull-left fa-border"></i> Regresar</a>
	<button type="submit" class="btn btn-default"><i class="fa fa-save fa-pull-left fa-border"></i> Guardar</button>
  
</form>

<?php include('../../view_footer.php')?>