<?php include("../../autoload.php");?>	
<?php include("validator.php");?>	
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
		case "products_list_json":
			executeProductsListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('products_list_view.php');
	}
	function executeNew($values = null)
	{
		$values['action'] = 'add';
                $values['status'] = 1;
		require('products_form_view.php');
	}
	function executeSave($values = null)
	{
		$Messages = new Messages();
		$Products = new Products();
		$values = $Products->saveProducts($values);
		executeEdit($values,message_created);die;
	}
	function executeEdit($values = null,$msg = null)
	{

		$Products = new Products();
                $values = $Products->getProductsById($values);
		$values['action'] = 'update';
                $values['msg'] = $msg;
		require('products_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$Products = new Products();
		$Products->updateProducts($values);
		executeEdit($values,message_updated);die;
	}	
	function executeProductsListJson($values)
	{
		$Products = new Products();
		$products_list_json = $Products ->getProductsList($values);
		$products_list_json_cuenta = $Products ->getCountProductsList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $products_list_json_cuenta;
		$array_json['recordsFiltered'] = $products_list_json_cuenta;
		if(count($products_list_json)>0)
		{
			foreach ($products_list_json as $product) 
			{
				$status = $product['status'];
				$id_product = $product['id_product'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'><a href='#' onclick = ".'"'."status_changer('products','id_product', '$id_product','1')".'"'.">Desactivado</a></label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'><a href='#' onclick = ".'"'."status_changer('products','id_product', '$id_product','0')".'"'.">Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_product" => $id_product,
					"name" => $product['name'],
					"status" => $message_status,
					"date_created" => $product['date_created'],
                                        "date_updated" => $product['date_created'],
					"actions" => '<form method="POST" action ="'.full_url.'/adm/products/index.php"><input type="hidden" name="action" value="edit"><input type="hidden" name="id_product" value="'.$id_product.'"><button type="submit" class="btn btn-default"><i class="fa fa-edit fa-pull-left fa-border"></i></button><form>'

					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_product"=>null,"name"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}