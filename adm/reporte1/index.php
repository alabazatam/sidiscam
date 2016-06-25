<?php include("../../autoload.php");?>	
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
		case "view":
			executeView($values);	
		break;	
		case "reporte1_list_json":
			executeReporte1ListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('reporte1_list_view.php');
	}
	function executeView($values = null,$msg = null)
	{	
		
		$Sales= new Sales();
		$values = $Sales->getSalesById($values);

		
        $id_sale = $values['id_sale'];
        $values['action'] = 'update';
        $values['msg'] = $msg;
		$values['errors'] = array();
		require('reporte1_form_view.php');
	}
	function executeReporte1ListJson($values)
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
				

                                        $array_json['data'][] = array(
                                                "id_sale" => $id_sale,
                                                "client_name" => "<p title='".$sales['client_name']."'>".substr($sales['client_name'],0,max_list_text)."</p>",
                                                "date_sale" => $sales['date_sale'],
                                                "country_name" => $sales['country_name'],
                                                "port_name" => $sales['port_name'],
                                                "name_shipping_lines" => $sales['name_shipping_lines'],

                                                "status" => $message_status,
                                                "actions" => 

                                               '<form method="POST" action = "'.full_url.'/adm/reporte1/index.php" >'
                                               .'<input type="text" name="action" value="view">  '
                                               .'<input type="text" name="id_sale" value="'.$id_sale.'">  '
                                               .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                               .'</form>'
                                                ); 
                                                
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_sale"=>null,"client_name"=>"","date_sale"=>"","country_name"=>"","port_name"=>"","name_shipping_lines"=>"","status"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}