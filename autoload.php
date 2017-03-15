<?php
session_start();
$_SERVER["DOCUMENT_ROOT"] = "/var/www/";
error_reporting(1);
$project_folder = '/Sistema_RRHH';
$development_env = false;
if($_SERVER['HTTP_HOST'] == '127.0.0.1' or $_SERVER['HTTP_HOST'] == 'localhost' or strpos($_SERVER['HTTP_HOST'], "localhost") !== false)
{
	$development_env = true;
}
if($development_env == true)
{
    $project_folder = '/Sistema_RRHH';
}

define("main_folder",$project_folder);//Project name and directory name//prueba 2
define("title","Sistema de Registro y Control Interno de Expedientes de los Trabajadores de la Contraloría Metropolitana de Caracas.");
define("Author","DENINSON CABEZA");
define("Company","Sistema_RRHH");
define("version","");
define("development_by","CMC");
define("upload_temp_dir",$_SERVER["DOCUMENT_ROOT"]."/".main_folder."/web/uploads/temp");
define("upload_dir",$_SERVER["DOCUMENT_ROOT"]."/".main_folder."/web/uploads/documentos");
define("images_dir","../../../../web/images/");

/* configuraciones apache*/
$base_dir  = __DIR__; // Absolute path to your installation, ex: /var/www/mywebsite
$doc_root  = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
$base_url  = preg_replace("!^${doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$port      = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
$domain    = $_SERVER['SERVER_NAME'].$project_folder;
$full_url  = "${protocol}://${domain}";

define("base_dir",__DIR__);// Absolute path to your installation, ex: /var/www/mywebsite
define("doc_root", preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']));// ex: /var/www
define("base_url",preg_replace("!^${doc_root}!", '', $base_dir));# ex: '' or '/mywebsite'
define("protocol",empty($_SERVER['HTTPS']) ? 'http' : 'https');
define("port",$_SERVER['SERVER_PORT']);
define("disp_port",($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port");
define("domain",$_SERVER['SERVER_NAME'].$project_folder);
define("full_url",protocol."://".domain);
define("image_url",full_url."/web/images/");
/*
 * 
 * You can add more constants
 * -|||--|-
 * |
 * 
 * */
 define('mail_from',"tecnologia@cmc.gob.ve");
 define('message_updated',"Registro actualizado satisfactoriamente");
 define('message_created',"Registro creado satisfactoriamente");

//Class definition
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/notorm-master/NotORM.php");//se debe incluir una sola vez en todo el cms
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/ConnectionORM.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/ConnectionSiga.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/Utilitarios.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/vendors/swiftmailer/lib/swift_required.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/ValidateBase.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/vendors/securimage/securimage.php');
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/model/Login.class.php');
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/model/Usuarios.class.php');
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/model/ListasDependientes.class.php');
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/model/Grupos.class.php');
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/model/Cargos.class.php');
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/model/Ubicaciones.class.php');
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/model/Folios.class.php');
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/model/Personal.class.php');
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/model/Expedientes.class.php');
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/model/ExpedientesDetalles.class.php');
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/model/ExpedientesPrestamos.class.php');


/*validation class*/

//include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/vendor/GUMP/gump.class.php");


/***
 Class autoloads by model_base_generator.php
**/
//include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Users.class.php");

