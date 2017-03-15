<?php include("../autoload.php");?>		
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
        case "acceso":
			executeAcceso($values);	
		break;
		case "bienvenida":
			executeBienvenida($values);	
		break;
		case "logout":
			executeLogout($values);	
		break;
		default:
			executeIndex($values);
		break;
	}
						
	function executeIndex($values = null){
    
	if(isset($_SESSION['id_usuario']) and $_SESSION['id_usuario']!='')
	{
		executeBienvenida();
	}else{
		session_destroy();
		unset($_SESSION['id_usuario'],$_SESSION['nombres'],$_SESSION['apellidos'],$_SESSION['usuario']);
		require('login.php');
	}	
		

	
	}
	function executeBienvenida($values = null){
	
	require('bienvenida.php');
	}
	function executeAcceso($values = null)
	{
		$securimage = new Securimage();
		$captcha = $values['ct_captcha'];
		/*if ($securimage->check($captcha) == false) {
		  $errors['captcha_error'] = 'Incorrect security code entered<br />';
				$values['errors'] = "Imagen incorrecta";
				require('login.php');die;
		}*/
		$Login = new Login();
		$q = $Login->GetLogin($values["nom_usuario"],$values["clave"]);
		//echo $q;die;
		if(count($q)> 0)
		{	
                        
			$_SESSION['id_usuario'] = $q[0]['id_usuario'];
			$_SESSION['nom_usuario'] = $q[0]['nom_usuario'];
                        $_SESSION['id_grupo'] = $q[0]['id_grupo'];
			executeBienvenida($values);
		}
		else
		{
			$values = null;
			$values["errors"] = "Usuario o clave incorrecto";
			executeIndex($values);
		}
	}
	function executeLogout($values = null){
        session_destroy();
	unset($_SESSION['id_perms'],$_SESSION['id_user'],$_SESSION['id_company'],$_SESSION['name'],$_SESSION['login']);

	require('login.php');
	}
