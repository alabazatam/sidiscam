	<?php 
	$Incoterms = new Incoterms();
	$list_incoterms = $Incoterms->getListIncoterms();
	
	$Brokers = new Brokers();
	$list_brokers = $Brokers->getListBrokers($values);
	
	$Company = new Company();
	$list_company = $Company->getListCompany();
	?>					


					<div class="form-group">
						<div class="col-sm-3">
							<label for="">Id</label>
							<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" placeholder="" name="id_sale" id="id_sale" value="<?php if(isset($values['id_sale'])) echo $values['id_sale']?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<label for="">Fecha de venta<small class="text-danger">(*)</small></label>
							<input type="date" autocomplete="off" class="form-control input-sm datetimepicker1"  placeholder="" name="date_sale" value="<?php if(isset($values['date_sale'])) echo $values['date_sale']?>">
							
							<?php if(isset($values['errors']['date_sale']) and $values['errors']['date_sale']!=''):?>
								<label class="alert alert-danger"><?php echo $values['errors']['date_sale']?></label>
							<?php endif;?>
						</div>
							<div class="col-sm-4">
								<label for="">Compañia <small class="text-danger">(*)</small></label>
										<select name="id_company" id="id_company" class="form-control input-sm" onchange="selectCompanyBank();">
											<option value="">Seleccione...</option>
											<?php if(count($list_company)>0): ?>
												<?php foreach($list_company as $list): ?>

														<option value="<?php echo $list['id_company'];?>" <?php if($list['id_company'] == @$values['id_company']) echo "selected = 'selected'" ?>><?php echo $list['description'];?></option>

												<?php endforeach; ?>
											<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_type_destiny']) and $values['errors']['id_type_destiny']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_type_destiny']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-4">
								<label for="">Cliente <small class="text-danger">(*)</small></label>
										<select name="id_client" id="id_client" class="form-control input-sm" onchange="selectClientAddress()">
											<option value="">Seleccione...</option>
										<?php if(count($list_clients)>0): ?>
											<?php foreach($list_clients as $list): ?>

													<option value="<?php echo $list['id_client'];?>" <?php if($list['id_client'] == @$values['id_client']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>

											<?php endforeach; ?>
										<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_type_destiny']) and $values['errors']['id_type_destiny']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_type_destiny']?></label>
								<?php endif;?>
							</div>
					</div>
					<div class="form-group">
							<div class="col-sm-4">
								<label for="">Tipo de venta <small class="text-danger">(*)</small></label>
										<select name="id_type_destiny"  class="form-control input-sm">
											<option value="">Seleccione...</option>
										<?php if(count($list_destiny)>0): ?>
											<?php foreach($list_destiny as $list): ?>

													<option value="<?php echo $list['id_type_destiny'];?>" <?php if($list['id_type_destiny'] == @$values['id_type_destiny']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>

											<?php endforeach; ?>
										<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_type_destiny']) and $values['errors']['id_type_destiny']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_type_destiny']?></label>
								<?php endif;?>
							</div>
								<div class="col-sm-4">
									<label for="">Términos de negociación<small class="text-danger">(*)</small></label>
									<textarea class="form-control input-sm" id="terms" placeholder="" name="terms"><?php if(isset($values['terms'])) echo $values['terms']?></textarea>
									<?php if(isset($values['errors']['terms']) and $values['errors']['terms']!=''):?>
										<label class="alert alert-danger"><?php echo $values['errors']['terms']?></label>
									<?php endif;?>
								</div>
								<div class="col-sm-4">
									<label for="">Comisión comercial<small class="text-danger">(*)</small></label>
									<input type="text" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="comision" value="<?php if(isset($values['comision'])) echo $values['comision']?>">
									<?php if(isset($values['errors']['comision']) and $values['errors']['comision']!=''):?>
										<label class="alert alert-danger"><?php echo $values['errors']['comision']?></label>
									<?php endif;?>
								</div>

					</div>


