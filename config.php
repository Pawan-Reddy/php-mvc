<?php
	
defined('VERSION') OR exit('No direct script access allowed');

//DB
define('DB_HOSTNAME','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_DATABASE','database_name');
define('DB_PREFIX', 'prefix');
define('DB_DRIVER', 'mysqi'); //set to either MySQLi or mPDO

//Directory location
define('APP_MAIN', str_replace('\\','/',dirname(__FILE__)) . '/');
define('APP_SYSTEM', APP_MAIN . 'system/' ); //system files
define('APP_DIR', APP_MAIN . 'front/' ); //frontend controller,view model files
