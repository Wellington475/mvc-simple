<?php
	namespace App\Router;

	class Route
	{
		private $path;
		private $callback;
		private $matches = [];
		private $params = [];

		public function __construct($path, $callback){
			
			$this->path = trim($path, '/');
			$this->callback = $callback;
		}

		public function with($param, $regex){
			$this->params[$param] = str_replace('(', '(?:', $regex);

			return $this;
		}

		public function match($url){
			$url = trim($url, '/');
			$path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
			$regex = "#^$path$#i";
			if(!preg_match($regex, $url, $matches)){
				return false;
			}
			array_shift($matches);
			$this->matches = $matches;

			return true;
		}

		public function paramMatch($match){
			if(isset($this->params[$match[1]])){
				return '(' . $this->params[$match[1]] . ')';
			}
			return '([^/]+)';
		}

		public function call(){
			if(is_string($this->callback)){
				$params = explode('.', $this->callback);
				$controller = "App\\Controller\\" . $params[0] . "Controller";

				$controller = new $controller();
				$action = $params[1];
				
				return call_user_func_array([$controller, $action], $this->matches);
			}
			else{
				return call_user_func_array($this->callback, $this->matches);
			}
		}

		public function getUrl($params){
			$path = $this->path;

			foreach ($params as $key => $value) {
				$path = str_replace(":$key", $value, $path);
				echo $path;
			}
			return $path;
		}
	}
?>