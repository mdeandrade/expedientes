<?php


 
 
	function validate($values,$files = null){


		$Expedientes = new Expedientes();
                
		$errors = array();
		$validator_values = array();
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
                
                if (!preg_match("/^[Vv,Ee][-][1-9][0-9]{5,7}$/", $values['doc_iden'], $matches) and $values['action']=='add')      
                {
                    $errors['doc_iden'] = "Verifique el formato de la cédula (V-1234567)";
                }
                 if (!preg_match("/^[A-Z a-z]{3,80}$/", $values['nombres'], $matches) )      
                {
                    $errors['nombres'] = "El campo debe contener solamente letras";
                }
                if (!preg_match("/^[A-Z a-z]{3,80}$/", $values['apellidos'], $matches))      
                {
                    $errors['apellidos'] = "El campo debe contener solamente letras";
                }
                if(!isset($values['doc_iden'])  and $values['action']=='add')
                {
                    $errors['doc_iden'] = "El campo cédula es requerido";
                }
                if(!isset($values['nombres']) or $values['nombres']=='')
                {
                    $errors['nombres'] = "El campo nombres es requerido";
                }
                if(!isset($values['apellidos']) or $values['apellidos']=='')
                {
                    $errors['apellidos'] = "El campo apellidos es requerido";
                }                
                if(!isset($values['sexo']) or $values['sexo']=='')
                {
                    $errors['sexo'] = "El campo sexo es requerido";
                }
                if(!isset($values['fec_nac']) or $values['fec_nac']=='')
                {
                    $errors['fec_nac'] = "El campo fecha de nacimiento es requerido";
                }
                if(!isset($values['fec_nac']) or $values['fec_nac']=='')
                {
                    $errors['fec_nac'] = "El campo fecha de nacimiento es requerido";
                }
                if(!isset($values['id_cargo']) or $values['id_cargo']=='')
                {
                    $errors['id_cargo'] = "El campo cargo es requerido";
                }
                if(!isset($values['id_ubicacion']) or $values['id_ubicacion']=='')
                {
                    $errors['id_ubicacion'] = "El campo ubicación es requerido";
                } 
                
                if(isset($values['doc_iden']) and $values['doc_iden']!='' and $values['action']=='add')
                {
                    //echo "aaa";die;
                    $existe_cedula = $Expedientes->getExpedienteByCedula($values['doc_iden']);
                    //echo $existe_cedula;die;
                    if($existe_cedula!=0){
                        $errors['doc_iden'] = "Ya existe una persona registrada con el número de cédula indicado";
                    }
                }
                
                
                return $errors;
		
		
	}
	