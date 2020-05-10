<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once 'app/phpmailer/vendor/autoload.php';

class Users extends Controller {

		private $data = [
			'first_name' => '',
			'last_name' => '',
			'username' => '',
			'email' => '',
			'password' => '',
			'confirm_password' => '',
			'code_number' => '',
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
			if(isLoggedIn()) {
				redirect('images');
				exit;
			}

			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$this->data = [
					'first_name' => trim(post('first_name')),
					'last_name' => trim(post('last_name')),
					'username' => trim(post('username')),
					'email' => trim(post('email')),
					'password' => trim(post('password')),
					'confirm_password' => trim(post('password_confirmation')),
					'code_number' => '',
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
				if($this->userModel->getUserEmail($this->data['email'])) {
					$this->data['email_err'] = 'This E-Mail address already exists, please try again!';
				}

				// validate password
				if(empty($this->data['password'])) {
					$this->data['password_err'] = 'Please insert Password!';
				}
				if(!empty($this->data['password'])) {
					if(strlen($this->data['password']) < 8) {
						$this->data['password_err'] = 'Password must contain atleast 8 numbers and chars';
					}
					if(!preg_match('/[A-Za-z]/', $this->data['password']) || !preg_match('/[0-9]/', $this->data['password'])) {
						$this->data['password_err'] = 'Password must contain both letters and numbers!';
					}
				}

				// validate confirmation 
				if(empty($this->data['confirm_password'])) {
					$this->data['confirm_password_err'] = 'Please confirm password!';
				}
				if(strcmp($this->data['password'], $this->data['confirm_password']) != 0) {
					$this->data['confirm_password_err'] = 'Passwords dont match!';
				}
				
				// check if every value is empty in array for processing data to database
				if(
					empty($this->data['first_name_err']) &&
					empty($this->data['last_name_err']) &&
					empty($this->data['username_err']) &&
					empty($this->data['email_err']) &&
					empty($this->data['password_err']) &&
					empty($this->data['confirm_password_err'])
				) {
					// salt is automaticly added
					$this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);

					$this->data['code_number'] = rand(10000, 99999);
					if($this->sendMail(
						$this->data['email'],
						$this->data['first_name'] . ' ' . $this->data['last_name'],
						$this->data['code_number']
					)) {
						if($this->userModel->register($this->data)) {
								message('success_controller', 'You are registered, Check your email for first login!');
								redirect('users/code');
							}
					}
				}

				return $this->view('users/register', $this->data);
			} else {
				return $this->view('users/register', $this->data);
			}
		}

		public function login() {
			// SESSION set
			if(isLoggedIn()) {
				redirect('images');
			}

			// COOKIE remember me set
			if(rememberMe()) {
				$userId = decryptCookie($_COOKIE['remember_me']);
				
				$user = $this->userModel->getUserById($userId);

				$this->loginSession($user);
				exit;
			}
			
			ini_set('memory_limit', '-1');

			$data = [
				'email' => '',
				'password' => '',
				'remember_me' => '',
				'email_err' => '',
				'password_err' => '',
				'error' => ''
			];

			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data['email'] = trim($_POST['email']);
				$data['password'] = trim($_POST['password']);

				// validate
				if(empty($data['email'])) {
					$data['email_err'] = 'Please insert E-Mail address!';
				}
				if(empty($data['password'])) {
					$data['password_err'] = 'Please insert Password!';
				}

				if(empty($data['email_err']) && empty($data['password_err'])) {

					// row or false
					$user = $this->userModel->login($data['email'], $data['password']);

					// if you cant find email or password
					if($this->userModel->getUserEmail($data['email']) == false || !$user) {
					
						$data['error'] = 'Wrong E-Mail address or Password!';
					
					// if input is correct
					} else {
						// if you're not used code sent after registration in email
						if($user->first_login == true) {
							redirect('users/code');
						}

						// login user 
						!isset($_POST['remember_me']) ? $this->loginSession($user) : $this->loginSession($user, true);
						
					}
				}
				return $this->view('users/login', $data);
			}
			return $this->view('users/login', $data);	
		}

		public function loginSession($user, $cookie = null) {
			if($cookie) {
				$value = encryptCookie($user->id);
				setcookie('remember_me', $value, time() + 86400); // 1 day
			}

			$_SESSION['user_id'] = $user->id;
      		redirect('images');
		}

		public function logout() {
			unset($_SESSION['user_id']);
			session_destroy();

			setcookie('remember_me', '', time() - 86400); // 1 day

			redirect('home');
		}

		public function code() {

			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$data = [
					'error' => ''
				];
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$number = $_POST['form_code_number'];
				$user = $this->userModel->getCode($number);
				
				if($user) {
					if($user->code_number == $number) {
						if($this->userModel->updateFirstLogin($user->id)) {
							return $this->view('users/login');
						}
					}
				} else {
					$data['error'] = 'Wrong Code, Please try again!';
					return $this->view('users/code', $data);
				}
			}

			return $this->view('users/code');
		}

		public function sendMail($email, $name, $code_number) {
			// security lack, less secured apps is ON

			$mail = new PHPMailer();

			$mail->IsSMTP(); 
			$mail->SMTPDebug = 1;
			$mail->SMTPAuth = true; 
			$mail->SMTPSecure = 'ssl'; 
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465; 
			$mail->IsHTML(true);
			$mail->Username = "rac.david.salamon@gmail.com";
			$mail->Password = "froggyMS21";
			$mail->SetFrom("rac.david.salamon@gmail.com");
			$mail->Subject = "Account autentification";
			$mail->Body = "Autentification code: <b>$code_number</b>";
			$mail->AddAddress($email);

			if(!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
				die('Something went wrong with sending mail');
			} else {
				echo "Message has been sent";
				return true;
			}
		}
	}