<?php

	class Bnregmue {
		
		
		function __construct() {
			
		}
		
		
		public function getListaBienes($values)
		{	
			$columns = array();
			$columns[0] = 'codmue';
			$columns[1] = 'desmue';
			$columns[2] = 'marmue';
			$columns[3] = 'colmue';
			$columns[4] = 'tipmue';
            $columns[5] = 'sermue';
			$columns[6] = 'u.desubi';
			$column_order = $columns[0];
			$where = "1 = 1 ";
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
				$where.=" AND upper(codmue) ilike ('%".$values['columns'][0]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}
			if(isset($values['columns'][1]['search']['value']) and $values['columns'][1]['search']['value']!='')
			{
				$where.=" AND upper(desmue) ilike ('%".$values['columns'][1]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][2]['search']['value']) and $values['columns'][2]['search']['value']!='')
			{
				$where.=" AND upper(marmue) ilike ('%".$values['columns'][2]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][3]['search']['value']) and $values['columns'][3]['search']['value']!='')
			{
				$where.=" AND upper(colmue) ilike ('%".$values['columns'][3]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			if(isset($values['columns'][4]['search']['value']) and $values['columns'][4]['search']['value']!='')
			{
				$where.=" AND upper(tipmue) ilike ('%".$values['columns'][4]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			if(isset($values['columns'][5]['search']['value']) and $values['columns'][5]['search']['value']!='')
			{
				$where.=" AND upper(sermue) ilike ('%".$values['columns'][5]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}
			if(isset($values['columns'][6]['search']['value']) and $values['columns'][6]['search']['value']!='')
			{
				$where.=" AND upper(u.desubi) ilike ('%".$values['columns'][6]['search']['value']."%')";
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
            $ConnectionSiga = new ConnectionSiga();
			
		
			$q = $ConnectionSiga->getConnect('')->Bnregmue
			->select("*")				
			->where("$where")
			->order("$column_order $order")
			->limit($limit,$offset);
			//echo $q;die;
			return $q; 			
		}
		public function getCountListaBienes($values)
		{	
			$where = "1 = 1 ";
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
				$where.=" AND upper(codmue) ilike ('%".$values['columns'][0]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}
			if(isset($values['columns'][1]['search']['value']) and $values['columns'][1]['search']['value']!='')
			{
				$where.=" AND upper(desmue) ilike ('%".$values['columns'][1]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][2]['search']['value']) and $values['columns'][2]['search']['value']!='')
			{
				$where.=" AND upper(marmue) ilike ('%".$values['columns'][2]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][3]['search']['value']) and $values['columns'][3]['search']['value']!='')
			{
				$where.=" AND upper(colmue) ilike ('%".$values['columns'][3]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			if(isset($values['columns'][4]['search']['value']) and $values['columns'][4]['search']['value']!='')
			{
				$where.=" AND upper(tipmue) ilike ('%".$values['columns'][4]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			if(isset($values['columns'][5]['search']['value']) and $values['columns'][5]['search']['value']!='')
			{
				$where.=" AND upper(sermue) ilike ('%".$values['columns'][5]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}
			if(isset($values['columns'][6]['search']['value']) and $values['columns'][6]['search']['value']!='')
			{
				$where.=" AND upper(u.desubi) ilike ('%".$values['columns'][6]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}	
	

            $ConnectionSiga = new ConnectionSiga();
			$q = $ConnectionSiga->getConnect()->Bnregmue
			->select("count(*) as cuenta")
			->join("bnubica","LEFT JOIN bnubica u on u.codubi = bnregmue.codubiadm")
			->where("$where")->fetch();
			return $q['cuenta']; 			
		}

		public function getUbicacionesInternas($values)
		{	
            $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ubicaciones_internas
			->select("*")
			->where("status=?",1);
			return $q; 			
		}
		
	}
