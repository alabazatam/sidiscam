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
                case "generate1":
			executeGenerate1($values);	
		break;
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
            require('empty.php');
	}
	function executeGenerate1($values = null)
	{
            $InvoicesPDF = new InvoicesPDF();
            $InvoicesPDF ->generate1($values);
	}	