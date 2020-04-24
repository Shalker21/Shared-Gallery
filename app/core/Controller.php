<?php 

	class Controller {
		public function model($modelName) {
			if(file_exists('app/models/' . $modelName . '.php')) {
				require_once 'app/models/' . $modelName . '.php';
				return new $modelName();
			}
		}

		public function view($ViewName, $data = []) {
			file_exists('app/views/' . $ViewName . '.php') ? require_once 'app/views/' . $ViewName . '.php': die("View does not found!");
		}
	}