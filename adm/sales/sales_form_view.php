<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<?php 
	$TypeDestiny = new TypeDestiny();
	$list_destiny = $TypeDestiny -> getListTypeDestiny();
	$Clients = new Clients();
	$list_clients = $Clients -> getListClients();
?>
<div class="container">
	<h1 class="text-center">Ventas</h1>
	<form class="form-horizontal" action="index.php" method="POST">
	<input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>


      
	  
<div>

  <!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#venta" aria-controls="venta" role="tab" data-toggle="tab">Detalle de venta</a></li>
		<?php if(isset($values['id_sale']) and $values['id_sale']!=''):?>
		<li role="presentation"><a href="#productos" aria-controls="productos" role="tab" data-toggle="tab">Productos</a></li>
		<li role="presentation"><a href="#plantas" aria-controls="plantas" role="tab" data-toggle="tab">Plantas procesadoras</a></li>
		<li role="presentation"><a href="#granjas" aria-controls="granjas" role="tab" data-toggle="tab">Granjas</a></li>
		<li role="presentation"><a href="#containers" aria-controls="containers" role="tab" data-toggle="tab">Containers</a></li>

		<li role="presentation"><a href="#direcciones" aria-controls="direcciones" role="tab" data-toggle="tab">Datos de envio y recepción</a></li>
		<?php endif;?>
	</ul>

  <!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="venta">			
			<?php include('sales_view.php');?>					
		</div><!--Fin primer panel-->
		<?php if(isset($values['id_sale']) and $values['id_sale']!=''):?>

		<div role="tabpanel" class="tab-pane" id="productos"><!--segundo panel-->
			<?php include('products_view.php');?>	
		</div><!--Fin segundo panel-->
		<div role="tabpanel" class="tab-pane" id="plantas"><!--tercer panel-->
			<?php include('plants_view.php');?>
		</div><!--Fin tercer panel-->
		<div role="tabpanel" class="tab-pane" id="granjas"><!--tercer panel-->
			<?php include('farms_view.php');?>
		</div><!--Fin tercer panel-->
		<div role="tabpanel" class="tab-pane" id="containers"><!--tercer panel-->
			<?php include('containers_view.php');?>
		</div><!--Fin tercer panel-->
		<div role="tabpanel" class="tab-pane" id="direcciones"><!--tercer panel-->
			<?php include('billing_view.php');?>
		</div><!--Fin tercer panel-->
		<?php endif;?>
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
