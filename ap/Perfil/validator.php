<?php


 
 
	function validate($values,$files = null){


		
		$errors = array();
		$validator_values = array();
 

		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		
                if(!isset($values['clave_anterior']) or $values['clave_anterior']==''){
                    $errors['clave_anterior'] = ' Debe colocar la clave anterior';
                }
                if(!isset($values['clave_nueva']) or $values['clave_nueva']==''){
                    $errors['clave_nueva'] = ' Debe colocar la clave nueva';
                }
                if(!isset($values['clave_nueva2']) or $values['clave_nueva2']==''){
                    $errors['clave_nueva2'] = ' Debe confirmar la clave nueva';
                }                
                
                
                if(isset($values['clave_nueva']) and isset($values['clave_nueva2'])){
                    
                    if($values['clave_nueva']!=$values['clave_nueva2'])
                    {
                        $errors['clave_nueva2'] = ' Al confirmar la clave debe coincidir';
                    }else
                    {
                        if(isset($values['clave_nueva']) and isset($values['clave_anterior'])){

                            if($values['clave_nueva']==$values['clave_anterior'])
                            {
                                $errors['clave_nueva'] = ' La clave nueva es igual a la anterior';
                            }

                        } 
                    }
                    
                }
                
                
                if(isset($values['clave_anterior']) and $values['clave_anterior'] !=''){
                    
                    $Usuarios = new Usuarios();
                    $es_clave_anterior = $Usuarios->comparePasswordByUser($values);
                    if(!$es_clave_anterior){
                        $errors['clave_anterior'] = 'La clave anterior no coincide';
                    }
                }
                
                if(isset($values['clave_nueva']) and (strlen($values['clave_nueva']) < 6 or strlen($values['clave_nueva']) >12)  ){
                    $errors['clave_nueva'] = 'La clave debe contener entre 6 y 12 caracteres';
                }
                
             
                return $errors;
		
		
	}
	