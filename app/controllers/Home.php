<?php 

	class Home extends Controller {

		public function __construct() {
			if(isLoggedIn() || isset($_COOKIE['remember_me'])) {
				redirect('images');
				exit;
			}
		}

		public function index() {
			$data = [
				'title' => 'Welcome To Shared Gallery Site',
				'description' => 'Share your art with others!'
			];

			return $this->view('home/index', $data);
		}

		public function about() {
			$data = [
				'description' => 'Shared Gallery web site is made for artists like you. Share your art and let world see what you created!'
			];

			return $this->view('home/about', $data);
		}
	}