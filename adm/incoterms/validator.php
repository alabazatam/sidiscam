<?php


 
 
	function validate($values){
		$errors = array();
		$validator_values = array();
		
		$validator_values['name'] = array(
			
			"minlength" => 3,
			"maxlength" => 100,
			"type" => "text",
			"label" => "Término de comercio",
			"required" => true
		);
		$validator_values['abr'] = array(
			
			"minlength" => 3,
			"maxlength" => 3,
			"type" => "text",
			"label" => "Código",
			"required" => true
		);
		$validator_values['detail'] = array(
			
			"minlength" => 3,
			"maxlength" => 400,
			"type" => "text",
			"label" => "Detalle",
			"required" => false
		);
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		return $errors;
		
		
	}
	