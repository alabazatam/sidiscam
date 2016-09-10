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
		$Sales = new Sales();
                $valores_antes = $Sales->getSalesById($values);
                
                
                if($valores_antes['status']==0 and $_SESSION['rol']!="ADM")
                {
                   //print_r($values);die;
                   $Sales->updateSalesSeguimiento($values);
                   executeEdit($values,message_updated);die;
		}else
                {
                   $errors = validate($values); 
                }
		
                
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
				$id_sale= $sales['id_sale'];
				$status = $sales['status'];
				if($status == 0)
				{
					$message_status = "<label class='label label-success'>Venta completada</label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-warning'>En transcripción</label>";
				}
				

                                         if($status == 1)
                                        {
                                        $array_json['data'][] = array(
                                                "id_sale" => $id_sale,
                                                "client_name" => "<p title='".$sales['client_name']."'>".substr($sales['client_name'],0,max_list_text)."</p>",
                                                "date_sale" => $sales['date_sale'],
                                                "country_name" => $sales['country_name'],
                                                "port_name" => $sales['port_name'],
                                                "name_shipping_lines" => $sales['name_shipping_lines'],

                                                "status" => $message_status,
                                                "actions" => 

                                               '<form method="POST" action = "'.full_url.'/adm/sales/index.php" >'
                                               .'<input type="hidden" name="action" value="edit">  '
                                               .'<input type="hidden" name="id_sale" value="'.$id_sale.'">  '
                                               .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                               .'</form>'
                                                ); 
                                                }
                                        if($status == 0)
                                        {
                                        $array_json['data'][] = array(
                                                "id_sale" => $id_sale,
                                                "client_name" => "<p title='".$sales['client_name']."'>".substr($sales['client_name'],0,max_list_text)."</p>",
                                                "date_sale" => $sales['date_sale'],
                                                "country_name" => $sales['country_name'],
                                                "port_name" => $sales['port_name'],
                                                "name_shipping_lines" => $sales['name_shipping_lines'],

                                                "status" => $message_status,
                                                "actions" => 

                                               '<form method="POST" action = "'.full_url.'/adm/sales/index.php" >'
                                               .'<input type="hidden" name="action" value="edit">  '
                                               .'<input type="hidden" name="id_sale" value="'.$id_sale.'">  '
                                               .'<a target="_blank" class="btn btn-default btn-sm" title="Ver factura" href="'.full_url.'/adm/invoices/index.php?action=generate1&id_sale='.$id_sale.'"><i class="fa fa-book  fa-pull-left fa-border"></i></a>  '
                                               .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                               .'</form>'
                                            );  
                                        }
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_sale"=>null,"client_name"=>"","date_sale"=>"","country_name"=>"","port_name"=>"","name_shipping_lines"=>"","status"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}