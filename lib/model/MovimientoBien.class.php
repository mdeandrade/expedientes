<?php



	class MovimientoBien
	{
		function saveMovimientoBien($values){
			
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->movimiento_bien()->insert($values);
					
			
		}
		function updateMovimientoBien($values){
			
			
		}
		function getMovimientosList($values){
			
			
		}

	}