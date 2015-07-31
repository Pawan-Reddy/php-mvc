<?php

	defined('VERSION') OR exit('No direct script access allowed');

	// Error Reporting
	error_reporting(E_ALL);

	// Check Version
	if (version_compare(phpversion(), '5.3.0', '<') == true) {
		exit('PHP5.3+ Required');
	}

	//Autoloading Helper files
	function autoload($class) {
		$file = APP_SYSTEM . 'helper/' . str_replace('\\', '/', strtolower($class)) . '.php';
		
		if(is_file($file)) {
			include_once($file);
			return true;
		}
		return false;
	}

	spl_autoload_register('autoload');
	spl_autoload_extensions('php');

	//core files
	require_once(APP_SYSTEM . 'core/controller.php');
	require_once(APP_SYSTEM . 'core/model.php');
	require_once(APP_SYSTEM . 'core/loader.php');
	require_once(APP_SYSTEM . 'core/route.php');
	require_once(APP_SYSTEM . 'core/registry.php');

