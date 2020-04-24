<?php

// autoload core classes
spl_autoload_register(function($className) {
	require_once 'core/' . $className . '.php';
});

require_once 'config.php';