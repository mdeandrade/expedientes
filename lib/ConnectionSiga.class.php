<?php


	class ConnectionSiga {
            
                function __construct() 
                {
                    $this->dbname = "SIMA";
                    $this->host = '192.168.5.16';
                    $this->port = "5432";
                    $this->charset = "utf8";
					$this->schema = "SIMA010";
                    $this->dsn = "pgsql:dbname=".$this->dbname.";host=".$this->host.";port=".$this->port;  
                    $this->username = 'postgres';
                    $this->password = 'postgres';
                    
                }            
		public function getConnect($connect = ''){
				
                    $connection = @new PDO($this->dsn,$this->username, $this->password,array(PDO::ATTR_PERSISTENT => true,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                   
					$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                    $connection->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
					$connection->exec("SET search_path TO '".$this->schema."'");
                    $connect = new NotORM($connection);
			
		return $connect;                    
                    
                    
	
		}
		
		
		
		
	}
