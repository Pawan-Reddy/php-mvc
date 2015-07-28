<?php

	define('VERSION','0.1.a');

	if(file_exists('config.php')) {
		require_once('config.php');
	}

	if(!defined('APP_DIR')) {
		exit('config file not available ');
	}
	
	echo APP_DIR . " " . APP_SYSTEM; exit;
	//startup.php pre-loads all initial files
	require_once(APP_SYSTEM . 'startup.php');

	$registry = new Registry();

	$loader = new Loader($registry);

	$registry->set('load',$loader);

	// Database
	$db = new DB(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	$registry->set('db', $db);

	//$route = new Route();
