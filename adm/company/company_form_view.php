<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<?php 
	$Country = new Country();
	$list_country = $Country -> getListCountry();

?>
<div class="container">
<h1 class="text-center">Compañias</h1>


<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detalle</a></li>
    <?php if(isset($values['id_company']) and $values['id_company']!=''):?>
	<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Cuentas bancarias</a></li>
	<?php endif;?>
	
	
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
	  <div role="tabpanel" class="tab-pane active" id="home">
		  <?php include('company_view.php');?>
	  </div>
	<?php if(isset($values['id_company']) and $values['id_company']!=''):?>
	  <div role="tabpanel" class="tab-pane" id="profile">
		  <?php include('banks_view.php');?>
	  </div>
	<?php endif;?>
  </div>

</div>
 </div>

<?php include('../../view_footer.php')?>