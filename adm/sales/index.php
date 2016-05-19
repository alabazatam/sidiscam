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
		case "sales_list_json":
			executeSalesListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('sales_list_view.php');
	}
	function executeNew($values = null)
	{
        $values['status'] = '1';
		$values['action'] = 'add';
		
		require('sales_form_view.php');
	}
	function executeSave($values = null)
	{
		
		$Sales = new Sales();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('sales_form_view.php');die;
		}else{		
			$values = $Sales->saveSales($values);			
			executeEdit($values,message_created);die;
		}

	}
	function executeEdit($values = null,$msg = null)
	{	
		
		$Sales= new Sales();
		$values = $Sales->getSalesById($values);
        $id_sale = $values['id_sale'];
        $values['action'] = 'update';
        $values['msg'] = $msg;
		$values['errors'] = array();
		require('sales_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('sales_form_view.php');die;
		}else{		
			$Sales->updateSales($values);			
			executeEdit($values,message_updated);die;
		}

	}	
	function executeSalesListJson($values)
	{
		$Sales = new Sales();
		$sales_json = $Sales ->getSalesList($values);
		$sales_json_cuenta = $Sales ->getCountSalesList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $sales_json_cuenta;
		$array_json['recordsFiltered'] = $sales_json_cuenta;
		if(count($sales_json)>0)
		{
			foreach ($sales_json as $sales) 
			{
				$id_sales= $sales['id_sales'];
				$status = $sales['status'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'><a href='#' onclick = ".'"'."status_changer('sales','id_sales', '$id_sales','1')".'"'.">Desactivado</a></label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'><a href='#' onclick = ".'"'."status_changer('sales','id_sales', '$id_sales','0')".'"'.">Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_sales" => $id_sales,
					"name" => $sales['name'],
					"swif" => $sales['swif'],
					"aba" => $sales['aba'],
					"status" => $message_status,
					"date_created" => $sales['date_created'],
					"date_updated" => $sales['date_updated'],
					"actions" => 
                                       
                                       '<form method="POST" action = "'.full_url.'/adm/sales/index.php" >'
                                       .'<input type="hidden" name="action" value="edit">  '
                                       .'<input type="hidden" name="id_sales" value="'.$id_sales.'">  '
                                       .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                       .'</form>'
					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_sales"=>null,"name"=>"","aba"=>"","swif"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}