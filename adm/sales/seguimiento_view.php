						<div class="form-group">
							<div class="col-sm-6  col-md-6">
								<label for="">Fecha efectiva de salida <small class="text-danger">(*)</small></label>
								<input id = "datetimepicker4" type="date" autocomplete="off" class="form-control input-sm datetimepicker1" id="" placeholder="" name="date_in_real" value="<?php if(isset($values['date_in_real'])) echo $values['date_in_real']?>">
								<?php if(isset($values['errors']['date_in_real']) and $values['errors']['date_in_real']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['date_in_real']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-6  col-md-6">
								<label for="">Fecha efectiva de llegada <small class="text-danger">(*)</small></label>
								<input id = "datetimepicker5" type="date" autocomplete="off" class="form-control input-sm datetimepicker1" id="" placeholder="" name="date_out_real" value="<?php if(isset($values['date_out_real'])) echo $values['date_out_real']?>">
								<?php if(isset($values['errors']['date_out_real']) and $values['errors']['date_out_real']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['date_out_real']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-12  col-md-12">
								<label for="">Observación <small class="text-danger">(*)</small></label>
                                                                <textarea class="form-control input-sm datetimepicker1" id="" placeholder="" name="observacion_seguimiento"><?php if(isset($values['observacion_seguimiento'])) echo $values['observacion_seguimiento'];?></textarea>
								<?php if(isset($values['errors']['observacion_seguimiento']) and $values['errors']['observacion_seguimiento']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['observacion_seguimiento']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-12  col-md-12">
								<label for="">Estatus seguimiento</label>
								<select name="follow_status" class="form-control input-sm">
									<option value="">Seleccione...</option>									
									<option value="Factura Entregada" <?php if(isset($values['follow_status']) and $values['follow_status'] == "Factura Entregada" ) echo "selected = 'selected'" ?>>Factura Entregada</option>
									<option value="Factura devuelta" <?php if(isset($values['follow_status']) and $values['follow_status'] == "Factura devuelta" ) echo "selected = 'selected'" ?>>Factura devuelta</option>
									<option value="Factura aceptada por el cliente" <?php if(isset($values['follow_status']) and $values['follow_status'] == "Factura aceptada por el cliente" ) echo "selected = 'selected'" ?>>Factura aceptada por el cliente</option>
									<option value="Factura Pagada" <?php if(isset($values['follow_status']) and $values['follow_status'] == "Factura Pagada" ) echo "selected = 'selected'" ?>>Factura Pagada</option>
								</select>
								<?php if(isset($values['errors']['follow_status']) and $values['errors']['follow_status']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['follow_status']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-6  col-md-6">
								<label for="">Monto pagado a la fecha </label>
								<input id = "follow_amount" type="text" min="0"  step="0.01" autocomplete="off" class="form-control input-sm" id="" placeholder="" name="follow_amount" value="<?php if(isset($values['follow_amount'])) echo $values['follow_amount']?>">
								<?php if(isset($values['errors']['follow_amount']) and $values['errors']['follow_amount']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['follow_amount']?></label>
								<?php endif;?>
							</div>
							<div class="col-sm-6  col-md-6">
								<label for="">Fecha de actualización de monto </label>
								<input id = "datetimepicker6" type="date" autocomplete="off" class="form-control input-sm datetimepicker1" id="" placeholder="" name="follow_update" value="<?php if(isset($values['follow_update'])) echo $values['follow_update']?>">
								<?php if(isset($values['errors']['follow_update']) and $values['errors']['follow_update']!=''):?>
									<label class="alert alert-danger"><?php echo $values['errors']['follow_update']?></label>
								<?php endif;?>
							</div>

					</div>
