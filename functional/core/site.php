<?php
class Site {

	public $db;
	private $default_route, $routes, $current_page, $is_home;

	function __construct() {
		new Router;
		$this->db = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME); //need to handle $db->connect_error
		// create the current page
		new Router::$current_page;
	}

};
