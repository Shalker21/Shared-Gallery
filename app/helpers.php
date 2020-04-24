<?php 

	function xssPrevent($value) {
		return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
	}

	function post($name) {
		return $_POST[$name];
	}
	}

	function get($name) {
		return $_GET[$name];
	}
