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
	}
	function executeStatusChanger($values = null)
	{
		$table = $values['table'];
		$column_primary = $values['column_primary'];
		$id = $values['id'];
		$value_change = $values['value_change'];
		$status_changer = status_changer($table,$column_primary, $id,$value_change);
	}
	