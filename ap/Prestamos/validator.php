<?php


 
 
	function validate($values,$files = null){


                
		$errors = array();
		$validator_values = array();
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
                
                
                if(!isset($values['id_persona']) or $values['id_persona'] == '')
                {
                    $errors['id_persona'] = 'Debe seleccionar al solicitante';
                }
                if(!isset($values['fec_prestamo']) or $values['fec_prestamo'] == '')
                {
                    $errors['fec_prestamo'] = 'Debe indicar la fecha de préstamo';
                }                
                if(!isset($values['documento']) or $values['documento'] == '')
                {
                    $errors['documento'] = 'Debe indicar el tipo del documento';
                } 
                if(!isset($values['numero_documento']) or $values['numero_documento'] == '')
                {
                    $errors['numero_documento'] = 'Debe indicar el número del documento';
                }  
                if(!isset($values['fec_documento']) or $values['fec_documento'] == '')
                {
                    $errors['fec_documento'] = 'Debe indicar la fecha del documento';
                }
                if(!isset($values['autorizado_por']) or $values['autorizado_por'] == '')
                {
                    $errors['autorizado_por'] = 'Debe indicar quién autorizó el préstamo';
                } 
                return $errors;
		
		
	}
	