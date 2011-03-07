<?php
// Site title
define('SITE_TITLE', 'Super Mega Awesome Shopping Site');

// Database Settings
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'webcw');

// Root Path
define ('ROOT',  dirname($_SERVER['SCRIPT_NAME']));

// Routes
$this->default_route = "home";
$this->routes = array(
	// GET string => Page to load
	"cat" => "category",
	"product" => "product",
	"basket" => "basket"
);
