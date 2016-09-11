<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<?php if($values['status'] == 0 and $_SESSION['rol'] !='ADM'):?>
<script>

$(document).ready(function(){
$("input,textarea,select,:radio").prop("disabled", true);
$(".desactivar").prop("onclick", null);
$(".activarse").prop("disabled", false);	
$(".activarse").removeAttr("disabled");	
});
</script>

<?php endif;?>


<?php 

        $Sales = new Sales();
        $status_venta_real = $Sales-> getStatusSale($values);
        

	$TypeDestiny = new TypeDestiny();
	$list_destiny = $TypeDestiny -> getListTypeDestiny();
	$Clients = new Clients();
	$list_clients = $Clients -> getListClients();
	
	
		if(isset($values['id_sale']) and $values['id_sale']!=''):
		$SalesProductsDetail = new SalesProductsDetail();
		$values['sales_products_detail'] = $SalesProductsDetail->getSalesListProductsDetailBySale($values['id_sale']);
		
		$SalesPlantsDetail = new SalesPlantsDetail();
		$values['sales_plants_detail'] = $SalesPlantsDetail->getSalesListPlantsDetailBySale($values['id_sale']);
		
		$SalesFarmsDetail = new SalesFarmsDetail();
		$values['sales_farms_detail'] = $SalesFarmsDetail->getSalesListFarmsDetailBySale($values['id_sale']);

		$SalesContainersDetail = new SalesContainersDetail();
		$values['sales_containers_detail'] = $SalesContainersDetail->getSalesListContainersDetailBySale($values['id_sale']);
		endif;
	
?>
<div class="col-sm-12 col-md-12 col-lg-12">
	<h1 class="text-center">Ventas</h1>
	<form class="form-horizontal" action="index.php" method="POST">
            <input type="hidden" name='action' class="activarse" value='<?php if(isset($values['action']))echo $values['action'];?>'>


      
	  
<div>

  <!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#venta" aria-controls="venta" role="tab" data-toggle="tab">Detalle de venta</a></li>
		<?php if(isset($values['id_sale']) and $values['id_sale']!=''):?>
		<li role="presentation"><a href="#productos" aria-controls="productos" role="tab" data-toggle="tab">Productos</a></li>
		<li role="presentation"><a href="#direcciones" aria-controls="direcciones" role="tab" data-toggle="tab">Datos de envio y recepción</a></li>
                    <?php if(isset($status_venta_real) and $status_venta_real==0):?>
                    <li role="presentation"><a href="#seguimiento" aria-controls="seguimiento" role="tab" data-toggle="tab">Seguimiento</a></li>
                    <?php endif;?>
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
		<div role="tabpanel" class="tab-pane" id="direcciones"><!--tercer panel-->
			<?php include('billing_view.php');?>
		</div><!--Fin tercer panel-->
                    <?php if(isset($status_venta_real) and $status_venta_real==0):?>
                    <div role="tabpanel" class="tab-pane" id="seguimiento"><!--cuarto panel-->
                            <?php include('seguimiento_view.php');?>
                    </div><!--Fin cuarto panel-->
                    <?php endif;?>
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
	</form>
</div>
<?php include('../../view_footer.php')?>

<script>

$(document).ready(function(){
	 
	selectCompanyBank();
	//actualizar combo dependiente de puertos
	<?php if(isset($values['id_sale']) and $values['id_sale']!=''):?>
		selectPortsCountryOut();
		selectPortsCountryIn();
	window.setTimeout( refreshClientAddress, 3000 ); // 5 seconds
	//refreshClientAddress();
	<?php endif;?>
	
	
});
</script>
