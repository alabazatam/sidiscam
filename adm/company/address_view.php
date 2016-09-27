	<?php 
		$Country = new Country();
		$country_list = $Country->getListCountry();
	?>	
<br>
			<a onclick="openAddress();" class="btn btn-success">Agregar dirección <i class="fa fa-plus-circle"></i></a>
<br><br><br>
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="table-responsive">
				<table id="address_details" class="table table-bordered" width='100%'>
						<tr>
							<th>País</th>
							<th>Estado</th>
							<th>Dirección</th>
							<th>Teléfono</th>
							<th>Fax</th>
							<th>Acciones</th>
						</tr>
						<?php if(count($values['company_address_detail'])>0):?>
							<?php foreach($values['company_address_detail'] as $company_address_detail):?>

						<tr id='address_list_<?php echo $company_address_detail['id'];?>'>
							<td>
								<select name='id_country[<?php echo $company_address_detail['id']?>]' id='id_country_<?php echo $company_address_detail['id']?>' onchange="updateCompanyAddressDetail(<?php echo $company_address_detail['id'];?>,'id_country_<?php echo $company_address_detail['id'];?>','id_country')" class="form-control input-sm">
									<option value=''>...</option>
									<?php if(count($country_list)>0):?>
										<?php foreach($country_list as $list):?>
										<option value="<?php echo $list['id_country']?>" <?php if($list['id_country']==$company_address_detail['id_country']) echo "selected='selected'"?> ><?php echo $list['name'];?></option>
										<?php endforeach;?>
									<?php endif;?>
								</select>
							</td>
							<td>
								<input type='text' value="<?php echo $company_address_detail['state']?>" name='state[<?php echo $company_address_detail['id']?>]' id='state_<?php echo $company_address_detail['id']?>' size="15" autocomplete="off" onchange="updateCompanyAddressDetail(<?php echo $company_address_detail['id'];?>,'state_<?php echo $company_address_detail['id'];?>','state')" class="form-control input-sm">
							</td>
							<td>
								<textarea name='address[<?php echo $company_address_detail['id']?>]' id='address_<?php echo $company_address_detail['id']?>' onchange="updateCompanyAddressDetail(<?php echo $company_address_detail['id'];?>,'address_<?php echo $company_address_detail['id'];?>','address')" class="form-control input-sm"><?php echo $company_address_detail['address']?></textarea>
								<!--<input type='text' value="<?php echo $company_address_detail['address']?>" name='address[<?php echo $company_address_detail['id']?>]' id='address_<?php echo $company_address_detail['id']?>' size="80" autocomplete="off" onchange="updateClientsAddressDetail(<?php echo $company_address_detail['id'];?>,'address_<?php echo $company_address_detail['id'];?>','address')">-->
							</td>
							<td>
								<input type='text' value="<?php echo $company_address_detail['tel']?>" name='tel[<?php echo $company_address_detail['id']?>]' id='tel_<?php echo $company_address_detail['id']?>' size="15" autocomplete="off" onchange="updateCompanyAddressDetail(<?php echo $company_address_detail['id'];?>,'tel_<?php echo $company_address_detail['id'];?>','tel')" class="form-control input-sm">
							</td>
							<td>
								<input type='text' value="<?php echo $company_address_detail['fax']?>" name='fax[<?php echo $company_address_detail['id']?>]' id='fax_<?php echo $company_address_detail['id']?>' size="15" autocomplete="off" onchange="updateCompanyAddressDetail(<?php echo $company_address_detail['id'];?>,'fax_<?php echo $company_address_detail['id'];?>','fax')" class="form-control input-sm">
							</td>
							<td>
								<a onclick="deleteAddressDetail(<?php echo $company_address_detail['id']?>)"  class="btn btn-danger">Eliminar</a>
							</td>

						</tr>
							<?php endforeach;?>
						<?php endif;?>
					
				</table>
				</div>
			</div>
			
<script>
function openAddress() {
		
	$.ajax({
		type: "GET",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "address_list_company",id_company: <?php echo $values['id_company']?>},
		success: function(html){
			$('#address_details').append(html);
		}
	});

}

function deleteAddressDetail(id) {
	
	if(confirm("¿Está seguro(a) de eliminar el registro?")){

		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "delete_address_company",id: id},
			success: function(){
				$("#address_list_" + id).remove(); 
			}
		});
		  		
	}else{
		return false;
	}

}

	function updateCompanyAddressDetail(id, column_id,column_name)
	{
		var value = $("#" + column_id).val();
		//alert(value);
		
		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "update_address_company",id: id,column_id:column_id,column_name:column_name,value:value,id_company:<?php echo $values['id_company']?>},
			success: function(){
				// 
			}
		});		
	}



</script>
