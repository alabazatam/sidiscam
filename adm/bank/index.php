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
		case "bank_list_json":
			executeBankListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('bank_list_view.php');
	}
	function executeNew($values = null)
	{
        $values['status'] = '1';
		$values['action'] = 'add';
		
		require('bank_form_view.php');
	}
	function executeSave($values = null)
	{
		
		$Bank = new Bank();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('bank_form_view.php');die;
		}else{		
			$values = $Bank->saveBank($values);			
			executeEdit($values,message_created);die;
		}

	}
	function executeEdit($values = null,$msg = null)
	{	
		
		$Bank = new Bank();
		$values = $Bank->getBankById($values);
        $id_bank = $values['id_bank'];
        $values['action'] = 'update';
        $values['msg'] = $msg;
		$values['errors'] = array();
		require('bank_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$Bank = new Bank();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('bank_form_view.php');die;
		}else{		
			$Bank->updateBank($values);			
			executeEdit($values,message_updated);die;
		}

	}	
	function executeBankListJson($values)
	{
		$Bank = new Bank();
		$bank_list_json = $Bank ->getBankList($values);
		$bank_list_json_cuenta = $Bank ->getCountBankList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $bank_list_json_cuenta;
		$array_json['recordsFiltered'] = $bank_list_json_cuenta;
		if(count($bank_list_json)>0)
		{
			foreach ($bank_list_json as $bank) 
			{
				$id_bank= $bank['id_bank'];
				$status = $bank['status'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'><a href='#' onclick = ".'"'."status_changer('bank','id_bank', '$id_bank','1')".'"'.">Desactivado</a></label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'><a href='#' onclick = ".'"'."status_changer('bank','id_bank', '$id_bank','0')".'"'.">Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_bank" => $id_bank,
					"name" => $bank['name'],
					"swif" => $bank['swif'],
					"aba" => $bank['aba'],
					"status" => $message_status,
					"date_created" => $bank['date_created'],
					"date_updated" => $bank['date_updated'],
					"actions" => 
                                       
                                       '<form method="POST" action = "'.full_url.'/adm/bank/index.php" >'
                                       .'<input type="hidden" name="action" value="edit">  '
                                       .'<input type="hidden" name="id_bank" value="'.$id_bank.'">  '
                                       .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                       .'</form>'
					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_bank"=>null,"name"=>"","aba"=>"","swif"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}