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
			
			"minlength" => 1,
			"maxlength" => 10,
			"type" => "text",
			"label" => "Abreviatura",
			"required" => false
		);
		$validator_values['address'] = array(
			
			"minlength" => 5,
			"maxlength" => 100,
			"type" => "text",
			"label" => "Dirección",
			"required" => true
		);
		$validator_values['phone1'] = array(
			
			"minlength" => 10,
			"maxlength" => 11,
			"type" => "number",
			"label" => "Teléfono principal",
			"required" => true
		);
		$validator_values['phone2'] = array(
			
			"minlength" => 10,
			"maxlength" => 11,
			"type" => "text",
			"label" => "Teléfono secundario",
			"required" => false
		);
		$validator_values['email1'] = array(
			
			"minlength" => 10,
			"maxlength" => 100,
			"type" => "email",
			"label" => "Correo electrónico principal",
			"required" => false
		);
		$validator_values['email2'] = array(
			
			"minlength" => 10,
			"maxlength" => 100,
			"type" => "email",
			"label" => "Correo electrónico alternativo",
			"required" => false
		);
		
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		return $errors;
		
		
	}
	