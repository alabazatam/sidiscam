<?php include("../../autoload.php");?>	
<?php include("validator.php");?>	
<?php $action = "";
if(isset($_REQUEST["action"]) and $_REQUEST["action"]!=""){
	$action = $_REQUEST["action"];
}

$values = $_REQUEST;
unset($values['PHPSESSID']);
	switch ($action) {
		case "index":
			executeIndex($values);	
		break;
		case "new":
			executeNew($values);	
		break;
		case "add":
			executeSave($values);	
		break;
		case "edit":
			executeEdit($values);	
		break;
		case "update":
			executeUpdate($values);	
		break;		
		case "country_list_json":
			executeCountryListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('country_list_view.php');
	}
	function executeNew($values = null)
	{
        $values['status'] = '1';
		$values['action'] = 'add';
		
		require('country_form_view.php');
	}
	function executeSave($values = null)
	{
		
		$Country = new Country();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('country_form_view.php');die;
		}else{		
			$values = $Country->saveCountry($values);			
			executeEdit($values,message_created);die;
		}
	}
	function executeEdit($values = null,$msg = null)
	{
		$Country = new Country();
		$values = $Country->getCountryById($values);
                $id_country = $values['id_country'];
                $values['action'] = 'update';
                $values['msg'] = $msg;
		$values['errors'] = array();
		require('country_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$Country = new Country();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('country_form_view.php');die;
		}else{		
			$Country->updateCountry($values);			
			executeEdit($values,message_updated);die;
		}
	}	
	function executeCountryListJson($values)
	{
		$Country = new Country();
		$country_list_json = $Country ->getCountryList($values);
		$country_list_json_cuenta = $Country ->getCountCountryList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $country_list_json_cuenta;
		$array_json['recordsFiltered'] = $country_list_json_cuenta;
		if(count($country_list_json)>0)
		{
			foreach ($country_list_json as $country) 
			{
				$status = $country['status'];
				$id_country= $country['id_country'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'><a href='#' onclick = ".'"'."status_changer('country','id_country', '$id_country','1')".'"'.">Desactivado</a></label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'><a href='#' onclick = ".'"'."status_changer('country','id_country', '$id_country','0')".'"'.">Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_country" => $id_country,
					"name" => $country['name'],
					"abr" => $country['abr'],
					"status" => $message_status,
					"date_created" => $country['date_created'],
					"date_updated" => $country['date_updated'],
					"actions" => 
                                       
                                       '<form method="POST" action = "'.full_url.'/adm/country/index.php" >'
                                       .'<input type="hidden" name="action" value="edit">  '
                                       .'<input type="hidden" name="id_country" value="'.$id_country.'">  '
                                       .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                       .'</form>'
					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_country"=>null,"name"=>"","abr"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}