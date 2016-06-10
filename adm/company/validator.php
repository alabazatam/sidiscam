<?php


 
 
	function validate($values){
		$errors = array();
		$validator_values = array();
		
		$validator_values['description'] = array(
			
			"minlength" => 3,
			"maxlength" => 100,
			"type" => "text",
			"label" => "Nombre",
			"required" => true
		);
		$validator_values['owner'] = array(
			
			"minlength" => 3,
			"maxlength" => 100,
			"type" => "text",
			"label" => "Nombre del responsable",
			"required" => true
		);
		$validator_values['ci_owner'] = array(
			
			"minlength" => 1,
			"maxlength" => 10,
			"type" => "text",
			"label" => "Cédula del responsable",
			"required" => true
		);
		$validator_values['rif'] = array(
			
			"minlength" => 1,
			"maxlength" => 20,
			"type" => "text",
			"label" => "Identificador fiscal",
			"required" => true
		);
		$validator_values['id_country'] = array(
			
			"type" => "number",
			"label" => "País",
			"required" => true
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
			"label" => "Teléfono Principal",
			"required" => true
		);
		$validator_values['phone2'] = array(
			
			"minlength" => 10,
			"maxlength" => 11,
			"type" => "text",
			"label" => "Teléfono Secundario",
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
		$validator_values['contact1'] = array(
			
			"minlength" => 4,
			"maxlength" => 100,
			"type" => "text",
			"label" => "Contacto principal",
			"required" => true
		);
		$validator_values['phone_contact1'] = array(
			
			"minlength" => 10,
			"maxlength" => 11,
			"type" => "text",
			"label" => "Teléfono del contacto principal",
			"required" => true
		);	
		$validator_values['email_contact1'] = array(
			
			"minlength" => 10,
			"maxlength" => 100,
			"type" => "email",
			"label" => "Correo electrónico del contacto principal",
			"required" => true
		);
		$validator_values['contact2'] = array(
			
			"minlength" => 4,
			"maxlength" => 100,
			"type" => "text",
			"label" => "Contacto secundario",
			"required" => false
		);
		$validator_values['phone_contact2'] = array(
			
			"minlength" => 10,
			"maxlength" => 11,
			"type" => "text",
			"label" => "Teléfono del contacto secundario",
			"required" => false
		);	
		$validator_values['email_contact2'] = array(
			
			"minlength" => 10,
			"maxlength" => 100,
			"type" => "email",
			"label" => "Correo electrónico del contacto secundario",
			"required" => false
		);
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		return $errors;
		
		
	}
	