<?php

	/*
	 * To change this license header, choose License Headers in Project Properties.
	 * To change this template file, choose Tools | Templates
	 * and open the template in the editor.
	 */

	/**
	 * Description of Expedientes
	 *
	 * @author marcos
	 */
	class Expedientes {
		
		public function __construct() 
		{
			
		}
		public function getExpedientesList($values)
		{	
			$columns = array();
			$columns[0] = 'id_expediente';
			$columns[1] = 'cod_expediente';
			$columns[2] = "apellidos";
			$columns[3] = 'nom_estatus';
			$column_order = $columns[0];
			$where = '1 = 1';
			$order = 'asc';
			$limit = $values['length'];
			$offset = $values['start'];
			
			if(isset($values['columns'][0]['search']['value']) and $values['columns'][0]['search']['value']!='')
			{
				$where.=" AND id_expediente = ".$values['columns'][0]['search']['value']."";
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
			$q = $ConnectionORM->getConnect()->expedientes
			->select("*,nom_estatus, concat(apellidos, ' ', nombres) as nom_funcionario")
			->order("$column_order $order")
                        ->join("estatus","INNER JOIN estatus e on e.id_estatus = expedientes.id_estatus")        
			->join("personal","INNER JOIN personal p on p.id_persona = expedientes.id_persona")
                        ->where("$where")
			->limit($limit,$offset);
			//echo $q;die;
			return $q; 			
		}
		public function getCountExpedientesList($values)
		{	
			$where = '1 = 1';
			if(isset($values['columns'][0]['search']['value']) and $values['columns'][0]['search']['value']!='')
			{
				$where.=" AND id_expediente = ".$values['columns'][0]['search']['value']."";
				//echo $values['columns'][0]['search']['value'];die;
			}
			if(isset($values['columns'][1]['search']['value']) and $values['columns'][1]['search']['value']!='')
			{
				$where.=" AND upper(cod_expediente) like ('%".$values['columns'][1]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][2]['search']['value']) and $values['columns'][2]['search']['value']!='')
			{
				$where.=" AND upper(concat(apellidos, ' ', nombres)) like ('%".$values['columns'][3]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][3]['search']['value']) and $values['columns'][3]['search']['value']!='')
			{
				$where.=" AND upper(nom_estatus) like ('%".$values['columns'][3]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}
                        $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes
			->select("count(*) as cuenta")	
                        ->join("estatus","INNER JOIN estatus e on e.id_estatus = expedientes.id_estatus") 
			->join("personal","INNER JOIN personal p on p.id_persona = expedientes.id_persona")
                        ->where("$where")
			->fetch();
			return $q['cuenta']; 			
		}
		public function getUserById($values){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes
			->select("*")
			->where("expedientes.id_expediente=?",$values['id_expediente'])
			->fetch();
			return $q; 				
			
		}
		public function getExpedienteByIdPersona($id_persona){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes
			->select("*")
			->where("expedientes.id_persona=?",$id_persona)
			->fetch();
			return $q['id_expediente']; 				
			
		}
		public function getExpedienteByCedula($doc_iden){
                    
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes
			->select("count(*) as cuenta")
			->join("personal","INNER JOIN personal on personal.id_persona = expedientes.id_persona ")

			->where("personal.doc_iden=?",strtoupper($doc_iden))
			->fetch();
                        //echo $q;
			return $q['cuenta']; 				
			
		}
		function deleteUser($id_user){
			unset($values['action']);
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->users("id_user", $id_user)->delete();
			
			
		}		
		function saveUser($values){
			 
                        $array = array(
                            "id_persona" => $values['id_persona'],
                            "id_expediente" => $values['id_persona'],
                            "nom_expediente" => $values['nom_expediente'],
                            "id_grupo" => $values['id_grupo'],
                            "clave" => hash('sha256',$values['clave']),
                            "id_estatus" => $values['id_estatus']
                            
                        );
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes()->insert($array);
			$values['id_expediente'] = $ConnectionORM->getConnect()->expedientes()->insert_id();
			return $values;	
			
		}
		function updateUser($values){

                        $array = array(
                            'nom_expediente' => $values['nom_expediente'],
                            'id_grupo' => $values['id_grupo'],
                            'id_estatus' => $values['id_estatus'],
                            
                        );
                        
			if(isset($values['clave']) and $values['clave']!='')
			{
				$array['clave'] = hash('sha256', $values['clave']);
			}
			$id_expediente = $values['id_expediente'];
                        //echo $id_expediente;die;
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes("id_expediente", $id_expediente)->update($array);
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
			//obtengo el expediente master
			$q = $ConnectionORM->getConnect()->users_company
			->select("id_user")->where("id_company=?",$id_company)->fetch();			
			$id_user =  $q['id_user'];
			
			//obtengo datos de la compañia
			$q = $ConnectionORM->getConnect()->company
			->select("*")->where("id=?",$id_company)->fetch();			
			$rif =  $q['rif'];			

			//actualizo el status del expediente master a 1 activo
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
			//obtengo el expediente master
			$q = $ConnectionORM->getConnect()->users_company
			->select("id_user")->where("id_company=?",$id_company)->fetch();			
			$id_user =  $q['id_user'];
			
			//obtengo datos de la compañia
			$q = $ConnectionORM->getConnect()->company
			->select("*")->where("id=?",$id_company)->fetch();			
			$rif =  $q['rif'];			

			//actualizo el status del expediente master a 1 activo
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
		public function getExpedientesOperatorList($values)
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
		public function getCountExpedientesOperatorList($values)
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
			$id_expediente = $_SESSION['id_expediente'];
			$clave = hash("sha256", $values['clave_anterior']);
                        $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes
			->select("count(*) as cuenta")
			->where("id_expediente=?",$id_expediente)
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
			$id_expediente = $_SESSION['id_expediente'];
                        //echo $id_expediente;die;
                        $array = array(
                            'clave' => hash('sha256',$values['clave_nueva']) 
                        );
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->expedientes("id_expediente", $id_expediente)->update($array);
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
	
