<?php


 
 
	function validate($values,$files = null){


		
		$errors = array();
		$validator_values = array();
                
                if($values['action'] == 'add'){
                    $validator_values['id_persona'] = array(

                            "type" => "number",
                            "label" => "Funcionario",
                            "required" => true
                    ); 
                    $validator_values['clave'] = array(

                            "minlength" => 6,
                            "maxlength" => 12,
                            "type" => "text",
                            "label" => "Clave",
                            "required" => true
                    );

                    $validator_values['clave2'] = array(

                            "minlength" => 6,
                            "maxlength" => 12,
                            "type" => "text",
                            "label" => "Clave",
                            "required" => true
                    );
                }
		
		$validator_values['nom_usuario'] = array(
			
			"minlength" => 3,
			"maxlength" => 100,
			"type" => "text",
			"label" => "Nombre de usuario",
			"required" => true
		);
		$validator_values['id_grupo'] = array(
			
			"type" => "number",
			"label" => "Grupo",
			"required" => true
		);

		$validator_values['id_estatus'] = array(
			
			"minlength" => 1,
			"maxlength" => 1,
			"type" => "number",
			"label" => "Estatus",
			"required" => true
		);

		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		
                if($values['action'] == 'add'){
                    if(!isset($values['id_persona']) or $values['id_persona'] ==''){
                        $errors['id_persona'] = 'Debe seleccionar un Funcionario';

                    }
                }
		
                if(!isset($values['id_grupo']) or $values['id_grupo'] ==''){
                    $errors['id_grupo'] = 'Debe seleccionar un Grupo';
                    
                }
                
                
                if( (isset($values['clave']) and $values['clave'] !='') and  (isset($values['clave2']) and $values['clave2'] !='') )
                {
                    if($values['clave']!=$values['clave2'])
                    {
                         $errors['clave2'] = 'La clave al repetirla debe ser igual';
                    }
                }
                
                
                
                return $errors;
		
		
	}
	