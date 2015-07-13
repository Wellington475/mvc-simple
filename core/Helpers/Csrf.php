<?php
	namespace App\Helpers;

	class Csrf
	{
		public function makeToken(){
			$csrf_token = md5(uniqid(rand(), TRUE));
			return $csrf_token;
		}
	}

?>