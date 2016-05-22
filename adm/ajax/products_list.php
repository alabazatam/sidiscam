<?php foreach($products_list as $product):?>

<div class="row">
	<div class="container">
		
		<div class="col-sm-4">
			<?php echo strtoupper($product['name']);?>
		</div>
		<div class="col-sm-4">
			<a class="btn btn-default">Agregar</a>
		</div>		
	</div>	
</div>
<?php endforeach;?>