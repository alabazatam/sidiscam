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
		case "products_type_list_json":
			executeProductsTypeListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('products_type_list_view.php');
	}
	function executeNew($values = null)
	{
		$values['action'] = 'add';
                $values['status'] = 1;
		require('products_type_form_view.php');
	}
	function executeSave($values = null)
	{
		$Messages = new Messages();
		$ProductsType = new ProductsType();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('products_type_form_view.php');die;
		}else{		
			$values = $ProductsType->saveProductsType($values);			
			executeEdit($values,message_created);die;
		}
	}
	function executeEdit($values = null,$msg = null)
	{

		$ProductsType = new ProductsType();
                $values = $ProductsType->getProductsTypeById($values);
		$values['action'] = 'update';
                $values['msg'] = $msg;
				$values['errors'] = array();
		require('products_type_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$ProductsType = new ProductsType();
		$errors = validate($values);
		if(count($errors)>0)
		{	
			$values['errors'] = $errors;
			require('products_type_form_view.php');die;
		}else{		
			$ProductsType->updateProductsType($values);			
			executeEdit($values,message_updated);die;
		}
	}	
	function executeProductsTypeListJson($values)
	{
		$ProductsType = new ProductsType();
		$products_types_list_json = $ProductsType ->getProductsTypeList($values);
		$products_types_list_json_cuenta = $ProductsType ->getCountProductsTypeList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $products_types_list_json_cuenta;
		$array_json['recordsFiltered'] = $products_types_list_json_cuenta;
		if(count($products_types_list_json)>0)
		{
			foreach ($products_types_list_json as $products_type) 
			{
				$status = $products_type['status'];
				$id_product_type = $products_type['id_product_type'];
				if($status == 0)
				{
                                        $onclick = "";
                                        if($_SESSION['rol'] == "ADM")
                                        {
                                            $onclick = "onclick = ".'"'."status_changer('products_type','id_product_type', '$id_product_type','1')".'"'."";
 
                                        } 
					$message_status = "<label class='label label-danger'><a href='#' $onclick>Desactivado</a></label>";
				}
				if($status == 1)
				{
                                        $onclick = "";
                                        if($_SESSION['rol'] == "ADM")
                                        {
                                            $onclick = "onclick = ".'"'."status_changer('products_type','id_product_type', '$id_product_type','0')".'"'."";
 
                                        } 
					$message_status = "<label class='label label-success'><a href='#' $onclick>Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_product_type" => $id_product_type,
					"id_product" => $products_type['product_name'],
					"name" => $products_type['name'],
					"status" => $message_status,
					"date_created" => $products_type['date_created'],
                                        "date_updated" => $products_type['date_created'],
					"actions" => '<form method="POST" action ="'.full_url.'/adm/products_type/index.php"><input type="hidden" name="action" value="edit"><input type="hidden" name="id_product_type" value="'.$id_product_type.'"><button type="submit" class="btn btn-default"><i class="fa fa-edit fa-pull-left fa-border"></i></button><form>'

					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_product_type"=>null,"id_product"=>"","name"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}
