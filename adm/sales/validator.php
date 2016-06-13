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
		

		
		
		
		
		
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		
		if($values['status'] == 0)//efectuo validaciones en las pestañas
		{
			
			//valido los productos
			
			if(!isset($values['id_product']))
			{
				$errors['products'] = 'Debe seleccionar por lo menos un producto';
			}else
			{
				foreach ($values['id_product'] as $key => $value) 
				{
					
					if($values['id_product_type'][$key] == '')
					{
						$errors['id_product_type'] = 'Debe seleccionar el tipo de producto';
					}
					if($values['cases'][$key]=='0' or $values['cases'][$key]=='0.00')
					{
						$errors['cases'] = 'Debe llenar el campo cases';
					}
					if($values['packing'][$key]=='0' or $values['packing'][$key]=='0.00' )
					{
						$errors['packing'] = 'Debe llenar el campo packing';
					}
					if($values['quantity'][$key]=='0' or $values['quantity'][$key]=='0.00')
					{
						$errors['quantity'] = 'Debe llenar el campo Qty Kgs';
					}
					if($values['rate'][$key]=='0' or $values['rate'][$key]=='0.00')
					{
						$errors['rate'] = 'Debe llenar el campo rate';
					}
					if($values['amount'][$key]=='0' or $values['amount'][$key]=='0.00')
					{
						$errors['amount'] = 'Debe llenar el campo amount';
					}
				}
			}//fin validación productos
			
			//valido las plantas procesadoras
			
			if(!isset($values['id_plant']))
			{
				$errors['plant'] = 'Debe seleccionar por lo menos una planta procesadora';
			}//fin validación plantas procesadoras		
		
			//valido las granjas
			
			if(!isset($values['id_farm']))
			{
				$errors['farm'] = 'Debe seleccionar por lo menos una granja';
			}//fin validación granjas
					
			//valido los containers
			
			if(!isset($values['id_container']))
			{
				$errors['farm'] = 'Debe seleccionar por lo menos un container';
			}else
			{		
				foreach ($values['id_container'] as $key => $value)
				{
					
					if(@$values['number'][$key]=='')
					{
						$errors['number'] = 'Debe llenar el campo precinto #';
					}					
				}

			}//fin validación granjas
							
		
		}//fin status 0		
		
		
		return $errors;
		
		
	}
	