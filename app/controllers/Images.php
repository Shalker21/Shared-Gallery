<?php 

	class Images extends Controller {

		public function __construct() {
			// prevent user to go back to secured pages after logout 
			if(!isLoggedIn()) {
				redirect('home');
				exit;
			} 

			$this->imageModel = $this->model('image');
			$this->userModel = $this->model('user');
		}
		public function index() {
			return $this->view('images/index');
		}

		public function single($id) {
			$data = [
				'title' => '',
				'description' => '',
				'images' => []
			];
			$userId = $_SESSION['user_id'];
			$post = $this->imageModel->getPostById($id);
			$images_post = $this->imageModel->getPivotTableByPostId($post->id);
			$images = 

			$data['title'] = $post->title;

			return $this->view('images/single', $data);
		}

		public function createPost() {
			return $this->view('images/createPost');
		}
		
		public function storeImages() {
			$data = [
				'title' => '',
				'description' => '',
				'title_err' => '',
				'description_err' => '',
				'file_err' => ''

			];

			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				// die(var_dump($_FILES['image']['name']));
				
				$data['title'] = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
				$data['description'] = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
				
				// validation
				if(empty($data['title'])) {
					$data['title_err'] = 'Insert title!';
				}
				
				// validation
				if(empty($data['description'])) {
					$data['description_err'] = 'Insert description!';
				}
				
				if(empty($_FILES['image']['name'][0])) {
					$data['file_err'] = 'You\'re not selected any picture!';
				}
				
				// die(basename($_FILES['image']['name'][0]));
				
				if(empty($data['title_err']) && empty($data['description_err']) && empty($data['file_err'])) {
					$path = 'public/images/';
					$exts = ['jpg','png','jpeg','gif']; 
					array_filter($_FILES['image']['name']);
					$imageId = [];

					// go trough uploaded files
					foreach($_FILES['image']['name'] as $key => $value) {
						// get names of images
						$file_name = $_FILES['image']['name'][$key];
						// set taget folder for upload
						$target_folder = $path . $file_name;
						// get extension from file
						$fileType = pathinfo($target_folder, PATHINFO_EXTENSION);
						// if extension is correct
						if(in_array($fileType, $exts)) {
							if(move_uploaded_file($_FILES['image']['tmp_name'][$key], $target_folder)) {								
								if($insertedImageId = $this->imageModel->insertImages($_FILES['image']['name'][$key])) {
									// File Uploaded
									array_push($imageId, $insertedImageId);
								} 
							}
						} else {
							$data['file_err'] = 'You are not selected image, please select image with extensions:<br>["jpg","png","jpeg","gif"]';
						}
					}

					// if post is inserted, return that last id
					if($postId = $this->imageModel->insertPost($data['title'], $data['description'])) {
						// insert into pivot table
						foreach($imageId as $id) {
							if($this->imageModel->insertImagePostPivotTable($id ,$_SESSION['user_id'], $postId)) {
								// row created
							}
						}
						redirect('images/single/'.$postId);
					} else {
						die("NESTO NIJE UREDU");
					}
				}
				return $this->view('images/createPost', $data);
			}
		}
	}