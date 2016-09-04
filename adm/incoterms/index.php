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
		case "incoterms_list_json":
			executeIncotermsListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('incoterms_list_view.php');
	}
	function executeNew($values = null)
	{
        $values['status'] = '1';
		$values['action'] = 'add';
		
		require('incoterms_form_view.php');
	}
	function executeSave($values = null)
	{
		
		$Incoterms = new Incoterms();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('incoterms_form_view.php');die;
		}else{		
			$values = $Incoterms->saveIncoterms($values);			
			executeEdit($values,message_created);die;
		}
	}
	function executeEdit($values = null,$msg = null)
	{
		$Incoterms = new Incoterms();
		$values = $Incoterms->getIncotermsById($values);
                $id_incoterm = $values['id_incoterm'];
                $values['action'] = 'update';
                $values['msg'] = $msg;
		$values['errors'] = array();
		require('incoterms_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$Incoterms = new Incoterms();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('incoterms_form_view.php');die;
		}else{		
			$Incoterms->updateIncoterms($values);			
			executeEdit($values,message_updated);die;
		}
	}	
	function executeIncotermsListJson($values)
	{
		$Incoterms = new Incoterms();
		$incoterms_list_json = $Incoterms ->getIncotermsList($values);
		$incoterms_list_json_cuenta = $Incoterms ->getCountIncotermsList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $incoterms_list_json_cuenta;
		$array_json['recordsFiltered'] = $incoterms_list_json_cuenta;
		if(count($incoterms_list_json)>0)
		{
			foreach ($incoterms_list_json as $incoterms) 
			{
				$status = $incoterms['status'];
				$id_incoterm= $incoterms['id_incoterm'];
				if($status == 0)
				{
                                        $onclick = "";
                                        if($_SESSION['rol'] == "ADM")
                                        {
                                            $onclick = "onclick = ".'"'."status_changer('incoterms','id_incoterm', '$id_incoterm','1')".'"'."";
 
                                        } 
					$message_status = "<label class='label label-danger'><a href='#' $onclick>Desactivado</a></label>";
				}
				if($status == 1)
				{
                                        $onclick = "";
                                        if($_SESSION['rol'] == "ADM")
                                        {
                                            $onclick = "onclick = ".'"'."status_changer('incoterms','id_incoterm', '$id_incoterm','0')".'"'."";
 
                                        } 
					$message_status = "<label class='label label-success'><a href='#' $onclick>Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_incoterm" => $id_incoterm,
					"name" => $incoterms['name'],
					"abr" => $incoterms['abr'],
					"status" => $message_status,
					"date_created" => $incoterms['date_created'],
					"date_updated" => $incoterms['date_updated'],
					"actions" => 
                                       
                                       '<form method="POST" action = "'.full_url.'/adm/incoterms/index.php" >'
                                       .'<input type="hidden" name="action" value="edit">  '
                                       .'<input type="hidden" name="id_incoterm" value="'.$id_incoterm.'">  '
                                       .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                       .'</form>'
					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_incoterm"=>null,"name"=>"","abr"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}