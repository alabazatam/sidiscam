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