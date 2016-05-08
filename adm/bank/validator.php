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
		$validator_values['id_country'] = array(
			
			"type" => "number",
			"label" => "País",
			"required" => true
		);
		$validator_values['id_table'] = array(
			
			"type" => "number",
			"label" => "Maestro",
			"required" => true
		);
		$validator_values['phone1'] = array(
			
			"minlength" => 10,
			"maxlength" => 11,
			"type" => "number",
			"label" => "Teléfono 1",
			"required" => true
		);
		$validator_values['phone2'] = array(
			
			"minlength" => 10,
			"maxlength" => 11,
			"type" => "text",
			"label" => "Teléfono 2",
			"required" => false
		);
		$validator_values['email1'] = array(
			
			"minlength" => 10,
			"maxlength" => 100,
			"type" => "email",
			"label" => "Correo electrónico principal",
			"required" => true
		);
		$validator_values['email2'] = array(
			
			"minlength" => 10,
			"maxlength" => 100,
			"type" => "email",
			"label" => "Correo electrónico alternativo",
			"required" => false
		);
		$validator_values['account_number'] = array(
			
			"minlength" => 20,
			"maxlength" => 20,
			"type" => "number",
			"label" => "Número de cuenta",
			"required" => true
		);
		$validator_values['aba'] = array(
			
			"minlength" => 1,
			"maxlength" => 20,
			"type" => "text",
			"label" => "ABA",
			"required" => false
		);
		$validator_values['swif'] = array(
			
			"minlength" => 1,
			"maxlength" => 20,
			"type" => "text",
			"label" => "swif",
			"required" => false
		);
		$validator_values['iban'] = array(
			
			"minlength" => 1,
			"maxlength" => 20,
			"type" => "text",
			"label" => "swif",
			"required" => false
		);		
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		return $errors;
		
		
	}
	