<!-- Otros datos de venta-->


							<div class="form-group">
							<div class="col-sm-4">
								<label for="">Incoterm <small class="text-danger">(*)</small></label>
										<select name="id_incoterm"  class="form-control input-sm">
											<option value="">Seleccione...</option>
										<?php if(count($list_incoterms)>0): ?>
											<?php foreach($list_incoterms as $list): ?>

													<option value="<?php echo $list['id_incoterm'];?>" <?php if($list['id_incoterm'] == @$values['id_incoterm']) echo "selected = 'selected'" ?>><?php echo $list['abr'];?> - <?php echo $list['name'];?></option>

											<?php endforeach; ?>
										<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_incoterm']) and $values['errors']['id_incoterm']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_incoterm']?></label>
								<?php endif;?>
							</div>

							<div class="col-sm-4">
								<label for="">Broker <small class="text-danger">(*)</small></label>
										<select name="id_broker"  class="form-control input-sm">
											<option value="">Seleccione...</option>
										<?php if(count($list_brokers)>0): ?>
											<?php foreach($list_brokers as $list): ?>

													<option value="<?php echo $list['id_broker'];?>" <?php if($list['id_broker'] == @$values['id_broker']) echo "selected = 'selected'" ?>><?php echo $list['name'];?></option>

											<?php endforeach; ?>
										<?php endif; ?>
										</select>
								<?php if(isset($values['errors']['id_broker']) and $values['errors']['id_broker']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_broker']?></label>
								<?php endif;?>
							</div>
								<div class="col-sm-4">
									<label for="">Observación<small class="text-danger">(*)</small></label>
									<textarea class="form-control input-sm" id="note_sale" placeholder="" name="note_sale"><?php if(isset($values['note_sale'])) echo $values['note_sale']?></textarea>
									<?php if(isset($values['errors']['note_sale']) and $values['errors']['note_sale']!=''):?>
										<label class="alert alert-danger"><?php echo $values['errors']['note_sale']?></label>
									<?php endif;?>
								</div>
							</div>
							<div class="form-group">
							<div class="col-sm-4">
								<label for="">Cuenta bancaria <small class="text-danger">(*)</small></label>
										<select name="id_company_bank" id="id_company_bank" class="form-control input-sm">
											<option value="">Seleccione...</option>

										</select>
								<?php if(isset($values['errors']['id_company_bank']) and $values['errors']['id_company_bank']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['id_company_bank']?></label>
								<?php endif;?>
							</div>
							</div>
<!--Fin otros datos de venta-->




					<div class="form-group">
						<div class="col-sm-4">
						  <label class="label label-danger">
							<input type="radio" name="status" id="status" value="0" <?php if(isset($values['status']) and $values['status'] =='0' ) echo "checked=checked"?>>
							Venta completada
						  </label>
						</div>
						<div class="col-sm-4">
						  <label class="label label-success">
							<input type="radio" name="status" id="status" value="1" <?php if(isset($values['status']) and $values['status'] =='1' ) echo "checked=checked"?>>
							En transcripción
						  </label>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-sm-4">
							<label autocomplete="off" for="">Fecha creado</label>
							<input autocomplete="off"  type="text" readonly="readonly" class="form-control input-sm" id="" placeholder="" name="date_created" value="<?php if(isset($values['date_created'])) echo $values['date_created']?>">
						</div>
						<div class="col-sm-6">
							<label for="">Fecha modificado</label>
							<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="date_updated" value="<?php if(isset($values['date_updated'])) echo $values['date_updated']?>">
						</div>
					</div>


<script>
	function selectCompanyBank() {

		var id_company = $('#id_company').val();
		var id_sale = $('#id_sale').val();

		$.ajax({
			type: "GET",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "select_company_bank", id_company: id_company , id_sale: id_sale },
			success: function(html){
				$('#id_company_bank').html(html);
				

			}
		});

	}




</script>
