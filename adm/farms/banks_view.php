	<?php 
		$Country = new Country();
		$country_list = $Country->getListCountry();
	?>	
<br>
			<a onclick="openFarmsBanks();" class="btn btn-success">Agregar cuenta bancaria <i class="fa fa-plus-circle"></i></a>
<br><br><br>
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="table-responsive">
				<table id="farms_banks_details" class="table table-bordered" width='100%'>
						<tr>
							<th>Nombre del banco</th>
							<th>Número de cuenta</th>
							<th>País</th>
							<th>RIF</th>
							<th>ABA</th>
							<th>SWIT</th>
							<th>IBAN</th>
							<th>Acciones</th>
						</tr>
						<?php if(count($values['farms_banks_detail'])>0):?>
							<?php foreach($values['farms_banks_detail'] as $farms_banks_detail):?>

						<tr id='farms_banks_list_<?php echo $farms_banks_detail['id'];?>'>
							<td>
								<input type='text' value="<?php echo $farms_banks_detail['bank_name']?>" name='bank_name[<?php echo $farms_banks_detail['id']?>]' id='bank_name_<?php echo $farms_banks_detail['id']?>' size="20" autocomplete="off" onchange="updateFarmsBanksDetail(<?php echo $farms_banks_detail['id'];?>,'bank_name_<?php echo $farms_banks_detail['id'];?>','bank_name')">
							</td>
							<td>
								<input type='text' value="<?php echo $farms_banks_detail['number']?>" name='number[<?php echo $farms_banks_detail['id']?>]' id='number_<?php echo $farms_banks_detail['id']?>' size="20" autocomplete="off" onchange="updateFarmsBanksDetail(<?php echo $farms_banks_detail['id'];?>,'number_<?php echo $farms_banks_detail['id'];?>','number')">
							</td>
							<td>
								<select name='id_country[<?php echo $farms_banks_detail['id']?>]' id='id_country_<?php echo $farms_banks_detail['id']?>' onchange="updateFarmsBanksDetail(<?php echo $farms_banks_detail['id'];?>,'id_country_<?php echo $farms_banks_detail['id'];?>','id_country')">
									<option value=''>...</option>
									<?php if(count($country_list)>0):?>
										<?php foreach($country_list as $list):?>
										<option value="<?php echo $list['id_country']?>" <?php if($list['id_country']==$farms_banks_detail['id_country']) echo "selected='selected'"?> ><?php echo $list['name'];?></option>
										<?php endforeach;?>
									<?php endif;?>
								</select>
							</td>
							<td>
								<input type='text' value="<?php echo $farms_banks_detail['rif']?>" name='rif[<?php echo $farms_banks_detail['id']?>]' id='rif_<?php echo $farms_banks_detail['id']?>' size="20" autocomplete="off" onchange="updateFarmsBanksDetail(<?php echo $farms_banks_detail['id'];?>,'rif_<?php echo $farms_banks_detail['id'];?>','rif')">
							</td>
							<td>
								<input type='text' value="<?php echo $farms_banks_detail['aba']?>" name='aba[<?php echo $farms_banks_detail['id']?>]' id='aba_<?php echo $farms_banks_detail['id']?>' size="20" autocomplete="off" onchange="updateFarmsBanksDetail(<?php echo $farms_banks_detail['id'];?>,'aba_<?php echo $farms_banks_detail['id'];?>','aba')">
							</td>
							<td>
								<input type='text' value="<?php echo $farms_banks_detail['swit']?>" name='swit[<?php echo $farms_banks_detail['id']?>]' id='swit_<?php echo $farms_banks_detail['id']?>' size="20" autocomplete="off" onchange="updateFarmsBanksDetail(<?php echo $farms_banks_detail['id'];?>,'swit_<?php echo $farms_banks_detail['id'];?>','swit')">
							</td>
							<td>
								<input type='text' value="<?php echo $farms_banks_detail['iban']?>" name='iban[<?php echo $farms_banks_detail['id']?>]' id='iban_<?php echo $farms_banks_detail['id']?>' size="20" autocomplete="off" onchange="updateFarmsBanksDetail(<?php echo $farms_banks_detail['id'];?>,'iban_<?php echo $farms_banks_detail['id'];?>','iban')">
							</td>
							<td>
								<a onclick="deleteFarmsBankDetail(<?php echo $farms_banks_detail['id']?>)"  class="btn btn-danger">Eliminar</a>
							</td>
						</tr>
							<?php endforeach;?>
						<?php endif;?>
					
				</table>
				</div>
			</div>
			
<script>
function openFarmsBanks() {
		
	$.ajax({
		type: "GET",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "farms_banks_list",id_farm: <?php echo $values['id_farm']?>},
		success: function(html){
			$('#farms_banks_details').append(html);
		}
	});

}

function deleteFarmsBankDetail(id) {
	
	if(confirm("¿Está seguro(a) de eliminar el registro?")){

		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "delete_farms_bank",id: id},
			success: function(){
				$("#farms_banks_list_" + id).remove(); 
			}
		});
		  		
	}else{
		return false;
	}

}

	function updateFarmsBanksDetail(id, column_id,column_name)
	{
		var value = $("#" + column_id).val();
		
		
		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "update_farms_bank",id: id,column_id:column_id,column_name:column_name,value:value,id_company:<?php echo $values['id_farm']?>},
			success: function(){
				// 
			}
		});		
	}



</script>