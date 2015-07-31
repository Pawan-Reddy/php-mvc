<?php
	
defined('VERSION') OR exit('No direct script access allowed');

//DB
define('DB_HOSTNAME','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_DATABASE','dbog');
define('DB_PREFIX', 'bog');

//Directory location
define('APP_DIR', str_replace('\\','/',dirname(__FILE__)) . '/');
define('APP_SYSTEM', APP_DIR . 'system/' ); //system files
define('APP_FRONT', APP_DIR . 'front/' ); //frontend controller,view model files
	
