<?php include("autoload.php");?>		
<?php //include("security.php");?>						
<?php
$action = "";
if(isset($_REQUEST["action"]) and $_REQUEST["action"]!=""){
	$action = $_REQUEST["action"];
}

$values = $_REQUEST;
	switch ($action) {
		case "index":
			executeIndex($values);	
		break;
		default:
			executeIndex($values);
		break;
	}
						
	function executeIndex($values = null){

        
	require('principal.php');
	}	