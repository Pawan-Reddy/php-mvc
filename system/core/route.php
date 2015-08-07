<?php
final class Route {
	private $file;
	private $class;
	private $method;
	private $args = array();

	public function __construct($path,$args = array()) {
		$loc = '';

		//break apart the path
		$parts = explode('/',str_replace(array('../', '..\\', '..'),'',$path));

		foreach ($parts as $part) {
			$loc .= $part;
			
			if(is_dir(APP_DIR . 'controller/' . $part)) {
				$loc .= '/';
				
				array_shift($parts);
				continue;
			}

			$file = APP_DIR . 'controller/' . $loc . '.php';

			
			if(file_exists($file) && is_file($file)) {
				
				include_once($file);
				$this->file = $file;

				$this->class = 'Controller' . preg_replace('/[^a-zA-Z0-9]/', '', $loc);

				array_shift($parts);
				
				break;
			} else {
				
				$file = APP_DIR . 'controller/common/home.php';

				include_once($file);
				$this->file = $file;

				$this->class = 'Controller' . preg_replace('/[^a-zA-Z0-9]/', '', 'common/home');

				array_shift($parts);
				unset($parts);

				break;
			}		

		}
		if(!empty($parts)) {
			$this->method = array_shift($parts);	
		}
		$this->args = $args;
	}

	public function run($registry) {
		$class = $this->class;

		$controller = new $class($registry);

		if(method_exists($controller, $this->method)) {
			$method = $this->method;

			return $controller->$method($this->args);

		} else {
			return $controller->index();
		}
		return false;
	}
}
