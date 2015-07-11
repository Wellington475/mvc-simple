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
	
	$route = new Router($_GET['url']);

	$route->get('/', "Posts.home");
	$route->get('/user/:name', "Posts.show");
	$route->post('/user', "Posts.setName");

	$route->run();
