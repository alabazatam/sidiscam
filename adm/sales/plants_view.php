	
<br>
			<a onclick="openPlants();" class="btn btn-success">Agregar planta procesadora <i class="fa fa-plus-circle"></i></a>
<br><br><br>
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<table id="plants_details" class="table-responsive table-bordered" width='100%'>
						<tr>
							<th>Planta procesadora</th>
							<th>Acciones</th>

						</tr>
						<?php if(count($values['sales_plants_detail'])>0):?>
							<?php foreach($values['sales_plants_detail'] as $sales_plants_details):?>
							<?php
									$Plants = new Plants();
									$plants_data = $Plants->getPlantsById($sales_plants_details);
							
							?>
						<tr id='plants_list_<?php echo $sales_plants_details['id'];?>'>
							<td>
							<input type='hidden' name='id_plant[<?php echo $sales_plants_details['id'];?>]' value='<?php echo $sales_plants_details['id_plant']?>'>
							<?php echo strtoupper($plants_data['name']);?>
							</td>
							<td><a onclick="deletePlantDetail(<?php echo $sales_plants_details['id']?>)"  class="btn btn-danger">Eliminar</a></td>
						</tr>
							<?php endforeach;?>
						<?php endif;?>
					
				</table>
			</div>
			
<script>
function openPlants() {
		
	$.ajax({
		type: "GET",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "plants_list"},
		success: function(html){
			$('.modal-body').html(html);
			$('.modal-title').html('Plantas procesadoras');
			$('#myModal').modal('show');
		}
	});

}
function addPlants(id_plant) {
	$.ajax({
		type: "POST",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "add_plant",id_sale: <?php echo $values['id_sale']?>,id_plant: id_plant},
		success: function(html){
		$('.modal-title').html('Plantas procesadoras');
		$('#plants_details').append(html);
		$('#myModal').modal('toggle');
		}
	});

}

function deletePlantDetail(id) {
	
	if(confirm("¿Está seguro(a) de eliminar el registro?")){

		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "delete_plant",id: id},
			success: function(){
				$("#plants_list_" + id).remove(); 
			}
		});
		  		
	}else{
		return false;
	}

}




</script>