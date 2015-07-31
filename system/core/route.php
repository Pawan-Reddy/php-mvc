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

			if(is_dir(APP_FRONT . 'controller/' . $part)) {
				$loc .= '/';
				array_shift($parts);
				continue;
			}

			$file = APP_FRONT . 'controller/' . $loc . '.php';

			if(is_file($file)) {
				$this->file = $file;

				$this->class = 'Controller' . preg_replace('/[^a-zA-Z0-9]/', '', $part);

				array_shift($parts);
				break;
			}			

		}

	}

	public function run($registry) {
		$class = $this->class;

		$controller = new $class($registry);

		if(method_exists($controller, $this->method)) {
			$method = $this->method;

			return $controller->$method($this->args);

		} else {
			trigger_error("$method". ' does not exist in ' . " $class" . '.php file');
		}

		return false;
		
	}


}
