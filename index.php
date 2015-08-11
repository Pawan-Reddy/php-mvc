<?php

	define('VERSION','0.1.b');

	if(file_exists('config.php')) {
		require_once('config.php');
	}

	if(!defined('APP_DIR')) {
		exit('config file not available ');
	}
	
	
	//startup.php pre-loads all initial files
	require_once(APP_SYSTEM . 'startup.php');
	
	$registry = new Registry();

	$loader = new Loader($registry);

	$registry->set('load',$loader);

	$request = new Request();

	$registry->set('request',$request);
	
	if(isset($request->get['url']) && isset($request->get['args'])) {
		$route = new Route($request->get['url'],$request->get['args']);
	} else if(isset($request->get['url'])){
		$route = new Route($request->get['url']);
	} else {
		$route = new Route('common/home');
	}

	echo $route->run($registry);

