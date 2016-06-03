					<div class="form-group">
						<div class="col-sm-3">
							<label for="">Id</label>
							<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="id_sale" value="<?php if(isset($values['id_sale'])) echo $values['id_sale']?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<label for="">Fecha de venta<small class="text-danger">(*)</small></label>
							<input type="date" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="date_sale" value="<?php if(isset($values['date_sale'])) echo $values['date_sale']?>">
							<?php if(isset($values['errors']['date_sale']) and $values['errors']['date_sale']!=''):?>
								<label class="alert alert-danger"><?php echo $values['errors']['date_sale']?></label>
							<?php endif;?>
						</div>
					</div>
					<div class="form-group">
							<div class="col-sm-6">
								<label for="">Cliente <small class="text-danger">(*)</small></label>
										<select name="id_client"  class="form-control input-sm">
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
							<div class="col-sm-6">
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

					</div>
					<div class="form-group">
						<div class="col-sm-4">
						  <label class="label label-danger">
							<input type="radio" name="status" id="status" value="0" <?php if(isset($values['status']) and $values['status'] =='0' ) echo "checked=checked"?>>
							Completar venta
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