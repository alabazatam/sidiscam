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
		case "plants_list_json":
			executePlantsListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('plants_list_view.php');
	}
	function executeNew($values = null)
	{
		$values['action'] = 'add';
                $values['status'] = 1;
				$values['errors'] = array();
		require('plants_form_view.php');
	}
	function executeSave($values = null)
	{
		$Messages = new Messages();
		$Plants = new Plants();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('plants_form_view.php');die;
		}else{		
			$values = $Plants->savePlants($values);			
			executeEdit($values,message_created);die;
		}
	}
	function executeEdit($values = null,$msg = null)
	{
		
		$Plants = new Plants();
        $values = $Plants->getPlantsById($values);
		$values['action'] = 'update';
        $values['msg'] = $msg;
		$values['errors'] = array();
		require('plants_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$Plants = new Plants();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('plants_form_view.php');die;
		}else{		
			$Plants->updatePlants($values);			
			executeEdit($values,message_updated);die;
		}
	}	
	function executePlantsListJson($values)
	{
		$Plants = new Plants();
		$plants_list_json = $Plants ->getPlantsList($values);
		$plants_list_json_cuenta = $Plants ->getCountPlantsList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $plants_list_json_cuenta;
		$array_json['recordsFiltered'] = $plants_list_json_cuenta;
		if(count($plants_list_json)>0)
		{
			foreach ($plants_list_json as $plant) 
			{
				$status = $plant['status'];
				$id_plant = $plant['id_plant'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'><a href='#' onclick = ".'"'."status_changer('plants','id_plant', '$id_plant','1')".'"'.">Desactivado</a></label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'><a href='#' onclick = ".'"'."status_changer('plants','id_plant', '$id_plant','0')".'"'.">Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_plant" => $id_plant,
					"name" => $plant['name'],
					"rif" => $plant['rif'],
					"status" => $message_status,
					"actions" => '<form method="POST" action ="'.full_url.'/adm/plants/index.php"><input type="hidden" name="action" value="edit"><input type="hidden" name="id_plant" value="'.$id_plant.'"><button type="submit" class="btn btn-default"><i class="fa fa-edit fa-pull-left fa-border"></i></button><form>'

					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_plant"=>null,"name"=>"","rif"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}