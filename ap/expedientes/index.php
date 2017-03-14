<?php include("../../autoload.php");?>	
<?php include("validator.php");?>
<?php include("../security/security.php");?>
<?php $action = "";

if(isset($_REQUEST["action"]) and $_REQUEST["action"]!=""){
	$action = $_REQUEST["action"];
}

$values = $_REQUEST;
$values = array_merge($values,$_FILES);
	switch ($action) {
		case "index":
			executeIndex($values);	
		break;
		case "new":
			executeNew($values);	
		break;
		case "add":
			executeAdd($values);	
		break;
		case "edit":
			executeEdit($values);	
		break;
		case "prestamo":
			executePrestamo($values);	
		break;
		case "update":
			executeUpdate($values);	
		break;
		case "list_json":
			executeListJson($values);	
		break;
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{

		require('list.php');
	}
	function executeNew($values = null,$errors=null)
	{
                $values['action'] = 'add';
		require('registro_view.php');
	}
	function executePrestamo($values = null)
	{

		require('prestamo.php');
	}
	function executeAdd($values = null)
	{
           
            $errors = validate($values,$_FILES);
            if(count($errors)>0){   
		executeNew($values,$errors);die;
            }else{
                 
                //print_r($values);die;
                $Personal = new Personal();
                $values = $Personal->savePersonal($values);
                $Expedientes = new Expedientes();
                $id_expediente = $Expedientes->getExpedienteByIdPersona($values['id_persona']); 
                $ExpedientesDetalles = new ExpedientesDetalles();

                    if(isset($_FILES) and count($_FILES)>0){
                        foreach($_FILES as $key => $value){
                             $hasta = count($_FILES[$key]['name']);
                             for($i=0;$i<=$hasta;$i++){
                                $name = $_FILES[$key]['name'][$i];
                                $size = $_FILES[$key]['size'][$i];
                                $tmp_name = $_FILES[$key]['tmp_name'][$i];

                                if($size > 0){
                               
                                    $porciones = explode("_", $key);
                                    $nom_tipdoc = $porciones[1];
                                    $id_folio = $porciones[2];
                                    $id_tipdoc = $porciones[3];
                                    $ubi_docserver = $nom_tipdoc."_".$i;
                                    $Folios = new Folios();
                                    $nom_folio = $Folios->getNomFolio($id_folio);
                                    $carpeta = "../../web/files/Expedientes";
                                    
                                    $nombreArchivo = $ubi_docserver.".".pathinfo($_FILES[$key]['name'][$i],PATHINFO_EXTENSION);
                                     if (!file_exists($carpeta."/".$values['doc_iden'])) {
                                        mkdir($carpeta."/".$values['doc_iden'], 0777, true);
                                    } 
                                    
                                    if (!file_exists($carpeta."/".$values['doc_iden']."/".$nom_folio)) {
                                        mkdir($carpeta."/".$values['doc_iden']."/".$nom_folio, 0777, true);
                                    }
                                        $fichero_subido = $carpeta."/".$values['doc_iden']."/".$nom_folio."/";
                                        if (move_uploaded_file($_FILES[$key]['tmp_name'][$i], $fichero_subido.$nombreArchivo)){
                                            //inserto en bd;
                                            //echo $key."<br>";//die;
                                            //echo $fichero_subido.$nombreArchivo."<br>";//die;
                                            $ubi_docserver = "/".$values['doc_iden']."/".$nom_folio."/".$nombreArchivo;
                                            $ExpedientesDetalles->deleteExpedienteDetalle($id_expediente, $id_folio, $id_tipdoc, $ubi_docserver);
                                            $ExpedientesDetalles->saveExpedientesDetalles($id_expediente, $id_folio, $id_tipdoc, $ubi_docserver, 1);
                                        }else{
                                            //echo "no se movio";die;
                                        }
                                    
   
                                } 

                             }
                        } 
                        //die;
                    }
                executeEdit($values); die;
            }
        

           
           
           
	}
	function executeEdit($values = null,$errors = null,$msg = null)
	{
		
		$Personal = new Personal();
		$values = $Personal->getPersonalById($values);
		$values['action'] = 'update';
                $values['msg'] = $msg;
		
		require('registro_view.php');die;
	}
	function executeUpdate($values = null)
	{

            $errors = validate($values,$_FILES);
            if(count($errors)>0){
               
		executeEdit($values,$errors);die;
            }else{
               
                $Personal = new Personal();
                $Personal ->updatePersonal($values);
                $msg = "Actualizado correctamente";
                $Expedientes = new Expedientes();
                $id_expediente = $Expedientes->getExpedienteByIdPersona($values['id_persona']); 
                $ExpedientesDetalles = new ExpedientesDetalles();
                //print_r($values);
                //print_r($values);die;
                    if(isset($_FILES) and count($_FILES)>0){
                        foreach($_FILES as $key => $value){
                             $hasta = count($_FILES[$key]['name']);
                             for($i=0;$i<=$hasta;$i++){
                                $name = $_FILES[$key]['name'][$i];
                                $size = $_FILES[$key]['size'][$i];
                                $tmp_name = $_FILES[$key]['tmp_name'][$i];

                                if($size > 0){
                               
                                    $porciones = explode("_", $key);
                                    $nom_tipdoc = $porciones[1];
                                    $id_folio = $porciones[2];
                                    $id_tipdoc = $porciones[3];
                                    $ubi_docserver = $nom_tipdoc."_".$i;
                                    $Folios = new Folios();
                                    $nom_folio = $Folios->getNomFolio($id_folio);
                                    $carpeta = "../../web/files/Expedientes";
                                    
                                    $nombreArchivo = $ubi_docserver.".".pathinfo($_FILES[$key]['name'][$i],PATHINFO_EXTENSION);
                                     if (!file_exists($carpeta."/".$values['doc_iden'])) {
                                        mkdir($carpeta."/".$values['doc_iden'], 0777, true);
                                    } 
                                    
                                    if (!file_exists($carpeta."/".$values['doc_iden']."/".$nom_folio)) {
                                        mkdir($carpeta."/".$values['doc_iden']."/".$nom_folio, 0777, true);
                                    }
                                        $fichero_subido = $carpeta."/".$values['doc_iden']."/".$nom_folio."/";
                                        if (move_uploaded_file($_FILES[$key]['tmp_name'][$i], $fichero_subido.$nombreArchivo)){
                                            //inserto en bd;
                                            //echo $key."<br>";//die;
                                            //echo $fichero_subido.$nombreArchivo."<br>";//die;
                                            $ubi_docserver = "/".$values['doc_iden']."/".$nom_folio."/".$nombreArchivo;
                                            $ExpedientesDetalles->deleteExpedienteDetalle($id_expediente, $id_folio, $id_tipdoc, $ubi_docserver);
                                            $ExpedientesDetalles->saveExpedientesDetalles($id_expediente, $id_folio, $id_tipdoc, $ubi_docserver, 1);
                                        }else{
                                            //echo "no se movio";die;
                                        }
                                    
   
                                } 

                             }
                        } 
                        //die;
                    }
                    //die;
                executeEdit($values,$errors,$msg);die;
            }
		
		
	}
	function executeListJson($values)
	{
		$Expedientes= new Expedientes();
		$list_json = $Expedientes ->getExpedientesList($values);
		$list_json_cuenta = $Expedientes ->getCountExpedientesList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $list_json_cuenta;
		$array_json['recordsFiltered'] = $list_json_cuenta;
		if(count($list_json)>0)
		{
			foreach ($list_json as $list) 
			{

				$id_expediente = $list['id_expediente'];
                                $id_persona = $list['id_persona'];
				$array_json['data'][] = array(
					"id_expediente" => $id_expediente,
                                        "cod_expediente" => $list['cod_expediente'],
					"nom_funcionario" => $list['nom_funcionario'],
					"nom_estatus" => $list['nom_estatus'],
					"actions" => 
                                       '<form method="POST" action = "'.full_url.'/ap/expedientes/index.php" >'
                                       .'<input type="hidden" name="action" value="edit">  '
                                       .'<input type="hidden" name="id_persona" value="'.$id_persona.'">  '
                                       .'<button class="btn btn-default btn-sm" title="Ver detalle" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                        .'</form>'
					);	
			}		
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array(
                            "id_expediente"=>null,
                            "nom_funcionario"=>"",
                            "cod_expediente"=>"",
                            "nom_estatus"=>"",
                            "actions"=>""
                            );
		}
		echo json_encode($array_json);die;
		
	}
		
		
		
	