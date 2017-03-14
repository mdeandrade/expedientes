<?php


 
 
	function validate($values,$files = null){


		
		$errors = array();
		$validator_values = array();
  
		$validator_values['nom_cargo'] = array(
			
			"minlength" => 3,
			"maxlength" => 100,
			"type" => "text",
			"label" => "Nombre de cargo",
			"required" => true
		);
		

		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		
 
                return $errors;
		
		
	}
	