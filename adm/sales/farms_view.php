	
<br>
			<a onclick="openFarms();" class="btn btn-success">Agregar granja <i class="fa fa-plus-circle"></i></a>
<br><br><br>
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<table id="farms_details" class="table-responsive table-bordered" width='100%'>
						<tr>
							<th>Granja</th>
							<th>Acciones</th>

						</tr>
						<?php if(count($values['sales_farms_detail'])>0):?>
							<?php foreach($values['sales_farms_detail'] as $sales_farms_details):?>
							<?php
									$Farms = new Farms();
									$farms_data = $Farms->getFarmsById($sales_farms_details);
							
							?>
						<tr id='farms_list_<?php echo $sales_farms_details['id'];?>'>
							<td>
							<input type='hidden' name='id_farm[<?php echo $sales_farms_details['id'];?>]' value='<?php echo $sales_farms_details['id_farm']?>'>
							<?php echo strtoupper($farms_data['name']);?>
							</td>
							<td><a onclick="deleteFarmDetail(<?php echo $sales_farms_details['id']?>)"  class="btn btn-danger">Eliminar</a></td>
						</tr>
							<?php endforeach;?>
						<?php endif;?>
					
				</table>
			</div>
			
<script>
function openFarms() {
		
	$.ajax({
		type: "GET",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "farms_list"},
		success: function(html){
			$('.modal-body').html(html);
			$('.modal-title').html('Granjas');
			$('#myModal').modal('show');
		}
	});

}
function addFarms(id_farm) {
	$.ajax({
		type: "POST",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "add_farm",id_sale: <?php echo $values['id_sale']?>,id_farm: id_farm},
		success: function(html){
		$('.modal-title').html('Granjas');
		$('#farms_details').append(html);
		$('#myModal').modal('toggle');
		}
	});

}

function deleteFarmDetail(id) {
	
	if(confirm("¿Está seguro(a) de eliminar el registro?")){

		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "delete_farm",id: id},
			success: function(){
				$("#farms_list_" + id).remove(); 
			}
		});
		  		
	}else{
		return false;
	}

}




</script>