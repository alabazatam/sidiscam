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
		case "brokers_list_json":
			executeBrokersListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('brokers_list_view.php');
	}
	function executeNew($values = null)
	{
        $values['status'] = '1';
		$values['action'] = 'add';
		
		require('brokers_form_view.php');
	}
	function executeSave($values = null)
	{
		
		$Brokers = new Brokers();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('brokers_form_view.php');die;
		}else{		
			$values = $Brokers->saveBrokers($values);			
			executeEdit($values,message_created);die;
		}
	}
	function executeEdit($values = null,$msg = null)
	{
		$Brokers = new Brokers();
		$values = $Brokers->getBrokersById($values);
		
		$BrokersBanksDetail = new BrokersBanksDetail();
		$values['brokers_banks_detail'] = $BrokersBanksDetail->getBrokersListBanksDetailByBrokers($values['id_broker']);	
		
		
                $id_broker = $values['id_broker'];
                $values['action'] = 'update';
                $values['msg'] = $msg;
				$values['errors'] = array();
		require('brokers_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$Brokers = new Brokers();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('brokers_form_view.php');die;
		}else{		
			$Brokers->updateBrokers($values);			
			executeEdit($values,message_updated);die;
		}
	}	
	function executeBrokersListJson($values)
	{
		$Brokers = new Brokers();
		$brokers_list_json = $Brokers ->getBrokersList($values);
		$brokers_list_json_cuenta = $Brokers ->getCountBrokersList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $brokers_list_json_cuenta;
		$array_json['recordsFiltered'] = $brokers_list_json_cuenta;
		if(count($brokers_list_json)>0)
		{
			foreach ($brokers_list_json as $brokers) 
			{
				$id_broker= $brokers['id_broker'];
				$status = $brokers['status'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'><a href='#' onclick = ".'"'."status_changer('brokers','id_broker', '$id_broker','1')".'"'.">Desactivado</a></label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'><a href='#' onclick = ".'"'."status_changer('brokers','id_broker', '$id_broker','0')".'"'.">Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_broker" => $id_broker,
					"name" => $brokers['name'],
					"phone1" => $brokers['phone1'],
 					"email1" => $brokers['email1'],                                   
					"status" => $message_status,
					"date_created" => $brokers['date_created'],
					"date_updated" => $brokers['date_updated'],
					"actions" => 
                                       
                                       '<form method="POST" action = "'.full_url.'/adm/brokers/index.php" >'
                                       .'<input type="hidden" name="action" value="edit">  '
                                       .'<input type="hidden" name="id_broker" value="'.$id_broker.'">  '
                                       .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                       .'</form>'
					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_broker"=>null,"name"=>"","phone1"=>"","email1"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}