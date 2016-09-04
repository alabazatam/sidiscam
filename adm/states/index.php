<?php include("../../autoload.php");?>	
<?php include("validator.php");?>	
<?php include("../security/security.php");?>
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
		case "states_list_json":
			executeStatesListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('states_list_view.php');
	}
	function executeNew($values = null)
	{
        $values['status'] = '1';
		$values['action'] = 'add';
		
		require('states_form_view.php');
	}
	function executeSave($values = null)
	{
		
		$States = new States();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('states_form_view.php');die;
		}else{		
			$values = $States->saveStates($values);			
			executeEdit($values,message_created);die;
		}
	}
	function executeEdit($values = null,$msg = null)
	{
		$States = new States();
		$values = $States->getStatesById($values);
                $id_state = $values['id_state'];
                $values['action'] = 'update';
                $values['msg'] = $msg;
		$values['errors'] = array();
		require('states_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$States = new States();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('states_form_view.php');die;
		}else{		
			$States->updateStates($values);			
			executeEdit($values,message_updated);die;
		}
	}	
	function executeStatesListJson($values)
	{
		$States = new States();
		$states_list_json = $States ->getStatesList($values);
		$states_list_json_cuenta = $States ->getCountStatesList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $states_list_json_cuenta;
		$array_json['recordsFiltered'] = $states_list_json_cuenta;
		if(count($states_list_json)>0)
		{
			foreach ($states_list_json as $states) 
			{
				$status = $states['status'];
				$id_state= $states['id_state'];
				if($status == 0)
				{
                                        $onclick = "";
                                        if($_SESSION['rol'] == "ADM")
                                        {
                                            $onclick = "onclick = ".'"'."status_changer('states','id_state', '$id_state','1')".'"'."";
 
                                        } 
					$message_status = "<label class='label label-danger'><a href='#' $onclick>Desactivado</a></label>";
				}
				if($status == 1)
				{
                                        $onclick = "";
                                        if($_SESSION['rol'] == "ADM")
                                        {
                                            $onclick = "onclick = ".'"'."status_changer('states','id_state', '$id_state','0')".'"'."";
 
                                        } 
					$message_status = "<label class='label label-success'><a href='#' $onclick>Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_state" => $id_state,
					"name" => $states['name'],
					"id_country" => $states['country_name'],
					"status" => $message_status,
					"date_created" => $states['date_created'],
					"date_updated" => $states['date_updated'],
					"actions" => 
                                       
                                       '<form method="POST" action = "'.full_url.'/adm/states/index.php" >'
                                       .'<input type="hidden" name="action" value="edit">  '
                                       .'<input type="hidden" name="id_state" value="'.$id_state.'">  '
                                       .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                       .'</form>'
					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_state"=>null,"name"=>"","id_country"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}