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
		case "status_changer":
			executeStatusChanger($values);	
		break;
		case "bank_list":
			executeBankList($values);	
		break;
		case "add_banks_tables":
			executeAddBanksTables($values);	
		break;
		case "delete_banks_tables":
			executeDeleteBanksTables($values);	
		break;
		case "list_banks_tables":
			executeListBanksTables($values);	
		break;
		case "products_list":
			executeProductsList($values);	
		break;
		case "add_product":
			executeAddProduct($values);	
		break;
		case "delete_product":
			executeDeleteProduct($values);	
		break;
		case "update_product":
			executeUpdateProduct($values);	
		break;
	
		case "plants_list":
			executePlantsList($values);	
		break;
		case "add_plant":
			executeAddPlant($values);	
		break;
		case "delete_plant":
			executeDeletePlant($values);	
		break;
		
		case "select_ports":
			executeSelectPorts($values);	
		break;

		case "farms_list":
			executeFarmsList($values);	
		break;
		case "add_farm":
			executeAddFarm($values);	
		break;
		case "delete_farm":
			executeDeleteFarm($values);	
		break;
	
		case "containers_list":
			executeContainersList($values);	
		break;
		case "add_container":
			executeAddContainer($values);	
		break;
		case "delete_container":
			executeDeleteContainer($values);	
		break;
		case "update_container":
			executeUpdateContainer($values);	
		break;
	
	
		case "banks_list":
			executeBanksList($values);	
		break;
		case "add_bank":
			executeAddBank($values);	
		break;
		case "delete_bank":
			executeDeleteBank($values);	
		break;
		case "update_bank":
			executeUpdateBank($values);	
		break;		
	
		case "address_list":
			executeAddressList($values);	
		break;
		case "add_address":
			executeAddress($values);	
		break;
		case "delete_address":
			executeDeleteAddress($values);	
		break;
		case "update_address":
			executeUpdateAddress($values);	
		break;		
	
	}
	function executeStatusChanger($values = null)
	{
		$table = $values['table'];
		$column_primary = $values['column_primary'];
		$id = $values['id'];
		$value_change = $values['value_change'];
		$status_changer = status_changer($table,$column_primary, $id,$value_change);
	}
	function executeBankList($values = null)
	{
		
		$Bank = new Bank();
		$bank_list = $Bank ->getBankByIdTable($values);
		require('bank_list.php');

	}
	function executeAddBanksTables($values = null)
	{
		$BankTablesId = new BanksTablesId();
		$values["status"] = 1;
		$count_list = $BankTablesId->getCountBanksTablesId($values);
		if(count($count_list)>0):
			$values["status"] = 1;
			$BankTablesId ->deleteBanksTablesId($values);

		endif;
		if(count($count_list)==0):
			$BankTablesId ->saveBanksTablesId($values);
		endif;
				
		

	}
	function executeDeleteBanksTables($values = null)
	{
		$BankTablesId = new BanksTablesId();
		$values["status"] = 0;
		$BankTablesId ->deleteBanksTablesId($values);

	}
		function executeListBanksTables($values = null)
	{
		$BankTablesId = new BanksTablesId();
		$bank_list =  $BankTablesId ->getBanksTablesId($values);
		require('banks_tables_primary.php');

	}
	function executeProductsList($values = null)
	{
		
		$Products = new Products();
		$products_list = $Products ->getProductsListSelect($values);
		

		require('products_list.php');

	}
	function executeAddProduct($values = null)
	{
		$Products = new Products();
		$products_data = $Products->getProductsById($values);
		$ProductsType = new ProductsType();
		$products_type_list = $ProductsType ->getListProductsTypeByIdProduct($values['id_product']);			
		$SalesProductsDetail = new SalesProductsDetail();
		$values_save['id_product'] = $values['id_product']; 
		$values_save['id_sale'] = $values['id_sale']; 
		$values_save['status'] = 1; 
		$values['id'] = $SalesProductsDetail->saveSalesProductsDetail($values_save);
		require('add_product.php');

	}
	function executeDeleteProduct($values = null)
	{
		
		$SalesProductsDetail = new SalesProductsDetail();		
		$SalesProductsDetail->deleteSalesProductsDetail($values['id']);

	}
	
	function executeUpdateProduct($values = null)
	{
		$SalesProductsDetail = new SalesProductsDetail();
		$SalesProductsDetail ->updateSalesProductsDetail($values);

	}
	
	/***********Plants*****/
	
