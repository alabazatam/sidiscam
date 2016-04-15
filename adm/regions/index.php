<?php include("../../autoload.php");?>	
<?php include("validator.php");?>	
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
		case "regions_list_json":
			executeRegionsListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('regions_list_view.php');
	}
	function executeNew($values = null)
	{
        $values['status'] = '1';
		$values['action'] = 'add';
		
		require('regions_form_view.php');
	}
	function executeSave($values = null)
	{
		
		$Regions = new Regions();
		$values = $Regions->saveRegions($values);
		executeEdit($values,message_created);die;
	}
	function executeEdit($values = null,$msg = null)
	{
		$Regions = new Regions();
		$values = $Regions->getRegionsById($values);
                $id_region = $values['id_region'];
                $values['action'] = 'update';
                $values['msg'] = $msg;
		require('regions_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$Regions = new Regions();
		$Regions->updateRegions($values);			
		executeEdit($values,message_updated);die;
	}	
	function executeRegionsListJson($values)
	{
		$Regions = new Regions();
		$regions_list_json = $Regions ->getRegionsList($values);
		$regions_list_json_cuenta = $Regions ->getCountRegionsList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $regions_list_json_cuenta;
		$array_json['recordsFiltered'] = $regions_list_json_cuenta;
		if(count($regions_list_json)>0)
		{
			foreach ($regions_list_json as $regions) 
			{
				$status = $regions['status'];
				$id_region= $regions['id_region'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'><a href='#' onclick = ".'"'."status_changer('regions','id_region', '$id_region','1')".'"'.">Desactivado</a></label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'><a href='#' onclick = ".'"'."status_changer('regions','id_region', '$id_region','0')".'"'.">Activo</a></label>";
				}
				
				$array_json['data'][] = array(
					"id_region" => $id_region,
					"name" => $regions['name'],
					"status" => $message_status,
					"date_created" => $regions['date_created'],
					"date_updated" => $regions['date_updated'],
					"actions" => 
                                       
                                       '<form method="POST" action = "'.full_url.'/adm/regions/index.php" >'
                                       .'<input type="hidden" name="action" value="edit">  '
                                       .'<input type="hidden" name="id_region" value="'.$id_region.'">  '
                                       .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                       .'</form>'
					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_region"=>null,"name"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}