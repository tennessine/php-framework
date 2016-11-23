<?php

use Framework\Sys\Application;

$config = require_once ROOT . 'config/app.php';

if ($config['debug']) {
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
} else {
	error_reporting(0);
	ini_set('display_errors', 'Off');
}

$app = new Application(ROOT);