<?php
	
	defined('VERSION') OR exit('No direct script access allowed');

	
	//DB
	define('DB_HOSTNAME','localhost');
	define('DB_USERNAME','root');
	define('DB_PASSWORD','');
	define('DB_DATABASE','dbname');
	define('DB_PREFIX', 'pre');

	//Directory location

	/*
	* Comment Out below line if sub directory exists and specify the path
	*/
	//define('APP_SUBDIR','experiments/sub-directory/');
	
	define('APP_DIR', str_replace('\\','/',dirname(__FILE__)) . '/');

	define('APP_SYSTEM', APP_DIR . 'system/' );
	
