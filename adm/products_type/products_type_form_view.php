<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
<h1 class="text-center">Tipos de productos</h1>
    <form class="" action="index.php" method="POST">
            <input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
      <div class="form-group">
        <label for="">Id.</label>
        <input readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="id_product_type" value="<?php if(isset($values['id_product_type'])) echo $values['id_product_type']?>">
      </div>
      <div class="form-group">
        <label for="">Producto</label>
        <input type="text" class="form-control input-sm" id="" placeholder="" name="id_product" value="<?php if(isset($values['id_product'])) echo $values['id_product']?>">
      </div>
      <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="name" value="<?php if(isset($values['name'])) echo $values['name']?>">
      </div>
      <div class="form-group">
        <label for="">Abreviatura</label>
        <input type="text" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="abr" value="<?php if(isset($values['abr'])) echo $values['abr']?>">
      </div>			
      <div class="form-group">
        <label for="">Descripción</label>
        <input type="text" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="description" value="<?php if(isset($values['description'])) echo $values['description']?>">
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
        <input type="text" readonly="readonly" id="" class="form-control input-sm" name="date_created" value="<?php if(isset($values['date_created'])) echo $values['date_created']?>">
      </div>
      <div class="form-group">
        <label for="">Fecha modificado</label>
        <input type="text" readonly="readonly" id="" class="form-control input-sm" name="date_updated" value="<?php if(isset($values['date_updated'])) echo $values['date_updated']?>">
      </div>
            <a class="btn btn-default"  href="<?php echo full_url."/adm/products_type/index.php"?>"><i class="fa fa-arrow-left  fa-pull-left fa-border"></i> Regresar</a>
            <button type="submit" class="btn btn-default"><i class="fa fa-save fa-pull-left fa-border"></i> Guardar</button>

    </form>
    <?php if(isset($values['msg']) and $values['msg']!=''):?>
        <div class="alert alert-success" role="alert"><?php echo $values['msg'];?></div>
    <?php endif;?>
 </div>

<?php include('../../view_footer.php')?>