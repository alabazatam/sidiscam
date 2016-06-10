<?php


 
 
	function validate($values){
		$errors = array();
		$validator_values = array();
		
		$validator_values['name'] = array(
			
			"minlength" => 3,
			"maxlength" => 100,
			"type" => "text",
			"label" => "Nombre",
			"required" => true
		);
		$validator_values['abr'] = array(
			
			"minlength" => 3,
			"maxlength" => 3,
			"type" => "text",
			"label" => "Abreviatura",
			"required" => true
		);
		$validator_values['id_region'] = array(
			
			"type" => "number",
			"label" => "Región",
			"required" => true
		);
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		return $errors;
		
		
	}
	