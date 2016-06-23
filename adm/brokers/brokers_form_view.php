<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<?php 
	if(isset($values['id_broker']) and $values['id_broker']!=''):
		$BrokersBanksDetail = new BrokersBanksDetail();
		$values['brokers_banks_detail'] = $BrokersBanksDetail->getBrokersListBanksDetailByBrokers($values['id_broker']);	
	endif;
?>

<div class="container">
	<h1 class="text-center">Brokers</h1>
	
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detalle</a></li>
	<?php if(isset($values['id_broker']) and $values['id_broker']!=''):?>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Cuentas bancarias</a></li>
	<?php endif;?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="home">
		  <?php include('brokers_view.php');?>
	</div>
	<?php if(isset($values['id_broker']) and $values['id_broker']!=''):?>
    <div role="tabpanel" class="tab-pane" id="profile">
		<?php include('banks_view.php');?>
	</div>
	<?php endif;?>
  </div>

</div>

</div>
<?php include('../../view_footer.php')?>