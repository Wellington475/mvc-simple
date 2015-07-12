<?php
	namespace App\Helpers;
	
	class Database
	{
		public $pdo;

		function __construct(){
			$this->Connect();	
		}

		private function Connect(){
			try{
				$this->pdo = new \PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname='.DB_NAME, DB_USER, DB_PASS, array(\PDO::ATTR_PERSISTENT => true));
			
				$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
				
			}
			catch(\PDOException $e){
				echo $e->getMessage();
				die();
			}
		}
		public function close(){
			$this->pdo = null;
		}
	}
?>