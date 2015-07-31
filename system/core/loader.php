<?php

final class Loader {
 private $registry;

 	public function __construct($registry) {
		$this->registry = $registry;
	}

	public function controller($path, $args = array()) {
		$route = new Route($path,$args);

		return $route->run($this->registry);

	}

	public function model($model) {
		$file = APP_FRONT . 'model/' . $model .'.php';
		$class = 'Model' . preg_replace('/[^a-zA-Z0-9]/', '', $model);
		
		if(file_exists($file)) {
			require_once($file);

			$this->registry->set('model_' . str_replace('/','_', $model), new $class($this->registry));
		} else {
			trigger_error('Fail to load model file ' . $file);

			exit();
		}
	}

	public function view($tpl,$data) {
		
		$file = APP_FRONT . 'view/' . $tpl . '.tpl';

		if(file_exists($file)){

			extract($data);

			ob_start();

			require($file);

			$output = ob_get_contents();
				
			ob_end_clean();

			return $output;

		} else {

			trigger_error('Fail to load template file ' . $file);
			exit();
		}
	}


}
