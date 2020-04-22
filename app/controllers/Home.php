<?php 

	class Home extends Controller {

		public function __construct() {

		}

		public function index() {
			$data = [
				'title' => 'home/index'
			];

			return $this->view('home/index', $data);
		}
	}