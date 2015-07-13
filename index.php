<?php 
	/**
	* MVC-Simple simple application PHP
	*
	* @package mvc-simple
	* @author Wellington dos Santos <wellington30071997@gmail.com>
	* @license http://opensource.org/licenses/MIT MIT License
	*/

	define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
	define('APP', ROOT . 'core' . DIRECTORY_SEPARATOR);

	if(file_exists(ROOT . 'vendor/autoload.php')){
		require ROOT . 'vendor/autoload.php';
	}
	if(file_exists(APP . 'config/config.php')){
		require APP . 'config/config.php';
	}

	
	use App\Router\Router as Router;
	
	if(array_key_exists('url', $_GET)){
		$route = new Router($_GET['url']);
	}
	else{
		$route = new Router(URL_DEFAULT);
	}
	
	$route->get('/', "Post#Posts.home");
	
	$route->get('/username/:name', function($name){
		echo "<h1>Hello " . $name . "!</h1>";
	})->with('name','[a-z]+');

	$route->post('/user', "Post#Posts.setName");

	$route->run();