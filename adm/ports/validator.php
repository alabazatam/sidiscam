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

		$validator_values['id_country'] = array(
			
			"type" => "number",
			"label" => "País",
			"required" => true
		);
		$validator_values['description'] = array(
			
			"minlength" => 3,
			"maxlength" => 100,
			"type" => "text",
			"label" => "Descripción",
			"required" => false
		);
		$validator_values['abr'] = array(
			
			"minlength" => 1,
			"maxlength" => 10,
			"type" => "text",
			"label" => "Abreviatura",
			"required" => false
		);
		$validator_values['cod_port'] = array(
			
			"minlength" => 2,
			"maxlength" => 10,
			"type" => "text",
			"label" => "Código",
			"required" => false
		);
		
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		return $errors;
		
		
	}
	