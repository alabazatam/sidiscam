<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<?php 
	$Country = new Country();
	$list_country = $Country -> getListCountry();

?>
<div class="container">
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
		<?php include('clients_view.php');?>
    
	</div>
	<?php if(isset($values['id_client'])):?>
		<div role="tabpanel" class="tab-pane" id="profile">
			<?php include('banks_view.php');?>

		</div>
	<?php endif;?>
	<?php if(isset($values['id_client'])):?>
		<div role="tabpanel" class="tab-pane" id="address">
			<?php include('address_view.php');?>

		</div>
	<?php endif;?>
  </div>

</div><!-- Nav tabs -->
	


		

</div>

<?php include('../../view_footer.php')?>
