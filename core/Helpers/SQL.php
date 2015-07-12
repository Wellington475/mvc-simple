<?php
	namespace App\Helpers;

	class SQL extends Database
	{
		
		function __construct(){
			parent::__construct();
		}

		public function insert($table, array $dados){
			foreach ($dados as $keys => $values){
				$campos[] = $keys;
				$valores[] = $values;
			}

			$campos = implode(', ', $campos);
			$valores = "'".implode("', '", $valores)."'";
			
			return $this->pdo->query("INSERT INTO `{$table}` ({$campos}) VALUES ( {$valores})");
		}

		public function read($table, $where = null){
			$where = ($where!=null ? "WHERE {$where}" : "");
			$rs = $this->pdo->query("SELECT * FROM `{$table}` {$where}");	
			$rs->setFetchMode(\PDO::FETCH_ASSOC);
			
			return $rs->fetchAll();
		}

		public function update($table, $dados, $where){
			foreach ($dados as $keys => $values){
				$campos[] = "{$keys} = '{$values}'";
			}
			
			$campos = implode(', ', $campos);
			
			return $this->pdo->query("UPDATE `{$table}` SET {$campos} WHERE {$where}");
		}

		public function delete($table, $where){
			return $this->pdo->query("DELETE FROM `{$table}` WHERE {$where}");
		}

		public function exist($table, $field, $value){
			if(isset($value) && isset($field)){
				$rs = $this->pdo->query("SELECT {$field} FROM `{$table}` WHERE {$field}='{$value}' ");
				if($rs->rowCount()>0)
					return true;
			}
			else
				return false;
		}

		public function listOne($table, $where = null){
			$where = ($where!=null ? "WHERE {$where}" : "");
			$rs = $this->pdo->query("SELECT * FROM `{$table}` {$where}");	
			$rs->setFetchMode(\PDO::FETCH_ASSOC);
			
			return $rs->fetch();
		}

		public function execute($sql){
			if(isset($sql))
				return $this->pdo->query($sql);
			else
				return false;
		}
		
		public function lastInsertId(){
			return $rs = $this->pdo->lastInsertId();
		}
	}
?>