<?php include("../../autoload.php");?>	
<?php include("validator.php");?>
<?php include("../security/security.php");?>
<?php $action = "";

if(isset($_REQUEST["action"]) and $_REQUEST["action"]!=""){
	$action = $_REQUEST["action"];
}

$values = $_REQUEST;
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
		case "farms_list_json":
			executeFarmsListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('farms_list_view.php');
	}
	function executeNew($values = null)
	{
		$values['action'] = 'add';
                $values['status'] = 1;
				$values['errors'] = array();
		require('farms_form_view.php');
	}
	function executeSave($values = null)
	{
		$Messages = new Messages();
		$Farms = new Farms();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('farms_form_view.php');die;
		}else{		
			$values = $Farms->saveFarms($values);			
			executeEdit($values,message_created);die;
		}
	}
	function executeEdit($values = null,$msg = null)
	{
		
		$Farms = new Farms();
        $values = $Farms->getFarmsById($values);
		
		$FarmsBanksDetail = new FarmsBanksDetail();
		$values['farms_banks_detail'] = $FarmsBanksDetail->getFarmsListBanksDetailByFarms($values['id_farm']);
		
		
		$values['action'] = 'update';
        $values['msg'] = $msg;
		$values['errors'] = array();
		require('farms_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$Farms = new Farms();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('farms_form_view.php');die;
		}else{		
			$Farms->updateFarms($values);			
			executeEdit($values,message_updated);die;
		}
	}	
	function executeFarmsListJson($values)
	{
		$Farms = new Farms();
		$farms_list_json = $Farms ->getFarmsList($values);
		$farms_list_json_cuenta = $Farms ->getCountFarmsList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $farms_list_json_cuenta;
		$array_json['recordsFiltered'] = $farms_list_json_cuenta;
		if(count($farms_list_json)>0)
		{
			foreach ($farms_list_json as $farm) 
			{
				$status = $farm['status'];
				$id_farm = $farm['id_farm'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'><a href='#' onclick = ".'"'."status_changer('farms','id_farm', '$id_farm','1')".'"'.">Desactivado</a></label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'><a href='#' onclick = ".'"'."status_changer('farms','id_farm', '$id_farm','0')".'"'.">Activo</a></label>";
				}

				$array_json['data'][] = array(
					"id_farm" => $id_farm,
					"name" => $farm['name'],
					"contact1" => $farm['contact1'],
        				"phone_contact1" => $farm['phone_contact1'],
    					"email_contact1" => $farm['email_contact1'],
					"status" => $message_status,
					"actions" => '<form method="POST" action ="'.full_url.'/adm/farms/index.php"><input type="hidden" name="action" value="edit"><input type="hidden" name="id_farm" value="'.$id_farm.'"><button type="submit" class="btn btn-default"><i class="fa fa-edit fa-pull-left fa-border"></i></button><form>'

					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_farm"=>null,"name"=>"","contact1"=>"","phone_contact1"=>"","email_contact1"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}