<?php

final class Route {
	private $file;
	private $class;
	private $method;
	private $args = array();

	public function __construct($path,$args = array()) {

		$parts = explode('/',$path);

		foreach ($parts as $part) {
			
			if($part == '') {
				array_shift($parts);
				continue;
			}

			$loc = '';

			if(defined('APP_SUBDIR')) {
				$loc = APP_SUBDIR;
			}

			$loc .= $part;

			

		}


	}
}
