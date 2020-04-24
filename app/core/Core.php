<?php

	/* URL
	* ------------  
	* [0] => controller
	* [1] => method
	* [n] => params
	* 
	* last require_once is inside main index.php so root is from index.php
	* 
	*/
	class Core {
		
		// default properties
		protected $currController = 'Home';
		protected $currMethod = 'index';
		protected $params = [];

		public function __construct() {

			// if(isset($url[1])) {
			// 	print_r($url);
			// }
			$url = $this->getUrl();

			if(file_exists('app/controllers/' . ucfirst($url[0]) . '.php')) {
				$this->currController = ucfirst($url[0]);
				unset($url[0]);
			} else {
				if(isset($url[0])) {
					die("404");
				}
			}

			require_once 'app/controllers/' .ucfirst($this->currController) . '.php';

			$this->currController = new $this->currController;

			if(isset($url[1])) {
				if(!method_exists($this->currController, $url[1])) {
					die('<h1>404 - The View Can Not Be Found</h1>');
				} else {
					$this->currMethod = $url[1];
					unset($url[1]);
				}
			}

			$this->params = $url ?  array_values($url) : [];

			// call callback current controller and method with parameters(if set)
			call_user_func_array([$this->currController, $this->currMethod], $this->params);
		}

		private function getUrl() {

			if(isset($_GET['url'])) {
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);

				return $url;
			}

		}

	}
	