<?php
	namespace App\Controller;

	class Controller
	{

		private $headers = array();
		
		protected function render($path, $data = false, $error = false){
	        if(!headers_sent()){
	            foreach ($this->headers as $header){
	                header($header, true);
	            }
	        }
	        
	        require_once dirname(__FILE__).'/../View/'. $path . '.php';
	    }
	}
?>