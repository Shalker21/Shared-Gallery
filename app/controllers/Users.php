<?php

	class Users extends Controller {
		
		public function register() {

			if($_SERVER['REQUEST_METHOD'] == 'POST') {

				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = [
					'first_name' => trim(post('first_name')),
					'last_name' => trim(post('last_name')),
					'username' => trim(post('username')),
					'email' => trim(post('email')),
					'password' => trim(post('password')),
					'confirm_password' => trim(post('confirm_password')),
					'first_name_err' => '',
					'last_name_err' => '',
					'username_err' => '',
					'email_err' => '',
					'password_err' =>'',
					'confirm_password_err' =>''
				];

				// validate data
				

			}


			return $this->view('users/register', $data);
		} 

		public function login() {
			$data = ['title' => 'LOGIN'];
			return $this->view('users/login', $data);
		}
	}