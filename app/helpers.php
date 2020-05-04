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

	function message($type = '', $message) {
		if ($type == 'danger') {
			$box = "<div class='alert alert-danger'>{$message}</div>";
		} else if ($type == 'success') {
			$box = "<div class='alert alert-danger'>{$message}</div>";
		} else {
			die("Type is not correct!");
		}
		return $box;
	}