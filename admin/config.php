<?php
	
	defined('VERSION') OR exit('No direct script access allowed');

	
	//DB
	define('DB_HOSTNAME','localhost');
	define('DB_USERNAME','root');
	define('DB_PASSWORD','');
	define('DB_DATABASE','dbog');
	define('DB_PREFIX', 'bog');

	//Directory location
	define('APP_MAIN', str_replace('\\','/',dirname(__FILE__)) . '/');
	define('APP_SYSTEM', APP_MAIN . 'system/' ); //system files
	define('APP_DIR', APP_MAIN . 'admin/' ); //backend controller,view model files
