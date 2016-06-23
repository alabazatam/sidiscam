<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<?php 
	$Country = new Country();
	$list_country = $Country -> getListCountry();

?>
<?php 
	$States = new States();
	$list_states= $States -> getListStates();

?>
<?php
		if(isset($values['id_farm']) and $values['id_farm']!=''):
		$FarmsBanksDetail = new FarmsBanksDetail();
		$values['farms_banks_detail'] = $FarmsBanksDetail->getFarmsListBanksDetailByFarms($values['id_farm']);
		endif;	
	
	
	
?>
<div class="container">
<h1 class="text-center">Granjas</h1>


<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detalle</a></li>
	<?php if(isset($values['id_farm']) and $values['id_farm']):?>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Cuentas bancarias</a></li>
	<?php endif;?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
	  <div role="tabpanel" class="tab-pane active" id="home">
		  <?php include('farms_view.php')?>
	  </div>
	  <?php if(isset($values['id_farm']) and $values['id_farm']):?>
	  <div role="tabpanel" class="tab-pane" id="profile">
		  
		  <?php include('banks_view.php')?>
		  
	  </div>
	  <?php endif;?>
  </div>

</div>



 </div>

<?php include('../../view_footer.php')?>