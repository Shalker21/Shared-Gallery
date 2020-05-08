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
		if(isset($_SESSION['user_id'])) {
			return true;
		} else {
			return false;
		}
	}

