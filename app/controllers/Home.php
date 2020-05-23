<?php 

	class Home extends Controller {

		public function __construct() {
			if(isLoggedIn() || isset($_COOKIE['remember_me'])) {
				redirect('images');
				exit;
			}
			$this->imageModel = $this->model('Image');
		}

		public function index() {
			$images = $this->imageModel->getAllImages();
			$data = [
				'title' => 'Welcome To Shared Gallery Site',
				'description' => 'Share your art with others!',
				'images' => $images
			];

			return $this->view('home/index', $data);
		}

		public function about() {
			$data = [
				'description' => 'Shared Gallery web site is made for artists like you. Share your art and let world see what you created!'
			];

			return $this->view('home/about', $data);
		}

		public function imageNumber() {
			return "KER";
			if($_SERVER['REQUEST_METHOD'] == 'GET') {

				$images = $this->imageModel->getAllImages();
				$counter = 0;
				
				foreach($images as $image) {
					$counter++;
				}
				return $counter;
			}

		}
	}