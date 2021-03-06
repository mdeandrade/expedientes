<?php

	/*
	 * To change this license header, choose License Headers in Project Properties.
	 * To change this template file, choose Tools | Templates
	 * and open the template in the editor.
	 */

	/**
	 * Description of ExpedientesPrestamos
	 *
	 * @author marcos
	 */
	class ExpedientesPrestamos {
		
		public function __construct() 
		{
			
		}
		public function getExpedientesPrestamosList($values)
		{	
			$columns = array();
			$columns[0] = 'id_expediente_prestamo';
			$columns[1] = 'cod_expediente';
			$columns[2] = 'apellidos';
			$columns[3] = 'nom_estatus';
			$column_order = $columns[0];
			$where = '1 = 1';
			$order = 'asc';
			$limit = $values['length'];
			$offset = $values['start'];
			
			if(isset($values['columns'][0]['search']['value']) and $values['columns'][0]['search']['value']!='')
			{
				$where.=" AND id_expediente_prestamo = ".$values['columns'][0]['search']['value']."";
				//echo $values['columns'][0]['search']['value'];die;
			}
			if(isset($values['columns'][1]['search']['value']) and $values['columns'][1]['search']['value']!='')
			{
				$where.=" AND upper(cod_expediente) like ('%".$values['columns'][1]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][2]['search']['value']) and $values['columns'][2]['search']['value']!='')
			{
				$where.=" AND upper(apellidos) like ('%".$values['columns'][2]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][3]['search']['value']) and $values['columns'][3]['search']['value']!='')
			{
				$where.=" AND upper(nom_estatus) like ('%".$values['columns'][3]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}	
				
			
			
			if(isset($values['order'][0]['column']) and $values['order'][0]['column']!='0')
			{
				$column_order = $columns[$values['order'][0]['column']];
			}
			if(isset($values['order'][0]['dir']) and $values['order'][0]['dir']!='0')
			{
				$order = $values['order'][0]['dir'];//asc o desc
			}
			//echo $column_order;die;
            $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes_prestamos
			->select("*, nom_estatus")
                        ->join("expedientes","INNER JOIN expedientes exp on exp.id_expediente = expedientes_prestamos.id_expediente")  
                        ->join("personal","INNER JOIN personal p on p.id_persona = exp.id_persona")        
                        ->join("estatus","INNER JOIN estatus e on e.id_estatus = exp.id_estatus")   
			
     
			->where("$where")
                        ->order("$column_order $order")
			->limit($limit,$offset);
			//echo $q;die;
			return $q; 			
		}
		public function getCountExpedientesPrestamosList($values)
		{	
			$where = '1 = 1';
			if(isset($values['columns'][0]['search']['value']) and $values['columns'][0]['search']['value']!='')
			{
				$where.=" AND id_expediente_prestamo = ".$values['columns'][0]['search']['value']."";
				//echo $values['columns'][0]['search']['value'];die;
			}
			if(isset($values['columns'][1]['search']['value']) and $values['columns'][1]['search']['value']!='')
			{
				$where.=" AND upper(nom_usuario) like ('%".$values['columns'][1]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][2]['search']['value']) and $values['columns'][2]['search']['value']!='')
			{
				$where.=" AND upper(nom_grupo) like ('%".$values['columns'][2]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][3]['search']['value']) and $values['columns'][3]['search']['value']!='')
			{
				$where.=" AND upper(nom_estatus) like ('%".$values['columns'][3]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}
                        $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes_prestamos
			->select("count(*) as cuenta")	
                        ->join("expedientes","INNER JOIN expedientes exp on exp.id_expediente = expedientes_prestamos.id_expediente")  
                        ->join("personal","INNER JOIN personal p on p.id_persona = exp.id_persona")        
                        ->join("estatus","INNER JOIN estatus e on e.id_estatus = exp.id_estatus") 
                        ->where("$where")
			->fetch();
			return $q['cuenta']; 			
		}
		public function getExpedientesPrestamosById($values){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes_prestamos
			->select("*")
			->where("expedientes_prestamos.id_expediente_prestamo=?",$values['id_expediente_prestamo'])
			->fetch();
                        return $q; 				
			
		}
		function deleteUser($id_user){
			unset($values['action']);
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->users("id_user", $id_user)->delete();
			
			
		}		
		function saveExpedientesPrestamos($values){
			 
                        $array = array(
                            "id_expediente" => $values['id_expediente'],
                            "id_persona" => $values['id_persona'],
                            "fec_prestamo" => $values['fec_prestamo'],
                            "aprobado" => "S",
                            "autorizado_por" => $values['autorizado_por'],
                            "documento" => $values['documento'],
                            "numero_documento" => $values['numero_documento'],
                            "fec_documento" => $values['fec_documento'],
                            "fec_devolucion" => $values['fec_devolucion']
                            
                        );
                        //print_r($array);;die;
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes_prestamos()->insert($array);
			$values['id_expediente_prestamo'] = $ConnectionORM->getConnect()->expedientes_prestamos()->insert_id();
			return $values;	
			
		}
		function updateExpedientesPrestamos($values){

                        $array = array(
                            'fec_devolucion' => $values['fec_devolucion']
                            
                        );
                        
			$id_expediente_prestamo = $values['id_expediente_prestamo'];
                        //echo $id_expediente_prestamo;die;
                        //echo $id_expediente_prestamo;die;
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes_prestamos("id_expediente_prestamo", $id_expediente_prestamo)->update($array);
			return $q;
			
		}
		function updateUserData($values){
			unset($values['PHPSESSID']);
			unset($values['action'],$values['date_created']);
                        $values['date_updated'] = new NotORM_Literal("NOW()");
			$id_users = $values['id_users'];
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->users_data("id_users", $id_users)->update($values);
			
			return $q;
			
		}
		function activeUserMasterCompany($id_company){		
			$ConnectionORM = new ConnectionORM();
			$status = 1;
			$date_updated = new NotORM_Literal("NOW()");
			//obtengo el usuario master
			$q = $ConnectionORM->getConnect()->users_company
			->select("id_user")->where("id_company=?",$id_company)->fetch();			
			$id_user =  $q['id_user'];
			
			//obtengo datos de la compañia
			$q = $ConnectionORM->getConnect()->company
			->select("*")->where("id=?",$id_company)->fetch();			
			$rif =  $q['rif'];			

			//actualizo el status del usuario master a 1 activo
			$q = $ConnectionORM->getConnect()->users("id_user", $id_user)->update(array('status'=>$status,'date_updated'=>$date_updated));

			//actualizo el status de la permisologia master a 1 activo
			$q = $ConnectionORM->getConnect()->users_perms("id_user", $id_user)->update(array('status'=>$status,'date_updated'=>$date_updated));
			
			//actualizo el users_company  a 1 activo
			$q = $ConnectionORM->getConnect()->users_company->where("id_user=?", $id_user)->and("id_company=?", $id_company)->update(array('status'=>$status,'date_updated'=>$date_updated));
			
			//actualizo el status de la compañia a 1 activo
			$q = $ConnectionORM->getConnect()->company->where("id", $id_company)->update(array('status'=>$status,'date_updated'=>$date_updated));			
			
			//actualizo el status de la company_validation_ve a 1 activo
			$q = $ConnectionORM->getConnect()->company_validation_ve->where("rif", $rif)->update(array('status'=>$status,'validate'=>$status));			

                        //actualizo el status de los arcivos a 1 activo
			$q = $ConnectionORM->getConnect()->company_files->where("id_company", $id_company)->update(array('status'=>$status,'date_updated'=>$date_updated,'validate'=>$status));			
		
			/*$Aws = new Aws();
			$Aws->activarGruero($id_user);*/
		}
		function inactiveUserMasterCompany($id_company){		
			$ConnectionORM = new ConnectionORM();
			$status = 0;
			$date_updated = new NotORM_Literal("NOW()");
			//obtengo el usuario master
			$q = $ConnectionORM->getConnect()->users_company
			->select("id_user")->where("id_company=?",$id_company)->fetch();			
			$id_user =  $q['id_user'];
			
			//obtengo datos de la compañia
			$q = $ConnectionORM->getConnect()->company
			->select("*")->where("id=?",$id_company)->fetch();			
			$rif =  $q['rif'];			

			//actualizo el status del usuario master a 1 activo
			$q = $ConnectionORM->getConnect()->users("id_user", $id_user)->update(array('status'=>$status,'date_updated'=>$date_updated));

			//actualizo el status de la permisologia master a 1 activo
			$q = $ConnectionORM->getConnect()->users_perms("id_user", $id_user)->update(array('status'=>$status,'date_updated'=>$date_updated));
			
			//actualizo el users_company  a 1 activo
			$q = $ConnectionORM->getConnect()->users_company->where("id_user=?", $id_user)->and("id_company=?", $id_company)->update(array('status'=>$status,'date_updated'=>$date_updated));
			
			//actualizo el status de la compañia a 1 activo
			$q = $ConnectionORM->getConnect()->company->where("id", $id_company)->update(array('status'=>$status,'date_updated'=>$date_updated));			
			
			$Aws = new Aws();
			$Aws->desactivarGruero($id_user);

		}		
		public function getExpedientesPrestamosOperatorList($values)
		{	
			$columns = array();
			$columns[0] = 'id_user';
			$columns[1] = 'login';
			$columns[2] = 'registration_plate';
			$columns[3] = 'password';
			$columns[4] = 'status';
            $columns[5] = 'date_created';
            $columns[6] = 'date_updated';
			$column_order = $columns[0];
			$where = '1 = 1';
			$order = 'asc';
			$limit = $values['length'];
			$offset = $values['start'];
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where = "upper(login) like upper('%$str%')";
			}
			if(isset($values['order'][0]['column']) and $values['order'][0]['column']!='0')
			{
				$column_order = $columns[$values['order'][0]['column']];
			}
			if(isset($values['order'][0]['dir']) and $values['order'][0]['dir']!='0')
			{
				$order = $values['order'][0]['dir'];//asc o desc
			}
			//echo $column_order;die;
            $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->users
			->select("DISTINCT users.*,hoist.registration_plate, DATE_FORMAT(users.date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(users.date_updated, '%d/%m/%Y %H:%i:%s') as date_updated,first_name, first_last_name")
			->join("users_company","INNER JOIN users_company on users_company.id_user = users.id_user")
			->join("users_perms","INNER JOIN users_perms on users_perms.id_user = users.id_user")
			->join("users_data","INNER JOIN users_data on users_data.id_users = users.id_user")
			->join("users_hoist_company","LEFT JOIN users_hoist_company on users_hoist_company.id_user = users.id_user")
			->join("hoist","LEFT JOIN hoist on hoist.id = users_hoist_company.id_hoist ")
			->order("$column_order $order")
			->where("$where")
			->and("users_company.id_company =?",$values["company"])
			//->and("users_perms.id_perms =?",4)
                        ->and("users_company.status =1")
                        //->and("users.status =1")
			->limit($limit,$offset);
			return $q; 			
		}
		public function getCountExpedientesPrestamosOperatorList($values)
		{	
			$where = '1 = 1';
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where = "upper(login) like upper('%$str%') ";
			}
            $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->users
			->select("count(*) as cuenta")
			->join("users_company","INNER JOIN users_company on users_company.id_user = users.id_user")
			->join("users_perms","INNER JOIN users_perms on users_perms.id_user = users.id_user")
			->where("$where")
			->and("users_company.id_company =?",$values["company"])
			//->and("users_perms.id_perms =?",4)
			->fetch();
			return $q['cuenta']; 			
		}
		function saveUserOperator($values){
			unset($values['PHPSESSID']);
			$user = array("login" => $values["login"],
						  "password" => hash('sha256', $values['password']),
						  "status" => $values["status"],
						  "mail"=>$values["mail"]);
			$user["date_created"] = date("Y-m-d H:i:s");
			$user["date_updated"] = date("Y-m-d H:i:s");
			unset($values['action']);
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->users()->insert($user);
			$values['id_user'] = $ConnectionORM->getConnect()->users()->insert_id();
			
			$userData = array("first_name"=>$values["first_name"],
							  "second_name"=>$values["second_name"],
							  "first_last_name"=>$values["first_last_name"],
							  "second_last_name"=>$values["second_last_name"],
							  "gender"=>$values["gender"],
							  "nationality"=>$values["nationality"],
							  "document"=>$values["document"],
							  "phone"=>$values["phone"],
							  "id_users" => $values['id_user'],
							  //"certificado_file" => $values['certificado_file'],
							  "document_file" => $values['document_file']);
			$userData['date_created'] = date("Y-m-d H:i:s");
			$userData['date_updated'] = date("Y-m-d H:i:s");
			
			$userPerms = array("id_user" => $values['id_user'],
							   "id_perms" => 4);
			$userCompany = array("id_company" => $_SESSION["id_company"],
								 "id_user" => $values['id_user']);
			
			$usershoistcompany = array("id_company" => $_SESSION["id_company"],
										"id_user" => $values['id_user'],
										 "id_hoist" => $values['id_hoist']);
			
			$q = $ConnectionORM->getConnect()->users_data()->insert($userData);
			$q = $ConnectionORM->getConnect()->users_perms()->insert($userPerms);
			$q = $ConnectionORM->getConnect()->users_company()->insert($userCompany);
			//$q = $ConnectionORM->getConnect()->users_hoist_company()->insert($usershoistcompany);
			return $values;	
			
		}
		public function getUserOperatorById($values){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->users
			->select("*, DATE_FORMAT(users.date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(users.date_updated, '%d/%m/%Y %H:%i:%s') as date_updated,hoist.id AS id_hoist, users.status as status,users.id_user")
			->join("users_data","INNER JOIN users_data on users_data.id_users = users.id_user")	
			->join("users_hoist_company","LEFT JOIN users_hoist_company on users_hoist_company.id_user = users.id_user")
			->join("hoist","LEFT JOIN hoist on hoist.id = users_hoist_company.id_hoist")	
			->where("users.id_user=?",$values['id_user'])			
			->fetch();
			return $q; 				
			
		}
		function updateUserOperator($values){
			unset($values['PHPSESSID']);
			unset($values['action'],$values['date_created']);
            $user = array("status" => $values["status"]);
			$user["date_updated"] = date("Y-m-d H:i:s");
			$id_user = $values['id_user'];
			$ConnectionORM = new ConnectionORM();
			
			
			$userData = array("status"=>$values["status"],
							  "id_user" => $values['id_user']);
			$userData['date_updated'] = date("Y-m-d H:i:s");
			
			
			$q = $ConnectionORM->getConnect()->users("id_user", $id_user)->update($userData);
			return $q;
			
		}
		function comparePasswordByUser($values){
			$valid = false;
			$id_expediente_prestamo = $_SESSION['id_expediente_prestamo'];
			$clave = hash("sha256", $values['clave_anterior']);
                        $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->usuarios
			->select("count(*) as cuenta")
			->where("id_expediente_prestamo=?",$id_expediente_prestamo)
			->and("clave=?",$clave)
			->fetch();
                        //echo $q;die;
			$cuenta = $q['cuenta'];
			if($cuenta > 0)
			{
				$valid = true;
			}
			return $valid;
		}		
		function changePassword($values){
			$id_expediente_prestamo = $_SESSION['id_expediente_prestamo'];
                        //echo $id_expediente_prestamo;die;
                        $array = array(
                            'clave' => hash('sha256',$values['clave_nueva']) 
                        );
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->usuarios("id_expediente_prestamo", $id_expediente_prestamo)->update($array);
			return $q;
			
		}
		function getLogin($values){
			$ConnectionORM = new ConnectionORM();			
			$where = "upper(users.login) = '".strtoupper($values['login'])."'";
			$where.= " and users.password = '".hash("sha256",$values['password'])."'";
			$where.= " and users.status = 1";
			$where.= " and users_perms.status = 1";
			$where.= " and users_perms.id_perms = 2";
			$q = $ConnectionORM->getConnect()->users
			->select("*,users_perms.id_perms")
			->join("users_data","INNER JOIN users_data on users_data.id_users = users.id_user")
			->join("users_perms","INNER JOIN users_perms on users_perms.id_user = users.id_user")
			->where("$where")
			->fetch();
			return $q; 				
			
			
		}
		public function getUserModifById($values){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->users
			->select("*, DATE_FORMAT(users.date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(users.date_updated, '%d/%m/%Y %H:%i:%s') as date_updated")
			->join("users_perms","INNER JOIN users_perms on users_perms.id_user = users.id_user")		
			->where("users.id_user=?",$values['id_user'])->fetch();
			return $q; 				
			
		}
		

	}
	
