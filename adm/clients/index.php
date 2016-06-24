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
		case "clients_list_json":
			executeClientsListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('clients_list_view.php');
	}
	function executeNew($values = null)
	{
		$values['action'] = 'add';
                $values['status'] = 1;
				$values['errors'] = array();
		require('clients_form_view.php');
	}
	function executeSave($values = null)
	{
		$Messages = new Messages();
		$Clients = new Clients();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('clients_form_view.php');die;
		}else{		
			$values = $Clients->saveClients($values);			
			executeEdit($values,message_created);die;
		}
	}
	function executeEdit($values = null,$msg = null)
	{
		
		$Clients = new Clients();
        $values = $Clients->getClientsById($values);
		

		
		$values['action'] = 'update';
        $values['msg'] = $msg;
		$values['errors'] = array();
		require('clients_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$Clients = new Clients();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('clients_form_view.php');die;
		}else{		
			$Clients->updateClients($values);			
			executeEdit($values,message_updated);die;
		}
	}	
	function executeClientsListJson($values)
	{
		$Clients = new Clients();
		$clients_list_json = $Clients ->getClientsList($values);
		$clients_list_json_cuenta = $Clients ->getCountClientsList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $clients_list_json_cuenta;
		$array_json['recordsFiltered'] = $clients_list_json_cuenta;
		if(count($clients_list_json)>0)
		{
			foreach ($clients_list_json as $client) 
			{
				$status = $client['status'];
				$id_client = $client['id_client'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'><a href='#' onclick = ".'"'."status_changer('clients','id_client', '$id_client','1')".'"'.">Desactivado</a></label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'><a href='#' onclick = ".'"'."status_changer('clients','id_client', '$id_client','0')".'"'.">Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_client" => $id_client,
                                        "name" => "<p title='".$client['name']."'>".substr($client['name'],0,max_list_text)."</p>",
					"rif" => $client['rif'],
					"contact1" => $client['contact1'],
        				"phone_contact1" => $client['phone_contact1'],
    					"email_contact1" => $client['email_contact1'],
					"status" => $message_status,
					"actions" => '<form method="POST" action ="'.full_url.'/adm/clients/index.php"><input type="hidden" name="action" value="edit"><input type="hidden" name="id_client" value="'.$id_client.'"><button type="submit" class="btn btn-default"><i class="fa fa-edit fa-pull-left fa-border"></i></button><form>'

					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_client"=>null,"name"=>"","rif"=>"","contact1"=>"","phone_contact1"=>"","email_contact1"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}