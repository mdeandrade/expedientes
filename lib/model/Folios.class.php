<?php

	/*
	 * To change this license header, choose License Headers in Project Properties.
	 * To change this template file, choose Tools | Templates
	 * and open the template in the editor.
	 */

	/**
	 * Description of Usuarios
	 *
	 * @author marcos
	 */
	class Folios {
		
		public function __construct() 
		{
			
		}

            public function getListadoFoliosArchivo($archivo){
                $ConnectionORM = new ConnectionORM();
                $q = $ConnectionORM->getConnect()->folios
                ->select("*")
                ->join("folios_tipos_documentos","INNER JOIN folios_tipos_documentos ftd on ftd.id_folio = folios.id_folio")  
                ->join("tipos_documentos","INNER JOIN tipos_documentos td on td.id_tipdoc = ftd.id_tipdoc")  
                ->where('folios.archivo = ?',$archivo);
                return $q; 				

            }
            public function getListadoFolios(){
                $ConnectionORM = new ConnectionORM();
                $q = $ConnectionORM->getConnect()->folios
                ->select("*")
                ->join("folios_tipos_documentos","INNER JOIN folios_tipos_documentos ftd on ftd.id_folio = folios.id_folio")  
                ->join("tipos_documentos","INNER JOIN tipos_documentos td on td.id_tipdoc = ftd.id_tipdoc");
                return $q; 				

            }
            public function getNomFolio($id_folio){
                $ConnectionORM = new ConnectionORM();
                $q = $ConnectionORM->getConnect()->folios
                ->select("*")
                ->where('id_folio=?',$id_folio)
                ->fetch();
                return $q['nom_folio']; 				

            }            

	}
	
