<?php



	class UbicacionBien
	{
		public function getListaBienes($values)
		{	
			$columns = array();
			$columns[0] = 'codmue';
			$columns[1] = 'desmue';
			$columns[2] = 'marmue';
			$columns[3] = 'colmue';
			$columns[4] = 'tipmue';
            $columns[5] = 'sermue';
			$columns[6] = 'ubi.descripcion';
			$column_order = $columns[0];
			$where = " 1 =  1 ";
			$order = 'asc';
			$limit = $values['length'];
			$offset = $values['start'];
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where = "upper(codmue) like upper('%$str%')"
					. "OR upper(marmue) like upper('%".$str."%')"
					. "OR upper(colmue) like upper('%".$str."%')"
					. "OR upper(tipmue) like upper('%".$str."%')"
					. "OR upper(sermue) like upper('%".$str."%')";
			}
			
			if(isset($values['columns'][0]['search']['value']) and $values['columns'][0]['search']['value']!='')
			{
				$where.=" AND upper(codmue) like (upper('%".$values['columns'][0]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}
			if(isset($values['columns'][1]['search']['value']) and $values['columns'][1]['search']['value']!='')
			{
				$where.=" AND upper(desmue) like (upper('%".$values['columns'][1]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][2]['search']['value']) and $values['columns'][2]['search']['value']!='')
			{
				$where.=" AND upper(marmue) like (upper('%".$values['columns'][2]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][3]['search']['value']) and $values['columns'][3]['search']['value']!='')
			{
				$where.=" AND upper(colmue) like (upper('%".$values['columns'][3]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			if(isset($values['columns'][4]['search']['value']) and $values['columns'][4]['search']['value']!='')
			{
				$where.=" AND upper(tipmue) like (upper('%".$values['columns'][4]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			if(isset($values['columns'][5]['search']['value']) and $values['columns'][5]['search']['value']!='')
			{
				$where.=" AND upper(sermue) like (upper('%".$values['columns'][5]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			if(isset($values['columns'][6]['search']['value']) and $values['columns'][6]['search']['value']!='')
			{
				$where.=" AND upper(ubi.descripcion) like (upper('%".$values['columns'][6]['search']['value']."%'))";
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
			
		
			$q = $ConnectionORM->getConnect('')->ubicacion_bien
			->select("*")
			->join('ubicaciones_internas','INNER JOIN ubicaciones_internas ubi ON ubi.id_ubicacion_int = ubicacion_bien.id_ubicacion_int')
			->order("$column_order $order")
			->where("$where")
			->limit($limit,$offset);
			//echo $q;die;
			return $q; 			
		}
		public function getCountListaBienes($values)
		{	
			$where = " 1 = 1 ";
			
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where = "upper(codmue) like upper('%$str%')"
					. "OR upper(marmue) like upper('%".$str."%')"
					. "OR upper(colmue) like upper('%".$str."%')"
					. "OR upper(tipmue) like upper('%".$str."%')"
					. "OR upper(sermue) like upper('%".$str."%')";
			}
			
			if(isset($values['columns'][0]['search']['value']) and $values['columns'][0]['search']['value']!='')
			{
				$where.=" AND upper(codmue) like (upper('%".$values['columns'][0]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}
			if(isset($values['columns'][1]['search']['value']) and $values['columns'][1]['search']['value']!='')
			{
				$where.=" AND upper(desmue) like (upper('%".$values['columns'][1]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][2]['search']['value']) and $values['columns'][2]['search']['value']!='')
			{
				$where.=" AND upper(marmue) like (upper('%".$values['columns'][2]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][3]['search']['value']) and $values['columns'][3]['search']['value']!='')
			{
				$where.=" AND upper(colmue) like (upper('%".$values['columns'][3]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			if(isset($values['columns'][4]['search']['value']) and $values['columns'][4]['search']['value']!='')
			{
				$where.=" AND upper(tipmue) like (upper('%".$values['columns'][4]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			if(isset($values['columns'][5]['search']['value']) and $values['columns'][5]['search']['value']!='')
			{
				$where.=" AND upper(sermue) like (upper('%".$values['columns'][5]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			if(isset($values['columns'][6]['search']['value']) and $values['columns'][6]['search']['value']!='')
			{
				$where.=" AND upper(ubi.descripcion) like (upper('%".$values['columns'][6]['search']['value']."%'))";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			
			
            $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ubicacion_bien
			->select("count(*) as cuenta")
			->join('ubicaciones_internas','INNER JOIN ubicaciones_internas ubi ON ubi.id_ubicacion_int = ubicacion_bien.id_ubicacion_int')
			->where("$where")->fetch();
			return $q['cuenta']; 			
		}

		function saveUbicacionBien($values){
			
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ubicacion_bien()->insert($values);
			//$values['idPoliza'] = $ConnectionORM->getConnect()->Polizas()->insert_id();
			
		}
		function updateUbicacionBien($values){
			
			$codmue = $values['codmue'];
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ubicacion_bien("codmue", $codmue)->update($values);			
			
		}
		function deleteUbicacionBien($codmue){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ubicacion_bien("codmue", $codmue)->delete();
			
			
		}
		public function getExisteCodmue($codmue){
			
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ubicacion_bien
			->select("count(*) as cuenta")
			->where("codmue=?",$codmue)
            ->fetch();
			return $q['cuenta']; 				
			
		}


	}