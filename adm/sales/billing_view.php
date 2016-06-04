	<?php 
	$ShippingLines = new ShippingLines();
	$list_shipping_lines = $ShippingLines->getListShippingLines();
	
	$Country = new Country();
	$list_country = $Country->getListCountry($values);
	
	$Ports = new Ports();
	$list_ports = $Ports->getListPorts($values);
	?>				
							
						<div class="form-group">
							<div class="col-sm-12">
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
							<div class="col-sm-4">
								<label for="">País de salida <small class="text-danger">(*)</small></label>
										<select name="id_country_out"  class="form-control input-sm">
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
							<div class="col-sm-4">
								<label for="">Puerto de salida <small class="text-danger">(*)</small></label>
										<select name="id_port_out"  class="form-control input-sm">
											<option value="">Seleccione...</option>
										<?php if(count($list_ports)>0): ?>
											<?php foreach($list_ports as $list): ?>

													<option value="<?php echo $list['id_port'];?>" <?php if($list['id_port'] == @$values['id_port_out']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>

											<?php endforeach; ?>
										<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_port_out']) and $values['errors']['id_port_out']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_port_out']?></label>
								<?php endif;?>
							</div>
						
							
							<div class="col-sm-4">
								<label for="">Fecha de salida <small class="text-danger">(*)</small></label>
								<input type="date" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="date_out" value="<?php if(isset($values['date_out'])) echo $values['date_out']?>">
								<?php if(isset($values['errors']['date_out']) and $values['errors']['date_out']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['date_out']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-4">
								<label for="">País de salida <small class="text-danger">(*)</small></label>
										<select name="id_country_in"  class="form-control input-sm">
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
							<div class="col-sm-4">
								<label for="">Puerto de entrada <small class="text-danger">(*)</small></label>
										<select name="id_port_in"  class="form-control input-sm">
											<option value="">Seleccione...</option>
										<?php if(count($list_ports)>0): ?>
											<?php foreach($list_ports as $list): ?>

													<option value="<?php echo $list['id_port'];?>" <?php if($list['id_port'] == @$values['id_port_in']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>

											<?php endforeach; ?>
										<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_port_in']) and $values['errors']['id_port_in']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_port_in']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-4">
								<label for="">Fecha estimada de arribo <small class="text-danger">(*)</small></label>
								<input type="date" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="date_estimate_in" value="<?php if(isset($values['date_estimate_in'])) echo $values['date_estimate_in']?>">
								<?php if(isset($values['errors']['date_estimate_in']) and $values['errors']['date_estimate_in']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['date_estimate_in']?></label>
								<?php endif;?>
							</div>
							

					</div>
