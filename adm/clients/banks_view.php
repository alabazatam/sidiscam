	<?php 
		$Country = new Country();
		$country_list = $Country->getListCountry();
	?>	
<br>
			<a onclick="openBanks();" class="btn btn-success">Agregar cuenta bancaria <i class="fa fa-plus-circle"></i></a>
<br><br><br>
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<table id="banks_details" class="table-responsive table-bordered" width='100%'>
						<tr>
							<th>Nombre del banco</th>
							<th>Número de cuenta</th>
							<th>País</th>
							<th>ABA</th>
							<th>SWIT</th>
							<th>IBAN</th>
							<th>Acciones</th>
						</tr>
						<?php if(count($values['clients_banks_detail'])>0):?>
							<?php foreach($values['clients_banks_detail'] as $clients_banks_details):?>

						<tr id='banks_list_<?php echo $clients_banks_details['id'];?>'>
							<td>
								<input type='text' value="<?php echo $clients_banks_details['bank_name']?>" name='bank_name[<?php echo $clients_banks_details['id']?>]' id='bank_name_<?php echo $clients_banks_details['id']?>' size="20" autocomplete="off" onchange="updateClientsBanksDetail(<?php echo $clients_banks_details['id'];?>,'bank_name_<?php echo $clients_banks_details['id'];?>','bank_name')">
							</td>
							<td>
								<input type='text' value="<?php echo $clients_banks_details['number']?>" name='number[<?php echo $clients_banks_details['id']?>]' id='number_<?php echo $clients_banks_details['id']?>' size="20" autocomplete="off" onchange="updateClientsBanksDetail(<?php echo $clients_banks_details['id'];?>,'number_<?php echo $clients_banks_details['id'];?>','number')">
							</td>
							<td>
								<select name='id_country[<?php echo $values['id']?>]' id='id_country_<?php echo $clients_banks_details['id']?>' onchange="updateClientsBanksDetail(<?php echo $clients_banks_details['id'];?>,'id_country_<?php echo $clients_banks_details['id'];?>','id_country')">
									<option value=''>...</option>
									<?php if(count($country_list)>0):?>
										<?php foreach($country_list as $list):?>
										<option value="<?php echo $list['id_country']?>" <?php if($list['id_country']==$clients_banks_details['id_country']) echo "selected='selected'"?> ><?php echo $list['name'];?></option>
										<?php endforeach;?>
									<?php endif;?>
								</select>
							</td>
							<td>
								<input type='text' value="<?php echo $clients_banks_details['aba']?>" name='aba[<?php echo $clients_banks_details['id']?>]' id='aba_<?php echo $clients_banks_details['id']?>' size="20" autocomplete="off" onchange="updateClientsBanksDetail(<?php echo $clients_banks_details['id'];?>,'aba_<?php echo $clients_banks_details['id'];?>','aba')">
							</td>
							<td>
								<input type='text' value="<?php echo $clients_banks_details['swit']?>" name='swit[<?php echo $clients_banks_details['id']?>]' id='swit_<?php echo $clients_banks_details['id']?>' size="20" autocomplete="off" onchange="updateClientsBanksDetail(<?php echo $clients_banks_details['id'];?>,'swit_<?php echo $clients_banks_details['id'];?>','swit')">
							</td>
							<td>
								<input type='text' value="<?php echo $clients_banks_details['iban']?>" name='iban[<?php echo $clients_banks_details['id']?>]' id='iban_<?php echo $clients_banks_details['id']?>' size="20" autocomplete="off" onchange="updateClientsBanksDetail(<?php echo $clients_banks_details['id'];?>,'iban_<?php echo $clients_banks_details['id'];?>','iban')">
							</td>
							<td>
								<a onclick="deleteBankDetail(<?php echo $clients_banks_details['id']?>)"  class="btn btn-danger">Eliminar</a>
							</td>
						</tr>
							<?php endforeach;?>
						<?php endif;?>
					
				</table>
			</div>
			
<script>
function openBanks() {
		
	$.ajax({
		type: "GET",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "banks_list",id_client: <?php echo $values['id_client']?>},
		success: function(html){
			$('#banks_details').append(html);
		}
	});

}

function deleteBankDetail(id) {
	
	if(confirm("¿Está seguro(a) de eliminar el registro?")){

		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "delete_bank",id: id},
			success: function(){
				$("#banks_list_" + id).remove(); 
			}
		});
		  		
	}else{
		return false;
	}

}

	function updateClientsBanksDetail(id, column_id,column_name)
	{
		var value = $("#" + column_id).val();
		
		
		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "update_bank",id: id,column_id:column_id,column_name:column_name,value:value,id_client:<?php echo $values['id_client']?>},
			success: function(){
				// 
			}
		});		
	}



</script>