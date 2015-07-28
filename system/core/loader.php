<?php

final class Loader {
	private $registry;

	public function __construct($registry) {
		$this->registry = $registry;
	}

	public function controller($path, $args = array()) {
		$route = new Route($path,$args);

		$route->run($this->registry);

	}

	public function model($model) {

	}

	public function view($tpl,$data) {

	}


}
