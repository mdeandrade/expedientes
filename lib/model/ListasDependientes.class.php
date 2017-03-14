<?php

    class ListasDependientes{
        
        
        
        public function getListadoPersonalActivo(){
            $ConnectionORM = new ConnectionORM();
            $q = $ConnectionORM->getConnect()->personal
            ->select("*")
            ->where('id_estatus = ?',1)
            ->and('id_persona not in(select id_persona from usuarios)');
	return $q; 				
			
	}  
        public function getListadoUbicacioneslActivas(){
            $ConnectionORM = new ConnectionORM();
            $q = $ConnectionORM->getConnect()->ubicaciones
            ->select("*")
            ->where('id_estatus = ?',1);
	return $q; 				
			
	}   
         public function getListadoCargosActivos(){
            $ConnectionORM = new ConnectionORM();
            $q = $ConnectionORM->getConnect()->cargos
            ->select("*")
            ->where('id_estatus = ?',1);
	return $q; 				
			
	}
         public function getListadoGruposActivos(){
            $ConnectionORM = new ConnectionORM();
            $q = $ConnectionORM->getConnect()->grupos
            ->select("*")
            ->where('id_estatus = ?',1);
	return $q; 				
			
	}        
        public function getListadoFoliosActivos(){
            $ConnectionORM = new ConnectionORM();
            $q = $ConnectionORM->getConnect()->folios
            ->select("*")
            ->where('id_estatus = ?',1);
	return $q; 				
			
	}             
        
    }

