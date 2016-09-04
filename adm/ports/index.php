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
		case "ports_list_json":
			executePortsListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('ports_list_view.php');
	}
	function executeNew($values = null)
	{
		$values['action'] = 'add';
                $values['status'] = 1;
		require('ports_form_view.php');
	}
	function executeSave($values = null)
	{
		$Messages = new Messages();
		$Ports = new Ports();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('ports_form_view.php');die;
		}else{		
			$values = $Ports->savePorts($values);			
			executeEdit($values,message_created);die;
		}
	}
	function executeEdit($values = null,$msg = null)
	{

		$Ports = new Ports();
        $values = $Ports->getPortsById($values);
		$values['action'] = 'update';
                $values['msg'] = $msg;
				 $values['errors'] = array();
		require('ports_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$Ports = new Ports();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('ports_form_view.php');die;
		}else{		
			$Ports->updatePorts($values);			
			executeEdit($values,message_updated);die;
		}
	}	
	function executePortsListJson($values)
	{
		$Ports = new Ports();
		$ports_list_json = $Ports ->getPortsList($values);
		$ports_list_json_cuenta = $Ports ->getCountPortsList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $ports_list_json_cuenta;
		$array_json['recordsFiltered'] = $ports_list_json_cuenta;
		if(count($ports_list_json)>0)
		{
			foreach ($ports_list_json as $product) 
			{
				$status = $product['status'];
				$id_port = $product['id_port'];
				if($status == 0)
				{
                                        $onclick = "";
                                        if($_SESSION['rol'] == "ADM")
                                        {
                                            $onclick = "onclick = ".'"'."status_changer('ports','id_port', '$id_port','1')".'"'."";
 
                                        } 
					$message_status = "<label class='label label-danger'><a href='#' $onclick>Desactivado</a></label>";
				}
				if($status == 1)
				{
                                        $onclick = "";
                                        if($_SESSION['rol'] == "ADM")
                                        {
                                            $onclick = "onclick = ".'"'."status_changer('ports','id_port', '$id_port','0')".'"'."";
 
                                        } 
					$message_status = "<label class='label label-success'><a href='#' $onclick>Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_port" => $id_port,
					"name" => $product['name'],
					"cod_port" => $product['cod_port'],
					"id_country" => $product['country_name'],
					"status" => $message_status,
					"date_created" => $product['date_created'],
                    "date_updated" => $product['date_created'],
					"actions" => '<form method="POST" action ="'.full_url.'/adm/ports/index.php"><input type="hidden" name="action" value="edit"><input type="hidden" name="id_port" value="'.$id_port.'"><button type="submit" class="btn btn-default"><i class="fa fa-edit fa-pull-left fa-border"></i></button><form>'

					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_port"=>null,"name"=>"","cod_port"=>"","id_country"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}