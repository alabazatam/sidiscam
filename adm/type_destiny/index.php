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
		case "type_destiny_list_json":
			executeTypeDestinyListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('type_destiny_list_view.php');
	}
	function executeNew($values = null)
	{
        $values['status'] = '1';
		$values['action'] = 'add';
		
		require('type_destiny_form_view.php');
	}
	function executeSave($values = null)
	{
		
		$TypeDestiny = new TypeDestiny();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('type_destiny_form_view.php');die;
		}else{		
			$values = $TypeDestiny->saveTypeDestiny($values);			
			executeEdit($values,message_created);die;
		}
	}
	function executeEdit($values = null,$msg = null)
	{
		$TypeDestiny = new TypeDestiny();
		$values = $TypeDestiny->getTypeDestinyById($values);
                $id_type_destiny = $values['id_type_destiny'];
                $values['action'] = 'update';
                $values['msg'] = $msg;
		$values['errors'] = array();
		require('type_destiny_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$TypeDestiny = new TypeDestiny();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('type_destiny_form_view.php');die;
		}else{		
			$TypeDestiny->updateTypeDestiny($values);			
			executeEdit($values,message_updated);die;
		}
	}	
	function executeTypeDestinyListJson($values)
	{
		$TypeDestiny = new TypeDestiny();
		$type_destiny_list_json = $TypeDestiny ->getTypeDestinyList($values);
		$type_destiny_list_json_cuenta = $TypeDestiny ->getCountTypeDestinyList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $type_destiny_list_json_cuenta;
		$array_json['recordsFiltered'] = $type_destiny_list_json_cuenta;
		if(count($type_destiny_list_json)>0)
		{
			foreach ($type_destiny_list_json as $type_destiny) 
			{
				$status = $type_destiny['status'];
				$id_type_destiny= $type_destiny['id_type_destiny'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'><a href='#' onclick = ".'"'."status_changer('type_destiny','id_type_destiny', '$id_type_destiny','1')".'"'.">Desactivado</a></label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'><a href='#' onclick = ".'"'."status_changer('type_destiny','id_type_destiny', '$id_type_destiny','0')".'"'.">Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_type_destiny" => $id_type_destiny,
					"name" => $type_destiny['name'],
					"abr" => $type_destiny['abr'],
					"status" => $message_status,
					"date_created" => $type_destiny['date_created'],
					"date_updated" => $type_destiny['date_updated'],
					"actions" => 
                                       
                                       '<form method="POST" action = "'.full_url.'/adm/type_destiny/index.php" >'
                                       .'<input type="hidden" name="action" value="edit">  '
                                       .'<input type="hidden" name="id_type_destiny" value="'.$id_type_destiny.'">  '
                                       .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                       .'</form>'
					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_type_destiny"=>null,"name"=>"","abr"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}