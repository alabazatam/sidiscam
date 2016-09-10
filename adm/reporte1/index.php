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
		$Reporte1 = new Reporte1();
                $data_list = $Reporte1 ->getDataView($values);
		require('reporte1_view.php');
	}
	function executeReporte1ListJson($values)
	{
		$Reporte1 = new Reporte1();
		$reporte1_json = $Reporte1 -> getDataList($values);
		$reporte1_json_cuenta = count($Reporte1 ->getCountDataList($values));
		$array_json = array();
		$array_json['recordsTotal'] = $reporte1_json_cuenta;
		$array_json['recordsFiltered'] = $reporte1_json_cuenta;
		if(count($reporte1_json)>0)
		{
			foreach ($reporte1_json as $data) 
			{
				$id_sale= $data['id_sale'];
				

                                        $array_json['data'][] = array(
                                                "id_sale" => $id_sale,
                                                "client_name" => "<p title='".$data['client_name']."'>".substr($data['client_name'],0,max_list_text)."</p>",
                                                "number" => $data['number'],
                                                "KGS" => $data['kgs'],
                                                "destino" => $data['destino'],
                                                "naviera" => $data['naviera'].'<form method="POST" action = "'.full_url.'/adm/reporte1/index.php" >'
                                               .'<input type="hidden" name="action" value="view">  '
												.'<input type="hidden" name="id_sale" value="'.$id_sale.'">  '
                                               .'<input type="hidden" name="number" value="'.$data['number'].'">  '
                                               .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                               .'</form>',
                                                "actions" => 

                                               '<form method="POST" action = "'.full_url.'/adm/reporte1/index.php" >'
                                               .'<input type="hidden" name="action" value="view">  '
												.'<input type="hidden" name="id_sale" value="'.$id_sale.'">  '
                                               .'<input type="hidden" name="number" value="'.$data['number'].'">  '
                                               .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                               .'</form>',
												"granja" =>$data['granja'],
												"plant_name" =>$data['plant_name'],
												"estimada_salida" =>$data['estimada_salida'],
												"retraso_salida" =>$data['retraso_salida'],
												"salida" =>$data['salida'],
												"llegada" =>$data['llegada'],
												"dias_transito" =>$data['dias_transito'],
												"KGS" =>$data['kgs'],
												"cases" =>$data['cases'],
												"factura" =>$data['company_name'],
												"monto" =>$data['monto'],
												"comision" =>$data['comision'],
												"status_seguimiento" =>$data['status_seguimiento'],
												"observacion_seguimiento" =>$data['observacion_seguimiento'],
                                                                                                "freight" =>$data['freight'],
                                                ); 
                                                
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array(
				"id_sale"=>null,
				"client_name"=>"","number"=>"","KGS"=>"","destino"=>"","naviera"=>"","actions"=>"",
				"granja"=>"",
				"plant_name"=>"",
				"estimada_salida"=>"",
				"retraso_salida"=>"",
				"salida"=>"",
				"llegada"=>"",
				"dias_transito"=>"",
				"KGS"=>"",
				"cases"=>"",
				"factura"=>"",
				"monto"=>"",
				"comision"=>"",
				"status_seguimiento" => "",
				"observacion_seguimiento" =>"",
                                "freight" =>""
				
				);
		}

		echo json_encode($array_json);die;
		
	}