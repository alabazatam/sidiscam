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

					</div>