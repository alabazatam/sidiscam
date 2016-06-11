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
		case "company_list_json":
			executeCompanyListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('company_list_view.php');
	}
	function executeNew($values = null)
	{
		$values['action'] = 'add';
                $values['status'] = 1;
				$values['errors'] = array();
		require('company_form_view.php');
	}
	function executeSave($values = null)
	{
		$Messages = new Messages();
		$Company = new Company();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('company_form_view.php');die;
		}else{		
			$values = $Company->saveCompany($values);			
			executeEdit($values,message_created);die;
		}
	}
	function executeEdit($values = null,$msg = null)
	{
		
		$Company = new Company();
        $values = $Company->getCompanyById($values);
		
		$CompanyBanksDetail = new CompanyBanksDetail();
		$values['company_banks_detail'] = $CompanyBanksDetail->getCompanyListBanksDetailByCompany($values['id_company']);	
		
		$values['action'] = 'update';
        $values['msg'] = $msg;
		$values['errors'] = array();
		require('company_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$Company = new Company();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('company_form_view.php');die;
		}else{		
			$Company->updateCompany($values);			
			executeEdit($values,message_updated);die;
		}
	}	
	function executeCompanyListJson($values)
	{
		$Company = new Company();
		$company_list_json = $Company ->getCompanyList($values);
		$company_list_json_cuenta = $Company ->getCountCompanyList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $company_list_json_cuenta;
		$array_json['recordsFiltered'] = $company_list_json_cuenta;
		if(count($company_list_json)>0)
		{
			foreach ($company_list_json as $company) 
			{
				$status = $company['status'];
				$id_company = $company['id_company'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'><a href='#' onclick = ".'"'."status_changer('company','id_company', '$id_company','1')".'"'.">Desactivado</a></label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'><a href='#' onclick = ".'"'."status_changer('company','id_company', '$id_company','0')".'"'.">Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_company" => $id_company,
					"description" => $company['description'],
					"rif" => $company['rif'],
					"contact1" => $company['contact1'],
					"phone_contact1" => $company['phone_contact1'],
					"email_contact1" => $company['email_contact1'],
					"status" => $message_status,
					"actions" => '<form method="POST" action ="'.full_url.'/adm/company/index.php"><input type="hidden" name="action" value="edit"><input type="hidden" name="id_company" value="'.$id_company.'"><button type="submit" class="btn btn-default"><i class="fa fa-edit fa-pull-left fa-border"></i></button><form>'

					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_company"=>null,"description"=>"","rif"=>"","contact1"=>"","phone_contact1"=>"","email_contact1"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}