<?php

final class Registry {
	private $data = array();

	public function get($key) {
		return (isset($this->data[$key]) ? $this->data[$key] : null);
	}

	public function set($key,$data) {
		$this->data[$key] = $data;
	}
}