function executePlantsList($values = null)
	{
		
		$Plants = new Plants();
		$plants_list = $Plants ->getPlantsListSelect($values);
		

		require('plants_list.php');

	}
	function executeAddPlant($values = null)
	{
		$Plants = new Plants();
		$plants_data = $Plants->getPlantsById($values);			
		$SalesPlantsDetail = new SalesPlantsDetail();
		$values_save['id_plant'] = $values['id_plant']; 
		$values_save['id_sale'] = $values['id_sale']; 
		$values_save['status'] = 1; 
		$values['id'] = $SalesPlantsDetail->saveSalesPlantsDetail($values_save);
		require('add_plant.php');

	}
	function executeDeletePlant($values = null)
	{
		
		$SalesPlantsDetail = new SalesPlantsDetail();		
		$SalesPlantsDetail->deleteSalesPlantsDetail($values['id']);

	}


	/***********Farms*****/
	
function executeFarmsList($values = null)
	{
		
		$Farms = new Farms();
		$farms_list = $Farms ->getFarmsListSelect($values);
		

		require('farms_list.php');

	}
	function executeAddFarm($values = null)
	{
		$Farms = new Farms();
		$farms_data = $Farms->getFarmsById($values);			
		$SalesFarmsDetail = new SalesFarmsDetail();
		$values_save['id_farm'] = $values['id_farm']; 
		$values_save['id_sale'] = $values['id_sale']; 
		$values_save['status'] = 1; 
		$values['id'] = $SalesFarmsDetail->saveSalesFarmsDetail($values_save);
		require('add_farm.php');

	}
	function executeDeleteFarm($values = null)
	{
		
		$SalesFarmsDetail = new SalesFarmsDetail();	
		$SalesFarmsDetail->deleteSalesFarmsDetail($values['id']);

	}

		/***********Containers*****/
	
	function executeContainersList($values = null)
	{
		
		$Containers = new Containers();
		$containers_list = $Containers ->getContainersListSelect($values);
		

		require('containers_list.php');

	}
	function executeAddContainer($values = null)
	{
		$Containers = new Containers();
		$containers_data = $Containers->getContainersById($values);			
		$SalesContainersDetail = new SalesContainersDetail();
		$values_save['id_container'] = $values['id_container']; 
		$values_save['id_sale'] = $values['id_sale']; 
		$values_save['status'] = 1; 
		$values['id'] = $SalesContainersDetail->saveSalesContainersDetail($values_save);
		require('add_container.php');

	}
	function executeDeleteContainer($values = null)
	{
		
		$SalesContainersDetail = new SalesContainersDetail();
		$SalesContainersDetail->deleteSalesContainersDetail($values['id']);

	}
		function executeUpdateContainer($values = null)
	{
		$SalesContainersDetail = new SalesContainersDetail();
		$SalesContainersDetail ->updateSalesContainersDetail($values);

	}
	
	function executeSelectPorts($values = null)
	{
		
		$Ports = new Ports();
		$ports_list = $Ports ->getListPortsByCountry($values);
		if(isset($values['id_sale']) and $values['id_sale']!='')
		{
			$selected_port = $Ports ->getListPortsBySale($values);
			
		}
		

		require('select_ports.php');

	}	

		/***********Banks clients*****/
	
	function executeBanksList($values = null)
	{
		$ClientsBanksDetail = new ClientsBanksDetail();
		$values_save['id_client'] = $values['id_client']; 
		$values_save['status'] = 1; 
		$values['id'] = $ClientsBanksDetail->saveClientsBanksDetail($values_save);		
		

		require('bank_list.php');

	}
	function executeDeleteBank($values = null)
	{
		
		$ClientsBanksDetail = new ClientsBanksDetail();
		$ClientsBanksDetail->deleteClientsBanksDetail($values['id']);

	}
		function executeUpdateBank($values = null)
	{
		$ClientsBanksDetail = new ClientsBanksDetail();
		$ClientsBanksDetail ->updateClientsBanksDetail($values);

	}

		/***********Address clients*****/
	
	function executeAddressList($values = null)
	{
		$ClientsAddressDetail = new ClientsAddressDetail();
		$values_save['id_client'] = $values['id_client']; 
		$values_save['status'] = 1; 
		$values['id'] = $ClientsAddressDetail->saveClientsAddressDetail($values_save);		
		

		require('address_list.php');

	}
	function executeDeleteAddress($values = null)
	{
		
		$ClientsAddressDetail = new ClientsAddressDetail();
		$ClientsAddressDetail->deleteClientsAddressDetail($values['id']);

	}
		function executeUpdateAddress($values = null)
	{
		$ClientsAddressDetail = new ClientsAddressDetail();
		$ClientsAddressDetail ->updateClientsAddressDetail($values);

	}
		