<?php 

	function xssPrevent($value) {
		return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
	}

	function post($name) {
		return $_POST[$name];
	}

	function get($name) {
		return $_GET[$name];
	}

	function message($type = '', $message = '') {
		if(!empty($type)) {
			echo $message;
			if($type == 'success_controller') {
				$_SESSION['message'] = $message;
			}
		}
	}

	function ifEmptyArray($array) {
		foreach($array as $key => $value) {
			if($value !== '') {
				return false;
			}
		}
		return true;
	}

	function redirect($path, $statusCode = 301) {
		header('Location: ' . URLROOT . '/' . $path, true, $statusCode);
		die();	
	}

	function isLoggedIn() {
		if(!isset($_SESSION['user_id'])) {
			return false;
		} else {
			return true;
		}
	}

	function rememberMe() {
		if(!isset($_COOKIE['remember_me'])) {
			return false;
		} else {
			return true;
		}
	}

	function encryptCookie($user_id) {
		$userId = $user_id;
		$hash = md5(rand(10000, 99999) . SECRET);
		$secondHash = md5(SECRET . $hash . $userId);
		// check if this has any sence because user id is last data after - sign
		$cookieValue = base64_encode($secondHash . '-' . $hash . '-' . $userId);
		 
		return $cookieValue;
	   }
	   
	function decryptCookie($cookieValue) {
	$data = explode('-', base64_decode($cookieValue));
	
	if($data[0] !== md5(SECRET . $data[1] . $data[2])) {
		die('Cookie is not equal');
	} else {
		// user_id
		return $data[2];
	}
	
	}

