	
<br>
			<a onclick="openContainers();" class="btn btn-success">Agregar container <i class="fa fa-plus-circle"></i></a>
<br><br><br>
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<table id="containers_details" class="table-responsive table-bordered" width='100%'>
						<tr>
							<th>Container</th>
							<th>Precinto #</th>
							<th>Acciones</th>

						</tr>
						<?php if(count($values['sales_containers_detail'])>0):?>
							<?php foreach($values['sales_containers_detail'] as $sales_containers_details):?>
							<?php
									$Containers = new Containers();
									$containers_data = $Containers->getContainersById($sales_containers_details);
							
							?>
						<tr id='containers_list_<?php echo $sales_containers_details['id'];?>'>
							<td>
							<input type='hidden' name='id_container[<?php echo $sales_containers_details['id'];?>]' value='<?php echo $sales_containers_details['id_container']?>'>
							<?php echo strtoupper($containers_data['name']);?>
							</td>
							<td><input type='text' value="<?php echo $sales_containers_details['number']?>" name='number[<?php echo $sales_containers_details['id']?>]' id='number_<?php echo $sales_containers_details['id']?>' size="20" autocomplete="off" onchange="updateSalesContainersDetail(<?php echo $sales_containers_details['id'];?>,'number_<?php echo $sales_containers_details['id'];?>','number')"></td>
							<td><a onclick="deleteContainerDetail(<?php echo $sales_containers_details['id']?>)"  class="btn btn-danger">Eliminar</a></td>
						</tr>
							<?php endforeach;?>
						<?php endif;?>
					
				</table>
			</div>
			
<script>
function openContainers() {
		
	$.ajax({
		type: "GET",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "containers_list"},
		success: function(html){
			$('.modal-body').html(html);
			$('.modal-title').html('Containers');
			$('#myModal').modal('show');
		}
	});

}
function addContainers(id_container) {
	$.ajax({
		type: "POST",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "add_container",id_sale: <?php echo $values['id_sale']?>,id_container: id_container},
		success: function(html){
		$('.modal-title').html('Containers');
		$('#containers_details').append(html);
		$('#myModal').modal('toggle');
		}
	});

}

function deleteContainerDetail(id) {
	
	if(confirm("¿Está seguro(a) de eliminar el registro?")){

		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "delete_container",id: id},
			success: function(){
				$("#containers_list_" + id).remove(); 
			}
		});
		  		
	}else{
		return false;
	}

}

	function updateSalesContainersDetail(id, column_id,column_name)
	{
		var value = $("#" + column_id).val();
		
		
		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "update_container",id: id,column_id:column_id,column_name:column_name,value:value,id_sale:<?php echo $values['id_sale']?>},
			success: function(){
				// 
			}
		});		
	}



</script>