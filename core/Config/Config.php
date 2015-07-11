<?php
	namespace App\Config;

	/**
	* Configuration for: Error reporting
	*/
	define('ENVIRONMENT', 'development');
	
	if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev'){
	    error_reporting(E_ALL);
	    ini_set("display_errors", 1);
	}

	/**
	* Configuration for: Languague
	*/
	define('LANGUAGE_CODE', 'pt-br');

	/**
	* Configuration for: Url
	*/
	define('URL', 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']));
	define('URL_DEFAULT', '');
	
	/**
	* Configuration for: Database
	*/
	define('DB_TYPE', 'mysql');
	define('DB_HOST', '127.0.0.1');
	define('DB_NAME', 'base_mvc');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_CHARSET', 'utf8');
?>	