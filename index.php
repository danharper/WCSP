<?php
session_start();
set_include_path('controllers'.PATH_SEPARATOR.'modules'.PATH_SEPARATOR.'core');

function __autoload($class) {
	// echo 'autoloading ' . $class . '<br>';
	include (strtolower($class) . '.php');
}

include ('config.php');

new Router;
