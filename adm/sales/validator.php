<?php


 
 
	function validate($values){
		$errors = array();
		$validator_values = array();
		
		$validator_values['date_sale'] = array(
			
			"type" => "text",
			"label" => "Fecha de venta",
			"required" => true
		);
		
		$validator_values['id_type_destiny'] = array(
			
			"type" => "number",
			"label" => "Tipo de venta",
			"required" => true
		);
		$validator_values['terms'] = array(
			
			"type" => "text",
			"label" => "Términos de negociación",
			"required" => true
		);
		$validator_values['id_company'] = array(
			
			"type" => "number",
			"label" => "Compañia",
			"required" => true
		);
		$validator_values['id_client'] = array(
			
			"type" => "number",
			"label" => "Cliente",
			"required" => true
		);
		$validator_values['id_broker'] = array(
			
			"type" => "number",
			"label" => "Broker",
			"required" => true
		);
		$validator_values['id_incoterm'] = array(
			
			"type" => "number",
			"label" => "Incoterm",
			"required" => true
		);
		$validator_values['id_incoterm'] = array(
			
			"type" => "number",
			"label" => "Incoterm",
			"required" => true
		);
		$validator_values['id_company_bank'] = array(
			
			"type" => "number",
			"label" => "Cuenta bancaria",
			"required" => true
		);
		$validator_values['id_shipping_lines'] = array(
			
			"type" => "number",
			"label" => "Línea naviera",
			"required" => true
		);		
		$validator_values['id_country_out'] = array(
			
			"type" => "number",
			"label" => "País de salida",
			"required" => true
		);			
		$validator_values['id_port_out'] = array(
			
			"type" => "number",
			"label" => "Puerto de salida",
			"required" => true
		);
		$validator_values['date_out'] = array(
			
			"type" => "text",
			"label" => "Fecha de salida",
			"required" => true
		);		
		
		if($values['status'] == 0)//efectuo validaciones en las pestañas
		{
			
		}
		
		
		
		
		
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		return $errors;
		
		
	}
	