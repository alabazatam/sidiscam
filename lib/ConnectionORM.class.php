<?php


	class ConnectionORM {
		public function connect($dns,$user,$password){
			//error_reporting(E_ALL | E_STRICT);
			//include dirname(__FILE__) . "/notorm-master/NotORM.php";
			
			$connection = new PDO($dns,$user, $password);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$connection->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
			$connect = new NotORM($connection);
			
			return $connect;	
					
			
		}
		
		public function getConnect($connect){
				switch ($connect) {
					case 'sidiscam':
						$dns = "mysql:dbname=sidiscam;host=localhost;port=3306;charset=utf8";
						$user =  "root";
						$password = "230386";
										
					break;								
					default:
						echo "Error on connection <hr>";die;
					break;
							
					
					
			}
				return $this->connect($dns, $user, $password);
	
		}
		
		
		
		
	}
