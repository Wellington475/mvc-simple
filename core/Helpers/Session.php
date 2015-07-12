<?php
	namespace App\Helpers;

	class Session
    {

    	public function init(){
    		session_start();
    	}

		public function set($key, $value){
			if(empty($_SESSION[$key])){
				if(isset($value))
					$_SESSION[$key]=$value;
			}
			
			return true;
		}

		public function get($key){
			if(!empty($_SESSION[$key]))
				return $_SESSION[$key];
			else
				return false;
		}

		public function exist($key){
			if(!empty($_SESSION[$key]))
				return true;
			else
				return false;
		}

		public function clear($key){
			if(isset($_SESSION[$key]))
				unset($_SESSION[$key]);

			return true;
		}

		public function destroy(){
			session_destroy();
		}
    }
?>