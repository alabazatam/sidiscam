	<?php 
		$Country = new Country();
		$country_list = $Country->getListCountry();
	?>

		<tr id='address_list_<?php echo $values['id'];?>'>

			<td>
				<select name='id_country[<?php echo $values['id']?>]' id='id_country_<?php echo $values['id']?>' onchange="updateClientsAddressDetail(<?php echo $values['id'];?>,'id_country_<?php echo $values['id'];?>','id_country')">
					<option value=''>...</option>
					<?php if(count($country_list)>0):?>
						<?php foreach($country_list as $list):?>
						<option value="<?php echo $list['id_country']?>" ><?php echo $list['name'];?></option>
						<?php endforeach;?>
					<?php endif;?>
				</select>
			</td>
			<td>
				<textarea  name='address[<?php echo $values['id']?>]' id='address_<?php echo $values['id']?>' onchange="updateClientsAddressDetail(<?php echo $values['id'];?>,'address_<?php echo $values['id'];?>','address')"></textarea>
			</td>
			<td>
				<a onclick="deleteAddressDetail(<?php echo $values['id']?>)" class="btn btn-danger">Eliminar</a>
			</td>
		</tr>

