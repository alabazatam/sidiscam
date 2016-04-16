<?php


 
 
	function validate($values){
		$errors = array();
		$validator_values = array();
		
		$validator_values['name'] = array(
			
			"minlength" => 3,
			"maxlength" => 100,
			"type" => "text",
			"label" => "nombre",
			"required" => true
		);
		$validator_values['abr'] = array(
			
			"minlength" => 1,
			"maxlength" => 10,
			"type" => "text",
			"label" => "Abreviatura",
			"required" => false
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
	