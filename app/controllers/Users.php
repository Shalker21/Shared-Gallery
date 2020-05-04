<?php

use function PHPSTORM_META\type;

class Users extends Controller {
		private $data = [
			'first_name' => '',
			'last_name' => '',
			'username' => '',
			'email' => '',
			'password' => '',
			'confirm_password' => '',
			'first_name_err' => '',
			'last_name_err' => '',
			'username_err' => '',
			'email_err' => '',
			'password_err' =>'',
			'confirm_password_err' =>''
		];

		public function __construct() {
			$this->userModel = $this->model('User');
		}
		
		public function register() {

			if($_SERVER['REQUEST_METHOD'] == 'POST') {

				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$this->data = [
					'first_name' => trim(post('first_name')),
					'last_name' => trim(post('last_name')),
					'username' => trim(post('username')),
					'email' => trim(post('email')),
					'password' => trim(post('password')),
					'confirm_password' => trim(post('password_confirmation')),
					'first_name_err' => '',
					'last_name_err' => '',
					'username_err' => '',
					'email_err' => '',
					'password_err' =>'',
					'confirm_password_err' =>''
				];

				// validation first name
				if(empty($this->data['first_name'])) {
					$this->data['first_name_err'] = 'Please insert first name!';
				}
				if(preg_match('~[0-9]~', $this->data['first_name'])) {
					$this->data['first_name_err'] = 'First name cannot contain number inside!';
				}

				// validation last name
				if(empty($this->data['last_name'])) {
					$this->data['last_name_err'] = 'Please insert Last name!';
				}
				if(preg_match('~[0-9]~', $this->data['last_name'])) {
					$this->data['last_name_err'] = 'Last name cannot contain number inside!';
				}

				// validation username
				if(empty($this->data['username'])) {
					$this->data['username_err'] = 'Please insert Username!';
				}
				if(!empty($this->data['username'])) {
					if(!preg_match('/[A-Za-z]/', $this->data['username']) || !preg_match('/[0-9]/', $this->data['username'])) {
						$this->data['username_err'] = 'Username must contain both letters and numbers!';
					}
				}

				// validate email
				if(empty($this->data['email'])) {
					$this->data['email_err'] = 'Please insert E-Mail address!';
				}

				return $this->view('users/register', $this->data);
			} else {
				return $this->view('users/register', $this->data);
			}
			
		} 

		public function login() {
			$data = ['title' => 'LOGIN'];
			return $this->view('users/login', $data);
		}
	}