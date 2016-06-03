<?php


 
 
	function validate($values){
		$errors = array();
		$validator_values = array();
		
		$validator_values['id_type_destiny'] = array(
			
			"type" => "number",
			"label" => "Tipo de venta",
			"required" => true
		);
		$validator_values['date_sale'] = array(
			
			"type" => "text",
			"label" => "Fecha de venta",
			"required" => true
		);
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		return $errors;
		
		
	}
	