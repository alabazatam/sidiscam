	<?php 
	$ShippingLines = new ShippingLines();
	$list_shipping_lines = $ShippingLines->getListShippingLines();
	
	$Country = new Country();
	$list_country = $Country->getListCountry($values);
	
	$Ports = new Ports();
	$list_ports = $Ports->getListPorts($values);
	?>				
							
						<div class="form-group">
							<div class="col-sm-12  col-md-4">
								<label for="">Linea naviera <small class="text-danger">(*)</small></label>
										<select name="id_shipping_lines"  class="form-control input-sm">
											<option value="">Seleccione...</option>
										<?php if(count($list_shipping_lines)>0): ?>
											<?php foreach($list_shipping_lines as $list): ?>

													<option value="<?php echo $list['id_shipping_lines'];?>" <?php if($list['id_shipping_lines'] == @$values['id_shipping_lines']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>

											<?php endforeach; ?>
										<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_shipping_lines']) and $values['errors']['id_shipping_lines']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_shipping_lines']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-4 col-md-4">
								<label for="">País de salida <small class="text-danger">(*)</small></label>
								<select name="id_country_out" id="id_country_out" class="form-control input-sm" onchange="selectPortsCountryOut()">
											<option value="">Seleccione...</option>
										<?php if(count($list_country)>0): ?>
											<?php foreach($list_country as $list): ?>

													<option value="<?php echo $list['id_country'];?>" <?php if($list['id_country'] == @$values['id_country_out']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>

											<?php endforeach; ?>
										<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_country_out']) and $values['errors']['id_country_out']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_country_out']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-4  col-md-4">
								<label for="">Puerto de salida <small class="text-danger">(*)</small></label>
										<select name="id_port_out" id="id_port_out" class="form-control input-sm">
											<option value="">Seleccione...</option>

										</select>
								<?php if(isset($values['errors']['id_port_out']) and $values['errors']['id_port_out']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_port_out']?></label>
								<?php endif;?>
							</div>
						
							
							<div class="col-sm-4  col-md-4">
								<label for="">Fecha de salida <small class="text-danger">(*)</small></label>
								<input type="date" autocomplete="off" class="form-control input-sm datetimepicker1" id="" placeholder="" name="date_out" value="<?php if(isset($values['date_out'])) echo $values['date_out']?>">
								<?php if(isset($values['errors']['date_out']) and $values['errors']['date_out']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['date_out']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-4  col-md-4">
								<label for="">País de destino <small class="text-danger">(*)</small></label>
										<select name="id_country_in" id="id_country_in" class="form-control input-sm" onchange="selectPortsCountryIn()">
											<option value="">Seleccione...</option>
										<?php if(count($list_country)>0): ?>
											<?php foreach($list_country as $list): ?>

													<option value="<?php echo $list['id_country'];?>" <?php if($list['id_country'] == @$values['id_country_in']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>

											<?php endforeach; ?>
										<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_country_in']) and $values['errors']['id_country_in']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_country_in']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-4  col-md-4">
								<label for="">Puerto de destino <small class="text-danger">(*)</small></label>
										<select name="id_port_in" id="id_port_in" class="form-control input-sm">
											<option value="">Seleccione...</option>
										</select>
								<?php if(isset($values['errors']['id_port_in']) and $values['errors']['id_port_in']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_port_in']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-4  col-md-4">
								<label for="">Fecha estimada de arribo <small class="text-danger">(*)</small></label>
								<input type="date" autocomplete="off" class="form-control input-sm datetimepicker1" id="" placeholder="" name="date_estimate_in" value="<?php if(isset($values['date_estimate_in'])) echo $values['date_estimate_in']?>">
								<?php if(isset($values['errors']['date_estimate_in']) and $values['errors']['date_estimate_in']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['date_estimate_in']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-12   col-md-12">
								<label for="">Lugar de entrega <small class="text-danger">(*)</small></label>
										<select name="id_client_address" id="id_client_address" class="form-control input-sm">
											<option value="">Seleccione...</option>
										</select>
								<?php if(isset($values['errors']['id_client_address']) and $values['errors']['id_client_address']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_client_address']?></label>
								<?php endif;?>
							</div>	
							<div class="col-sm-6  col-md-6">
								<label for="">Fecha efectiva de envío <small class="text-danger">(*)</small></label>
								<input type="date" autocomplete="off" class="form-control input-sm datetimepicker1" id="" placeholder="" name="date_in_real" value="<?php if(isset($values['date_in_real'])) echo $values['date_in_real']?>">
								<?php if(isset($values['errors']['date_in_real']) and $values['errors']['date_in_real']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['date_in_real']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-6  col-md-6">
								<label for="">Fecha efectiva de arribo <small class="text-danger">(*)</small></label>
								<input type="date" autocomplete="off" class="form-control input-sm datetimepicker1" id="" placeholder="" name="date_out_real" value="<?php if(isset($values['date_out_real'])) echo $values['date_out_real']?>">
								<?php if(isset($values['errors']['date_out_real']) and $values['errors']['date_out_real']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['date_out_real']?></label>
								<?php endif;?>
							</div>

					</div>



<script>


function selectPortsCountryOut() {
	
	var id_country_out = $('#id_country_out').val();
	var id_sale = $('#id_sale').val();
	var type = 'out';
	$.ajax({
		type: "GET",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "select_ports", id_country: id_country_out , id_sale: id_sale,type: type },
		success: function(html){
			$('#id_port_out').html(html);
			
			
		}
	});

}
function selectPortsCountryIn() {
	
	var id_country_in = $('#id_country_in').val();
	var id_sale = $('#id_sale').val();
	var type = 'in';

	$.ajax({
		type: "GET",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "select_ports", id_country: id_country_in , id_sale: id_sale,type: type },
		success: function(html){
			$('#id_port_in').html(html);
			
		}
	});

}
	function selectClientAddress() {

		var id_client = $('#id_client').val();
		var id_sale = $('#id_sale').val();

		$.ajax({
			type: "GET",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "select_client_address", id_client: id_client , id_sale: id_sale },
			success: function(html){
				$('#id_client_address').html(html);
				

			}
		});

	}
</script>