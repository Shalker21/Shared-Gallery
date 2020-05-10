<?php 

	class Images extends Controller {
		public function __construct() {
			// prevent user to go back to secured pages after logout 
			if(!isLoggedIn()) {
				redirect('home');
				exit;
			} 
		}
		public function index() {
			
			return $this->view('images/index');
		}
	}