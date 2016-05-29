<tr id='products_list_<?php echo $values['id'];?>'>
	<td>
	<input type='hidden' name='id_product[<?php echo $values['id']?>]' value='<?php echo $products_data['id_product']?>'>
	<?php echo strtoupper($products_data['name']);?>
	</td>
	<td>
		
		<select name='id_product_type[<?php echo $values['id']?>]' id='id_product_type[<?php echo $values['id']?>]'>
			<option value=''>...</option>
			<?php if(count($products_type_list)>0):?>
				<?php foreach($products_type_list as $list):?>
				<option value='<?php echo $list['id_product_type']?>'><?php echo $list['name']?></option>
				<?php endforeach;?>
			<?php endif;?>
		</select>
	
	
	</td>
	<td><input type='text' name='cases[<?php echo $values['id']?>]' size="2" autocomplete="off"></td>
	<td><input type='text' name='packing[<?php echo $values['id']?>]' size="2" autocomplete="off"></td>
	<td><input type='text' name='quantity[<?php echo $values['id']?>]' size="2" autocomplete="off"></td>
	<td><input type='text' name='rate[<?php echo $values['id']?>]' size="2" autocomplete="off"></td>
	<td><input type='text' name='amount[<?php echo $values['id']?>]' size="2" autocomplete="off"></td>
	<td><a onclick="deleteProductDetail(<?php echo $values['id']?>)" class="btn btn-danger">Eliminar</a></td>
<tr>