<?php 
$Plants = new Plants();
$plants_list = $Plants->getPlantsListSelect(); 
$Farms = new Farms();
$farms_list = $Farms->getFarmsListSelect(); 
$Brokers = new Brokers();
$brokers_list = $Brokers->getListBrokers(); 
?>
<tr id='products_list_<?php echo $values['id'];?>'>
	<td>
	<input type='hidden' name='id_product[<?php echo $values['id']?>]' value='<?php echo $products_data['id_product']?>'>
	<?php echo strtoupper($products_data['name']);?>
	</td>
        <td>
		<select name='id_plant[<?php echo $values['id']?>]' id='id_plant_<?php echo $values['id']?>' onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'id_plant_<?php echo $values['id'];?>','id_plant')">
			<option value=''>...</option>
			<?php if(count($plants_list)>0):?>
				<?php foreach($plants_list as $list):?>
                                    <option value='<?php echo $list['id_plant']?>'><?php echo $list['name']?></option>
				<?php endforeach;?>
			<?php endif;?>
		</select>        
        </td>
        <td>
		<select name='id_farm[<?php echo $values['id']?>]' id='id_farm_<?php echo $values['id']?>' onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'id_farm_<?php echo $values['id'];?>','id_farm')">
			<option value=''>...</option>
			<?php if(count($farms_list)>0):?>
				<?php foreach($farms_list as $list):?>
                                    <option value='<?php echo $list['id_farm']?>'><?php echo $list['name']?></option>
				<?php endforeach;?>
			<?php endif;?>
		</select>        
        </td>
         <td>
		<select name='id_broker[<?php echo $values['id']?>]' id='id_broker_<?php echo $values['id']?>' onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'id_broker_<?php echo $values['id'];?>','id_broker')">
			<option value=''>...</option>
			<?php if(count($brokers_list)>0):?>
				<?php foreach($brokers_list as $list):?>
                                    <option value='<?php echo $list['id_broker']?>'><?php echo $list['name']?></option>
				<?php endforeach;?>
			<?php endif;?>
		</select>        
        </td>
        <td>
            <input type='text'  name='precinto[<?php echo $values['id']?>]' id='precinto_<?php echo $values['id']?>' size="4" autocomplete="off" onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'precinto_<?php echo $values['id'];?>','precinto')">
        </td>
        <td>
            <input type='text'  name='number[<?php echo $values['id']?>]' id='number_<?php echo $values['id']?>' size="4" autocomplete="off" onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'number_<?php echo $values['id'];?>','number')">
        </td>
        <td>
            <input type='text'  name='comision[<?php echo $values['id']?>]' id='comision_<?php echo $values['id']?>' size="4" autocomplete="off" onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'comision_<?php echo $values['id'];?>','comision')">
        </td>
	<td>
		
		<select name='id_product_type[<?php echo $values['id']?>]' id='id_product_type_<?php echo $values['id']?>' onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'id_product_type_<?php echo $values['id'];?>','id_product_type')">
			<option value=''>...</option>
			<?php if(count($products_type_list)>0):?>
				<?php foreach($products_type_list as $list):?>
				<option value='<?php echo $list['id_product_type']?>'><?php echo $list['name']?></option>
				<?php endforeach;?>
			<?php endif;?>
		</select>
	
	
	</td>
        <td><input type='number' min="0" value="0" name='cases[<?php echo $values['id']?>]' id='cases_<?php echo $values['id']?>' size="4" autocomplete="off" onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'cases_<?php echo $values['id'];?>','cases')"></td>
	<td><input type='number' min="0" value="0" name='packing[<?php echo $values['id']?>]' id='packing_<?php echo $values['id']?>' size="4" autocomplete="off" onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'packing_<?php echo $values['id'];?>','packing')"></td>
	<td><input type='text' min="0" value="0" readonly="readonly" name='quantity[<?php echo $values['id']?>]' id='quantity_<?php echo $values['id']?>' size="4" autocomplete="off" onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'quantity_<?php echo $values['id'];?>','quantity')"></td>
	<td><input type='number' min="0.00" step="0.01" value="0" name='rate[<?php echo $values['id']?>]' id='rate_<?php echo $values['id']?>' size="4" autocomplete="off" onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'rate_<?php echo $values['id'];?>','rate')"></td>
	<td><input type='text' min="0" step="0.01" value="0" readonly="readonly" name='amount[<?php echo $values['id']?>]' id='amount_<?php echo $values['id']?>' size="6" autocomplete="off" onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'amount_<?php echo $values['id'];?>','amount')"></td>
	<td><input type='text' min="0" value="" name='note[<?php echo $values['id']?>]' id='note_<?php echo $values['id']?>' size="20" autocomplete="off" onchange="updateSalesProductsDetail(<?php echo $values['id'];?>,'note_<?php echo $values['id'];?>','note')"></td>
	<td><a onclick="deleteProductDetail(<?php echo $values['id']?>)" class="btn btn-danger">Eliminar</a></td>
</tr>